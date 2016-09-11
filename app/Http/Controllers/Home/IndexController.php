<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller as LaravelController;

class IndexController extends LaravelController
{

    public function index()
    {
        return view('home.index');
    }

}
