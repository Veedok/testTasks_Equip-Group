<?php

namespace App\Service;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Table
{
    private static $instances;

    public static function getInstanse()
    {
        if (!isset(self::$instances)) {
            self::$instances = new static;
        }
        return self::$instances;
    }

    public function getTable($id = null)
    {
        return view('table', ['content' => $this->getRows()])->toHtml();
    }

    public function getRows($params = [])
    {
        $query = DB::table('products')
            ->join('prices', 'products.id', '=', 'prices.id_product')
            ->whereNotNull('prices.price')
            ->select('products.name', 'prices.price')->limit(10);
        if (!empty($params['groupID'])) {
            $query->where('products.id_group', (int)$params['groupID']);
        }
        if (empty($params['newGroup'])) {
            if (!empty($params['sortRow']) && (empty($params['sort']) || $params['sort'] == 'asc')) {
                $query->orderBy($params['sortRow']);
            } elseif (!empty($params['sortRow']) && !empty($params['sort'])) {
                $query->orderBy($params['sortRow'], 'desc');
            }

        }
        $paginator = $query->paginate(10);
        $rows = $query->get();

        return [
            'rows' => $rows->toArray(),
            'paginator' => $paginator
        ];
    }
}
