<?php

namespace App\Controllers;

use App\Core\App;

class ApiCarsController
{

    public function index()
    {

        $cars = App::get('db')->selectJoin('cars', 'colors', 'color_name', 'color_id', 'color');
        echo json_encode($cars);
    }

}