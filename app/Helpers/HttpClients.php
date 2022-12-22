<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class HttpClients{
  static function fetch($method, $url, $body = [], $files = []){
    if($method == 'GET') return Http::get($url)->json([]);
    if(sizeof($files) > 0){
      $client = Http::asMultipart();
      foreach($files as $key => $file){
        $path = $file->getPathname();
        $name = $file->getClientOriginalName();
        $client->attach($key, file_get_contents($path), $name);
      }
      return $client->post($url, $body);
    }
    return http::post($url, $body)->json();
  }
}