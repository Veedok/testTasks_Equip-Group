<?php

namespace App\Http\Controllers;


use App\Service\Paginator;
use App\Service\Show;
use App\Service\Table;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
/** Контроллер для работы со списком товаров */
class MainController extends Controller
{
    /**
     * Метод вызываемый при загрузке главной страницы
     * @return Factory|View|Application
     */
    public function start(): Factory|View|Application
    {
        return Show::getInstanse()->start();
    }


    /**
     * Основной метод работы с приложением
     * @param array $arr Параметры запроса
     * @return false|string
     */
    public static function get(array $arr): false|string
    {
        return json_encode(['row'=>Table::getInstanse()->getRows($arr)]);
    }
}
