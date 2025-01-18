<?php

namespace app\Service;

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

    public function getTable()
    {
        return view('table', ['rows' => $this->getRows()])->toHtml();
    }

    private function getRows()
    {
        $rows = DB::table('products')
            ->join('prices', 'products.id', '=', 'prices.id_product')
            ->whereNotNull('prices.price')
            ->select('products.name', 'prices.price')->limit(10)
            ->get();
        return $rows->toArray();
    }
}
