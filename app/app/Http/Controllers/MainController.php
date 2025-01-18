<?php

namespace App\Http\Controllers;


use App\Service\Show;

class MainController extends Controller
{
    public function start()
    {
        return Show::getInstanse()->start();
    }
}
