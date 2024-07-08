<?php

namespace App\Http\Controllers;

use App\Interfaces\ForecastServiceInterface;

class ForecastController extends Controller
{
    private ForecastServiceInterface $service;

    public function __construct(ForecastServiceInterface $service)
    {
        $this->service = $service;
    }

    public function get_data_by_city(string $city)
    {
        $data = $this->service->get_by_city($city);

        return $data;
    }
}
