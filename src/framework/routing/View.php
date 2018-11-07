<?php
declare(strict_types=1);

namespace Romek\framework\routing;

final class View
{
    /**
     * Load a view
     *
     * @param string $name
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public static function load(string $name, array $data = [])
    {
        /*
        * Array keys from $data become variables
        * $data = [
        *  'name' => 'Quincy',
        *  'explanation' => 'http://php.net/manual/en/function.extract.php
        * ]
        * extract($data);
        *
        * echo $name (output: 'Quincy')
        * echo $explanation (output: 'http://php.net/manual/en/function.extract.php')
        */
        if (!empty($data)) {
            extract($data);
        }

        //get the contents of the view
        $body = "src/app/views/{$name}.view.php";

        //if the user exists get the information from a logged in user, or return false
        $userSession = (new \Team13CD\framework\authentication\Authentication())->checkIfLoggedIn() ? (new \Team13CD\framework\authentication\Authentication())->user() : false;
        $_SERVER['HTTP_HOST'] === 'adsd.clow.nl' ? $prefix = '/~2018_p1_13/P1_OOAPP_Opdracht' : $prefix = '';

        //extract it for the master.view.php
        if (!empty($data)) {
            extract([
                'body' => $body,
                'userSession' => $userSession,
                'prefix' => $prefix
            ]);
        };

        //return the app.view.php with the body contents
        return require "src/app/views/layouts/master.view.php";
    }

    /**
     * Redirect to a view
     *
     * @param string $path
     */
    public static function redirect(string $path)
    {
        header("Location: /{$path}");
    }
}
