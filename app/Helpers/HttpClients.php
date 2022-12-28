<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class HttpClients{
  
  /** 
   * @param method method http 
   * @param url for getting http api
   * @param body is getting request 
   * @param file is file
   * @return mixed
   */

  static function fetch($method, $url, $body = [], $files = []){
    if($method == 'GET') return Http::get($url)->json([]);
    if(sizeOf($files) > 0){
      $client = Http::asMultipart();
      foreach($files as $key => $file){
        $path = $file->getPathname();
        $name = $file->getClientOriginalName();
        $client->attach($key, file_get_contents($path), $name);
      }
      return $client->post($url, $body);
    }
    if($method == 'PUT') return Http::put($url, $body)->json([]);
    if($method == 'DELETE') return Http::delete($url, $body)->json([]);
    return Http::post($url, $body)->json();
  }
}