<?php

namespace App\Service;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class Show
{
    /** @var Show Инстанс  */
    private static Show $instances;

    /**
     * Инстанс объекта
     * @return Show|static
     */
    public static function getInstanse(): Show|static
    {
        if (!isset(self::$instances)) {
            self::$instances = new static;
        }
        return self::$instances;
    }

    /**
     * Отображение стартовой страницы
     * @return View|Factory|Application
     */
    public function start(): View|Factory|Application
    {
        return view('main', [
            'menu' => Menu::getInstanse()->getMenu(),
            'table' => Table::getInstanse()->getTable(),
            'paginator' => Paginator::getInstanse()->getPagination()?->toHtml()
        ]);
    }

}
