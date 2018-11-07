<?php
declare(strict_types=1);

namespace Romek\app\controllers;

use Romek\framework\App;
use Romek\framework\routing\View;

final class PagesController
{
    /**
     * Display the home page
     *
     * @throws \Exception
     */
    public function home()
    {
        View::load('pages/index');
    }

    /**
     * Display the about page
     *
     * @throws \Exception
     */
    public function about()
    {
        $company = 'Voorbeeld';

        View::load('pages/about', [
            'company' => $company
        ]);
    }
}
