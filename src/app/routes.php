<?php
declare(strict_types=1);

// Forums
$router->get('', 'ForumController@index');
$router->get('/builds', 'ForumController@show');
$router->post('/builds/comment', 'ForumController@comment');
$router->get('/create', 'ForumController@create');
$router->post('/create/post', 'ForumController@post');

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
$router->get('users/edit', 'UsersController@edit');
$router->post('users', 'UsersController@store');
$router->post('users/ban', 'UsersController@ban');
$router->post('users/update', 'UsersController@update');
$router->post('users/destroy', 'UsersController@destroy');


//Moderation Panels
$router->get('moderation', 'ModerationController@index');