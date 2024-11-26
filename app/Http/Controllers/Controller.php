<?php

namespace App\Http\Controllers;

use App\lib\View\ViewLoader;

abstract class Controller
{
    protected ViewLoader $view;

    public function __construct()
    {
        $this->view = new ViewLoader();
    }
}
