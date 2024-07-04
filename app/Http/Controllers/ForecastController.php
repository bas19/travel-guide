<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ForecastServiceInterface;
use Illuminate\Support\Facades\Validator;

class ForecastController extends Controller
{
    private ForecastServiceInterface $service;

    public function __construct(ForecastServiceInterface $service)
    {
        $this->service = $service;
    }

    public function get_data_by_city(Request $request, string $city)
    {
        $data = $this->service->get_by_city($city);
        return $data;
    }
}
