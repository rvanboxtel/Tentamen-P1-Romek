<?php
declare(strict_types=1);

use Team13CD\framework\App;
use Team13CD\framework\database\QueryBuilder;
use Team13CD\framework\database\Connection;

//add config to the container
App::bind('config', require 'config/config.php');

//add database access to the container
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
