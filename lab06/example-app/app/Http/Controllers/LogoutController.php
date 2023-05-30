<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LogoutController extends Controller
{
    public function execute(): Redirector
    {
        return redirect('login');
    }
}
