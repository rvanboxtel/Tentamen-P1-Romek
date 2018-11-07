<?php
declare(strict_types=1);

namespace Romek\framework\database;

use PDO;
use PDOException;

final class Connection
{
    /**
     * Make a PDO connection
     *
     * @param array $config
     * @return PDO
     */
    public static function make(array $config): PDO
    {
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}
