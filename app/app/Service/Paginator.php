<?php

namespace App\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/** Класс для сохранения пагинации поиска */
class Paginator
{
    /** @var Paginator Инстанс  */
    private static Paginator $instances;
    private ?LengthAwarePaginator $pagination;

    /**
     * Инстанс объекта
     * @return Paginator|static
     */
    public static function getInstanse(): Paginator|static
    {
        if (!isset(self::$instances)) {
            self::$instances = new static;
        }
        return self::$instances;
    }

    /**
     * @return LengthAwarePaginator|null
     */
    public function getPagination(): ?LengthAwarePaginator
    {
        return $this->pagination;
    }

    /**
     * @param mixed $pagination
     */
    public function setPagination(LengthAwarePaginator $pagination): void
    {
        $this->pagination = $pagination;
    }
}
