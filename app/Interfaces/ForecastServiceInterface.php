<?php

namespace App\Interfaces;

interface ForecastServiceInterface
{
    public function get_by_city(string $city);
}
