<?php

namespace App\Controllers;

use App\Core\App;

class ApiOrdersController
{

    public function store()
    {
        $orderData = json_decode(file_get_contents('php://input'), ARRAY_FILTER_USE_KEY);

        //validation and sanitization
        //name
        $orderData['orderInfo']['name'] = filter_var($orderData['orderInfo']['name'], FILTER_SANITIZE_STRING);

        //address
        $orderData['orderInfo']['address'] = filter_var($orderData['orderInfo']['address'], FILTER_SANITIZE_STRING);

        //email
        $email = filter_var($orderData['orderInfo']['email'], FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $orderData['orderInfo']['email'] = $email;
        } else {
            $orderData['orderInfo']['email'] = '';
        }

        //phone
        $phone = filter_var($orderData['orderInfo']['phone'], FILTER_SANITIZE_NUMBER_INT);
        if (filter_var($phone, FILTER_VALIDATE_INT)) {
            $orderData['orderInfo']['phone'] = $phone;
        } else {
            $orderData['orderInfo']['phone'] = '';
        }
        //total
        $orderData['orderInfo']['price'] = filter_var($orderData['orderInfo']['total'], FILTER_SANITIZE_STRING);

        //date
        $orderData['orderInfo']['date'] = filter_var($orderData['orderInfo']['date'], FILTER_SANITIZE_STRING);

        //time
        $orderData['orderInfo']['time'] = filter_var($orderData['orderInfo']['time'], FILTER_SANITIZE_STRING);


        App::get('db')->insert('orders', $orderData['orderInfo']);

        $recentId = App::get('db')->getLastInsertedId();

        $cart = $orderData['cartInfo']['cart'];

        foreach ($cart as $car) {

            $car['car_id'] = $recentId;

            App::get('db')->insert('car_order', $car);
        }


        return [
            'status' => 'ok'
        ];
    }
}