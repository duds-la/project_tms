<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface CarrierSearchInterface
{
    public function searchByName(string $name): Collection;

    public function searchByUuid(string $uuid): Collection;
}