<?php

namespace app\Service;

use App\Models\Groups;
use App\Models\Product;

class Menu
{
    private static $instances;

    public static function getInstanse()
    {
        if (!isset(self::$instances)) {
            self::$instances = new static;
        }
        return self::$instances;
    }

    public function getMenu()
    {
       return view('menu', ['menu' => $this->getTree()])->toHtml();
    }
    public function getTree($id = 0)
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
