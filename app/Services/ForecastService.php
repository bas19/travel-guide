<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Interfaces\ForecastServiceInterface;

class ForecastService implements ForecastServiceInterface
{

  private string $api_url;
  private string $api_key;

  public function __construct()
  {
    $this->api_url = env('WEATHER_MAP_API_URL');
    $this->api_key = env('WEATHER_MAP_API_KEY');
  }
  
  public function get_by_city(string $city)
  {
    $data = Http::get($this->api_url . '/weather', [
      'q' => $city,
      'appid' => $this->api_key,
      'units' => 'metric',
    ]);
    return $data;
  }
}