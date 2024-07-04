<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\VenueServiceInterface;
use Illuminate\Support\Facades\Validator;

class VenueController extends Controller
{
    private VenueServiceInterface $service;

    public function __construct(VenueServiceInterface $service) 
    {
        $this->service = $service;
    }

    public function get_places_by_city(Request $request) 
    {
        $near_city = $request->input('near');
        $data = $this->service->search($near_city);
        return $data;
    }
}
