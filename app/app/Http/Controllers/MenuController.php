<?php

namespace App\Http\Controllers;


use App\Service\Show;

class MenuController extends Controller
{
    public function showAll()
    {
        return Show::getInstanse()->start();
    }
}
