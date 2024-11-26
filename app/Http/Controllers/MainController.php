<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MainController extends Controller
{
    public function homeAction(): View
    {
        return $this->view->load(
            'home.home',
            []
        );
    }
}
