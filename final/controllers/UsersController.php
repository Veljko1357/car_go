<?php

namespace App\Controllers;

use App\Core\App;

class   UsersController
{

    public function index()
    {
        check_auth();
        $users = App::get('db')->selectAll('users');

        return view('users-index', compact('users'));
    }

    public function create()
    {
        check_auth();
        return view('users-create');
    }

    public function store()
    {
        check_auth();


        //name
        $_POST['name'] = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING), ' ');
        if ($_POST['name'] == '' or $_POST['name'] == null) {
            return redirect('/users');
        }

        //email
        $_POST['email'] = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), ' ');
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return redirect('/users');
        }

        //password
        $_POST['password'] = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING), ' ');
        if ($_POST['password'] == '' or $_POST['password'] == null) {
            return redirect('/users');

            $user = App::get('db')->getOneByField('users', $_POST);

            //if the user already exists or there is a missing input field, it will redirect to /users without creating a new account
            if ($user or $pass == '' or $_POST['name'] == '' or $_POST['email'] == '') {
                return redirect('/users');
            }

            //creating hashed password
            $salt = substr(md5(time()), 0, 22);
            $_POST['password'] = crypt($pass, '$2a$10$' . $salt);

            return redirect('/users');
        }
        App::get('db')->insert('users', $_POST);
        return redirect('/users');

    }


    public function edit()
    {
        check_auth();
        $user = App::get('db')->select('users', $_GET);

        return view('users-edit', compact('user'));
    }

 

    public function update()
    {
        check_auth();

        //sanitization and validation
        $_POST['id'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

        if (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) {

            return redirect('/users');

        }

        //name
        $_POST['name'] = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING), ' ');

        if ($_POST['name'] == '' or $_POST['name'] == null) {

            return redirect('/users');

        }

        //email
        $_POST['email'] = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), ' ');

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            return redirect('/users');

        }

        //password
        $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if ($_POST['password'] == '' or $_POST['password'] == null ) {

            return redirect('/users');

        }


       
      
        App::get('db')->update('users', $_POST);
        return redirect('/users');
    }

    
    public function destroy()
    {


        $olduser = App::get('db')->select('users', ['id' => $_GET['id']]);

        if ($olduser->image) {
            $path = getcwd() . '/images/';
            unlink($path . $olduser->image);
        }

        App::get('db')->delete('users', $_GET);

        return redirect('/users');
    }

}