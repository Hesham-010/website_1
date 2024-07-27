<?php

namespace App\Http\Services;

class DatabaseService
{
    public function getConnectionBasedCountry($country)
    {
        if ($country == 'eg') {
            $connection = 'eg1';
        }else if ($country == 'sa') {
            $connection = 'sa1';
        }else if ($country == 'in') {
            $connection = 'in1';
        }

        return $connection;
    }
}