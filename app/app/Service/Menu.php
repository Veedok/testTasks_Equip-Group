<?php

namespace App\Service;

use App\Models\Groups;
use App\Models\Product;

/** Класс формирования меню */
class Menu
{
    /** @var Menu Инстанс  */
    private static Menu $instances;

    /**
     * Инстанс объекта
     * @return Menu|static
     */
    public static function getInstanse(): Menu|static
    {
        if (!isset(self::$instances)) {
            self::$instances = new static;
        }
        return self::$instances;
    }

    /**
     * Преобразование меню в разметку
     * @return string
     */
    public function getMenu(): string
    {
       return view('menu', ['menu' => $this->getTree()])->toHtml();
    }

    /**
     * Рекурсивный метод формирования меню
     * @param $id int ID пункта для уого формируем потомков
     * @return array
     */
    public function getTree(int $id = 0): array
    {
        $groups = Groups::where('id_parent', $id)->get()->toArray();
        array_walk($groups, function (&$el) {
            $el['child'] = $this->getTree($el['id']);
            $el['count'] = Product::where('id_group', $el['id'])->count();
            if (!empty($el['child'])) {
                $el['count'] = $el['count'] + array_sum(array_column($el['child'], 'count'));
                $el['body'] = view('acord', ['item' => $el, 'child' => implode(array_column($el['child'], 'body'))])->toHtml();
            } else {
                $el['body'] = view('link', ['item' => $el])->toHtml();
            }
        });
        return $groups;
    }
}
