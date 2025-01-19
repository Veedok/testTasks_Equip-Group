<?php

namespace App\Service;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Table
{
    /** @var Table Инстанс  */
    private static $instances;

    /**
     * Инстанс объекта
     * @return Table|static
     */
    public static function getInstanse(): Table|static
    {
        if (!isset(self::$instances)) {
            self::$instances = new static;
        }
        return self::$instances;
    }

    /**
     * Возврашает HTML таблицы
     * @return string
     */
    public function getTable(): string
    {
        return view('table', ['rows' => $this->getRows()])->toHtml();
    }

    /**
     * Возвращает массив строк таблицы в зависимости от параметров
     * @param array $params Параметры запроса
     * @return array
     */
    public function getRows(array $params = []): array
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
        Paginator::getInstanse()->setPagination($query->paginate(10));
        $rows = $query->get();
        return  $rows->toArray();
    }
}
