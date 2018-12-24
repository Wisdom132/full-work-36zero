<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function notFound()
    {
    	return view('errors.404');
    }

    public function unauthorized()
    {
    	return view('errors.403');
    }
}
