<?php

namespace App\Service;

use App\Models\Menu;
use App\Models\Product;
use function Termwind\render;

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
        $a = $this->getMenuTree();
        return view('main', ['menuItems' => $a]);
    }


    private function getMenuTree($id = 0)
    {
        $groups = Menu::where('id_parent', $id)->get()->toArray();
        array_walk($groups, function (&$el) {
            $el['child'] = $this->getMenuTree($el['id']);
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
