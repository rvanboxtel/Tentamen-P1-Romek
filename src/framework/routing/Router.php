<?php
declare(strict_types=1);

namespace Romek\framework\routing;

use \Exception;

final class Router
{
    /**
     * All routes are stored here
     *
     * @var array $routes
     */
    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * Register all routes from the routes path
     * From a file, load every route registered with $router->get or $router->post
     *
     * @param string $pathToRoutesFile
     */
    public function __construct(string $pathToRoutesFile)
    {
        $router = $this; //the variable $router is used in the routes file (which is required on the next line)
        require $pathToRoutesFile; //register every route in this file
    }

    /**
     * Register a GET route
     *
     * @param string $uri
     * @param string $controller
     */
    public function get(string $uri, string $controller)
    {
        $_SERVER['HTTP_HOST'] === 'adsd.clow.nl' ? $prefix = '~s1127680/P1_OOAPP_Tentamen' : $prefix = '';
        $this->routes['GET'][trim("$uri", '/')] = $controller;
    }

    /**
     * Register a $router->post route
     *
     * @param string $uri
     * @param string $controller
     */
    public function post(string $uri, string $controller)
    {
        $_SERVER['HTTP_HOST'] === 'adsd.clow.nl' ? $prefix = '~s1127680/P1_OOAPP_Tentamen' : $prefix = '';
        $this->routes['POST'][trim("$uri", '/')] = $controller;
    }

    /**
     * If the given URI with its request method exists, it will call its controller method
     *
     * @param string $uri
     * @param string $requestMethod
     * @throws Exception
     */
    public function direct(string $uri, string $requestMethod)
    {
        //example: does the URI 'user/quincy' exist with the request method GET
        if (array_key_exists($uri, $this->routes[$requestMethod])) {
            //call the controller 'UsersController' and call its method 'show'
            $this->callControllerMethod(
                ...explode('@', $this->routes[$requestMethod][$uri])
            );

            return; //if this works stop here
        }

        //if the route does not exist, throw an exception
        throw new Exception('No route defined for this URI');
    }

    /**
     * Call the requested controller method
     *
     * @param string $controller
     * @param string $method
     *
     * @throws Exception
     */
    private function callControllerMethod(string $controller, string $method)
    {
        $controller = "Romek\\app\\controllers\\{$controller}";
        $controller = new $controller;
        if (!method_exists($controller, $method)) {
            throw new Exception("Method \"{$method}\"  in \"" . get_class($controller) . "\" does not respond or exist.");
        }

        $controller->$method();
    }
}
