<?php
declare(strict_types=1);

// Forums
$router->get('~s1127680/P1_OOAPP_Tentamen', 'ForumController@index');
$router->get('~s1127680/P1_OOAPP_Tentamen/builds', 'ForumController@show');
$router->post('~s1127680/P1_OOAPP_Tentamen/builds/comment', 'ForumController@comment');
$router->get('~s1127680/P1_OOAPP_Tentamen/create', 'ForumController@create');
$router->post('~s1127680/P1_OOAPP_Tentamen/create/post', 'ForumController@post');

//Login/logout routes
$router->get('~s1127680/P1_OOAPP_Tentamen/login', 'LoginController@create');
$router->post('~s1127680/P1_OOAPP_Tentamen/login', 'LoginController@store');
$router->get('~s1127680/P1_OOAPP_Tentamen/banned', 'LoginController@banned');
$router->get('~s1127680/P1_OOAPP_Tentamen/logout', 'LoginController@destroy');

//Register routes
$router->get('~s1127680/P1_OOAPP_Tentamen/register', 'RegistrationController@create');
$router->post('~s1127680/P1_OOAPP_Tentamen/register', 'RegistrationController@store');

//User routes
$router->get('~s1127680/P1_OOAPP_Tentamen/users', 'UsersController@index');
$router->get('~s1127680/P1_OOAPP_Tentamen/edit', 'UsersController@edit');
$router->post('~s1127680/P1_OOAPP_Tentamen/users', 'UsersController@store');
$router->post('~s1127680/P1_OOAPP_Tentamen/users/ban', 'UsersController@ban');
$router->post('~s1127680/P1_OOAPP_Tentamen/users/update', 'UsersController@update');
$router->post('~s1127680/P1_OOAPP_Tentamen/users/destroy', 'UsersController@destroy');


//Moderation Panels
$router->get('~s1127680/P1_OOAPP_Tentamen/moderation', 'ModerationController@index');
