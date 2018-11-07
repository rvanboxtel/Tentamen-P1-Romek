<?php
declare(strict_types=1);

//Public pages routes
$router->get('', 'PagesController@home');


//Login/logout routes
$router->get('login', 'LoginController@create');
$router->post('login', 'LoginController@store');
$router->get('banned', 'LoginController@banned');
$router->get('logout', 'LoginController@destroy');

//Register routes
$router->get('register', 'RegistrationController@create');
$router->post('register', 'RegistrationController@store');

//User routes
$router->get('users', 'UsersController@index');
$router->post('users/ban', 'UsersController@ban');
$router->post('users', 'UsersController@store');
$router->get('users/edit', 'UsersController@edit');
$router->post('users/update', 'UsersController@update');
$router->post('users/destroy', 'UsersController@destroy');

// Forums
$router->get('forum', 'ForumController@index');

//Moderation Panels
$router->get('moderation', 'ModerationController@index');