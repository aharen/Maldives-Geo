<?php

namespace aharen\MaldivesGeo;

use Tightenco\Collect\Support\Collection;

class Island
{
    private Collection $data;

    public function __construct()
    {
        $this->data = collect(
            json_decode(
                file_get_contents(__DIR__.'/data/islands.json'),
                true
            )
        );
    }

    public function all(): array
    {
        return $this->data->toArray();
    }

    public function get($name): ?array
    {
        return $this->data
            ->where('name', ucwords(strtolower($name)))
            ->values()
            ->first();
    }

    public function getInAtoll($code): ?array
    {
        $out = $this->data
            ->where('atoll', strtoupper($code))
            ->values();

        if ($out->count() > 0) {
            return $out->toArray();
        }

        return null;
    }
}
