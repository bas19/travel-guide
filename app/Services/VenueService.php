<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Interfaces\VenueServiceInterface;

class VenueService implements VenueServiceInterface
{

  private string $api_url;
  private string $auth_token;

  public function __construct() 
  {
    $this->api_url = env('FOURSQUARE_API_URL');
    $this->auth_token = env('FOURSQUARE_AUTH_TOKEN');
  }
  
  public function search(string $near_city)
  {
    $request = Http::withHeaders([
      'Authorization' => $this->auth_token,
    ])->get($this->api_url . '/places/search', [
      'near' => $near_city,
      'limit' => 5,
      'v' => 20240604,
    ]);
    return $request;
  }
}