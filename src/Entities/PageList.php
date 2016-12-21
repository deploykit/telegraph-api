<?php

namespace Deploykit\Telegraph\Entities;

class PageList extends BaseEntity
{
    public function __construct(array $items)
    {
        parent::__construct($items);

        $this->items['pages'] = array_map(function ($item) {
            return new Page($item);
        }, $this->items['pages']);
    }
}
