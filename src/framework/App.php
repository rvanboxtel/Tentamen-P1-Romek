<?php
declare(strict_types=1);

namespace Team13CD\framework;

use \Exception;

final class App
{
    /**
     * Stores anything that is binded through the bind method
     *
     * @var array
     */
    private static $container;

    /**
     * Store something into the container
     *
     * @param string $key
     * @param $value
     */
    public static function bind(string $key, $value)
    {
        static::$container[$key] = $value;
    }

    /**
     * Get something from the container
     *
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    public static function get(string $key)
    {
        if (!static::has($key)) {
            throw new Exception("No {$key} is bound in the container");
        }

        return static::$container[$key];
    }

    /**
     * Check if something is in the container
     *
     * @param string $key
     * @return bool
     * @throws Exception
     */
    public static function has(string $key)
    {
        if (!array_key_exists($key, static::$container)) {
            return false;
        }

        return true;
    }
}
