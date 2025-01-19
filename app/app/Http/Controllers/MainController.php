<?php

namespace App\Http\Controllers;


use App\Service\Show;
use App\Service\Table;

class MainController extends Controller
{
    public function start()
    {
        return Show::getInstanse()->start();
    }

    public static function get(array $arr)
    {
        return json_encode(Table::getInstanse()->getRows($arr));
    }
}
