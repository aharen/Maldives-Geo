<?php

namespace aharen\MaldivesGeo;

use aharen\MaldivesGeo\Island;
use DusanKasan\Knapsack\Collection;

class Atoll
{
    private Collection $data;

    public function __construct()
    {
        $this->data = new Collection(
            json_decode(
                file_get_contents(__DIR__.'/data/atolls.json'),
                true
            )
        );
    }

    public function all(): array
    {
        return $this->data->values()->toArray();
    }

    public function get($code): ?array
    {
        return $this->data
            ->find(function ($value, $key) use ($code) {
                return $value['code'] === strtoupper($code);
            });
    }

    public function getWithIslands($code): ?array
    {
        $out = $this->data
            ->find(function ($value, $key) use ($code) {
                return $value['code'] === strtoupper($code);
            });

        if (null !== $out) {
            $out['islands'] = (new Island)->getInAtoll($code);
        }

        return $out;
    }
}
