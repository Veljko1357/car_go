<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{


    private function redirectLogin()
    {
        return view('login');
    }

    private function properText($text)
    {
        $text = mb_convert_encoding($text, "HTML-ENTITIES", "UTF-8");
        $text = preg_replace('~^(&([a-zA-Z0-9]);)~', htmlentities('${1}'), $text);
        return ($text);
    }

    public function home()
    {

        $cars = App::get('db')->selectJoin('cars', 'colors', 'color_name', 'color_id', 'color_id');
        return view('index', compact('cars'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {

        $companyName = "My Company";
        return view('contact', compact('companyName'));
    }
    

}