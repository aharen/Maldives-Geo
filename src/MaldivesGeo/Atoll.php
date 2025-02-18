<?php

namespace aharen\MaldivesGeo;

use aharen\MaldivesGeo\Island;
use Illuminate\Support\Collection;

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
            ->filter(function ($value, $key) use ($code) {
                return $value['code'] === strtoupper($code);
            })
            ?->values()->toArray()[0] ?? null;
    }

    public function getWithIslands($code): ?array
    {
        $out = $this->data
            ->filter(function ($value, $key) use ($code) {
                return $value['code'] === strtoupper($code);
            })?->values()->toArray()[0] ?? null;

        if (null !== $out) {
            $out['islands'] = (new Island)->getInAtoll($code);
        }

        return $out;
    }
}
