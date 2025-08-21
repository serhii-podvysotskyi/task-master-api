<?php

namespace App\DataTransferObjects;

abstract readonly class DataTransferObject
{
    public function toArray(): array
    {
        $json = json_encode($this);
        return json_decode($json, true);
    }
}
