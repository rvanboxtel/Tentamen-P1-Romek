<?php
declare(strict_types=1);

//Public pages routes
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');

//Contact form
$router->get('contact', 'ContactController@contact');
$router->post('contact', 'ContactController@contact');
$router->post('contactSubmit', 'ContactController@contactSubmit');

//Login/logout routes
$router->get('login', 'LoginController@create');
$router->post('login', 'LoginController@store');
$router->get('logout', 'LoginController@destroy');

//Register routes
$router->get('register', 'RegistrationController@create');
$router->post('register', 'RegistrationController@store');

//User routes
$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
$router->get('users/edit', 'UsersController@edit');
$router->post('users/update', 'UsersController@update');
$router->post('users/destroy', 'UsersController@destroy');

//Events routes
$router->get('events', 'EventsController@index');
$router->post('events', 'EventsController@store');
$router->post('events/picture/store', 'EventsController@storePicture');
$router->post('events/picture/update', 'EventsController@updatePicture');
$router->post('events/picture/destroy', 'EventsController@destroyPicture');
$router->get('events/create', 'EventsController@create');
$router->get('events/show', 'EventsController@show');
$router->get('events/edit', 'EventsController@edit');

//Day2DayInformation routes
$router->get('day2dayinformation', 'Day2DayInformationController@index');
$router->post('day2dayinformation', 'Day2DayInformationController@store');
$router->get('day2dayinformation/create', 'Day2DayInformationController@create');
$router->get('day2dayinformation/show', 'Day2DayInformationController@show');
$router->get('day2dayinformation/edit', 'Day2DayInformationController@edit');
$router->post('day2dayinformation/edit', 'Day2DayInformationController@update');
$router->post('day2dayinformation/comment', 'Day2DayInformationController@storeComment');




//Comments
$router->post('events/comment', 'EventsController@storeComment');