<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AuthenticationController extends Controller
{
    public function loginForm(): View
    {
        return $this->view->load('auth.login');
    }
}
