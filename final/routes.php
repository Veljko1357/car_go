<?php


$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');

$router->get('contact', 'PagesController@contact');

$router->get('orders', 'PagesController@orders');

$router->get('cars', 'CarsController@index');
$router->get('cars/upload', 'CarsController@upload');
$router->post('cars/upload', 'CarsController@store');
$router->get('cars/edit', 'CarsController@edit');
$router->post('cars/edit', 'CarsController@update');
$router->get('cars/delete', 'CarsController@delete');
$router->post('cars/update', 'CarsController@update');

$router->get('users', 'UsersController@index');
$router->get('users/create', 'UsersController@create');
$router->post('users', 'UsersController@store');
$router->get('users/show', 'UsersController@show');
$router->get('users/edit', 'UsersController@edit');
$router->post('users/edit', 'UsersController@update');
$router->get('users/destroy', 'UsersController@destroy');


$router->get('register', 'AuthController@showRegistrationForm');
$router->post('register', 'AuthController@register');

$router->get('login', 'AuthController@login');
$router->post('login', 'AuthController@login');

$router->get('logout', 'AuthController@logout');


/**
 *
 * API ROUTES
 */

$router->get('api/cars', 'ApiCarsController@index');
$router->get('api/faq', 'ApiFaqController@index');
$router->post('api/orders', 'ApiOrdersController@store');