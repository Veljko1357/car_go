<?php

namespace App\Controllers;

use App\Core\App;


class AuthController
{

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register()
    {
        if ($_POST['password'] != $_POST['confirm_password']) {
            return redirect('/registration');
        }

        unset($_POST['confirm_password']);

        $user = $_POST;

        $user['password'] = md5($user['password']);

        App::get('db')->insert('users', $user);


        return redirect('login');
    }


    public function showLoginForm()
    {
        $message = "";
        return view('login', compact('message'));
    }

    public function login()
    {

        $user = App::get('db')->select('users', ['email' => $_POST['email']]);


        if (!$user) {
            $message = "There is no such user";
            return view('/login', compact('message'));
        }

        if ($user->password != md5($_POST['password'])) {
            $message = "Credentials are not good";
            return view('/login', compact('message'));
        }

        unset($user->password);
        
        $_SESSION['user'] = $user;
       
        return redirect('/cars');
    }

    public function logout()
    {
        $_SESSION['user'] = null;
        session_destroy();

        return redirect('/');
    }
    

}