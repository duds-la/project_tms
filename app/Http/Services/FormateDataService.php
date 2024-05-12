<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Facades\FileDelivery;
use App\Http\Services\Api\CarrierApiService;
use App\Http\Services\CarrierService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class FormateDataService
{
    public function formateData(Collection $dataCollection, mixed $position, mixed $param): Collection
    {
        $filteredData = $dataCollection->filter(
            function ($filter) use ($position, $param) {
                return isset($filter[$position]) && $filter[$position] === $param;
            }
        )
            ->values();

        return $filteredData;
    }

    public function formateDataAssociativeArray(Collection $dataCollection, mixed $position, mixed $param): Collection
    {
        $filteredData = $dataCollection->filter(function ($filter) use ($position, $param) {
            return $this->recursiveArraySearch($filter, $position, $param);
        })->values();

        return $filteredData;
    }

    private function recursiveArraySearch(array $array, $position, $param): bool
    {
        if (is_array($position)) {
            foreach ($position as $part) {
                if (!isset($array[$part])) {
                    return false;
                }
                $array = $array[$part];
            }
            return $array === $param;
        } else {
            return isset($array[$position]) && $array[$position] === $param;
        }
    }
}
