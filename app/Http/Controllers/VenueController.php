<?php

namespace App\Http\Controllers;

use App\Interfaces\VenueServiceInterface;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    private VenueServiceInterface $service;

    public function __construct(VenueServiceInterface $service)
    {
        $this->service = $service;
    }

    public function get_places_by_city(Request $request)
    {
        $data = $this->service->search($request->all());

        return $data;
    }
}
