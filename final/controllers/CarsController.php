<?php

namespace App\Controllers;

use App\Core\App;

class CarsController
{


    public function index()
    {
        check_auth();


        $cars = App::get('db')->selectJoin('cars', 'colors', 'color_name', 'color_id', 'color_id');

        return view('cars', compact('cars'));

    }

    public function upload()
    {

        check_auth();

        $colors = App::get('db')->selectAll('colors');
        return view('cars-upload', compact('colors'));
    }

    public function store() //everything is sanitized and validated except for the image
    {
        check_auth();

        //image
        $car = $_POST;
        $car = $this->uploadImage($car);

        App::get('db')->insert('cars', $car);
        
        //car name

        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        if (!filter_var($POST['name'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }

        //car color
        $_POST['color_name'] = filter_var($_POST['color_name'], FILTER_SANITIZE_STRING);
        if (!filter_var($POST['color_name'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }


        //price
        $_POST['price'] = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (!filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }

        //description

        $_POST['description'] = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        if (!filter_var($POST['description'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }

        $_POST['year_manufactured'] = filter_var($_POST['year_manufactured'], FILTER_SANITIZE_STRING);
        if (!filter_var($POST['year_manufactured'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }


       
        return redirect('/cars');
   
       

                
        

    }

    public function edit()
    {
        check_auth();
        $car = App::get('db')->select('cars', $_GET);


        return view('cars-edit', compact('car'));
    }

    public function update()
    {
        check_auth();


               //sanitize and validate
        //id
        $_POST['id'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
            redirect('/cars');
        }

        //title
        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);



        //price
        $_POST['price'] = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (!filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }

        App::get('db')->update('cars', $_POST);

        return redirect('/cars');
        
    }


    public function delete()
    {
        check_auth();
        $car = App::get('db')->getOneAssoc('cars', $_GET['id']);
        App::get('db')->delete('cars', $_GET);
        
        return redirect('/cars');
    }

       /**
     * @param array $car
     * @return array
     */

    public function uploadImage(array $car)
    {
       

        $name = 'vintage-car-' . time() . '_' . $_FILES['image']['name'];

        $path = getcwd() . '/public/images/';

        move_uploaded_file($_FILES['image']['tmp_name'], $path . $name);;

        $car['image'] = $name;
        return $car;
     
    }

    
}


