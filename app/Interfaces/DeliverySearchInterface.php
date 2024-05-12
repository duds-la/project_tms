<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface DeliverySearchInterface
{
    public function searchByCPF(string $cpf): Collection;

    public function searchWithoutCPF(): Collection;

    public function searchDeatilsDelivery(string $uuid): Collection;
}