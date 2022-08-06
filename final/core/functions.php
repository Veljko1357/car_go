<?php


function view($name, $data = [])
{

    extract($data);

    require "views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: {$path}");
}


function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function check_auth()
{
    if (!isset($_SESSION['user'])) {
        return redirect('/login');
    }
}
