<?php

namespace aharen\MaldivesGeo;

use aharen\MaldivesGeo\Atoll;
use DusanKasan\Knapsack\Collection;

class Island
{
    private Collection $data;

    public function __construct()
    {
        $this->data = new Collection(
            json_decode(
                file_get_contents(__DIR__.'/data/islands.json'),
                true
            )
        );
    }

    public function all(): Collection
    {
        return $this->data->values();
    }

    public function get($name): ?array
    {
        return $this->data
            ->find(function ($value, $key) use ($name) {
                return $value['name'] === ucwords(strtolower($name));
            });
    }

    public function getWithAtoll($name): ?array
    {
        $out = $this->data
            ->find(function ($value, $key) use ($name) {
                return $value['name'] === ucwords(strtolower($name));
            });

        if (null !== $out) {
            $out['atoll_detail'] = (new Atoll)->get($out['atoll']);
        }

        return $out;
    }

    public function getInAtoll($code): ?array
    {
        $out = $this->data
            ->filter(function ($value, $key) use ($code) {
                return strtoupper($code) === $value['atoll'];
            })->values()->toArray();

        if (count($out) === 0) {
            return null;
        }

        return $out;
    }
}
