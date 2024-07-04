<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ForecastServiceInterface;

class ForecastController extends Controller
{
    private ForecastServiceInterface $service;

    public function __construct(ForecastServiceInterface $service){
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->get_by_city('tokyo');
        return $data;
    }
}
