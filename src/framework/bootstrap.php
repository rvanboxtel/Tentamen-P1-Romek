<?php
declare(strict_types=1);

use Romek\framework\App;
use Romek\framework\database\QueryBuilder;
use Romek\framework\database\Connection;

//add config to the container
App::bind('config', require 'config/config.php');

//add database access to the container
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
