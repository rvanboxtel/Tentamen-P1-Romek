<?php
declare(strict_types=1);

require 'vendor/autoload.php'; //require every namespaced class with composer
require 'src/framework/bootstrap.php'; //bind keys to the App container

use Romek\framework\routing\Router;
use Romek\framework\routing\Request;

//register routes from routes.php
$router = new Router('src/app/routes.php');

//direct the GET or POST request to the uri
$router->direct(Request::uri(), Request::method());
