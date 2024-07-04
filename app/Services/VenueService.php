<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Interfaces\VenueServiceInterface;

class VenueService implements VenueServiceInterface
{

  private string $api_url;
  private string $api_key;

  public function __construct() {
    $this->api_url = env('WEATHER_MAP_API_URL');
    $this->api_key = env('WEATHER_MAP_API_KEY');
  }
  
  public function search( string $data )
  {
    // $data = Http::get($this->api_url . '/weather', [
    //   'q' => 'Tokyo',
    //   'appid' => $this->api_key,
    // ]);
    // return $data;
  }
}