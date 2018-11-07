<?php
declare(strict_types=1);

namespace Team13CD\framework\routing;

final class Request
{
    /**
     * Get the URI without request parameters and cut off the '/' at the beginning and end
     * This method will turn "/users?name=quincy" into "users"
     *
     * @return string
     */
    public static function uri(): string
    {
        //function trim will cut off the '/' at the beginning and the end
        return trim(
            //turn "/users?name=quincy" into "/users" by retrieving the PHP_URL_PATH ('/users') from the REQUEST_URI ('/users?name=quincy')
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }

    /**
     * Get the request method
     *
     * @return string
     */
    public static function method(): string
    {
        //return a request method such as 'GET' or 'POST'
        return $_SERVER['REQUEST_METHOD'];
    }
}
