<?php

namespace App\Service;

class Show
{
    private static $instances;

    public static function getInstanse()
    {
        if (!isset(self::$instances)) {
            self::$instances = new static;
        }
        return self::$instances;
    }

    public function start()
    {
        return view('main', [
            'menu' => Menu::getInstanse()->getMenu(),
            'table' => Table::getInstanse()->getTable()
        ]);
    }

}
