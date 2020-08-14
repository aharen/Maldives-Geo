<?php

namespace aharen\MaldivesGeo;

use Tightenco\Collect\Support\Collection;

class Atoll
{
    private Collection $data;

    public function __construct()
    {
        $this->data = collect(
            json_decode(
                file_get_contents(__DIR__.'/data/atolls.json'),
                true
            )
        );
    }

    public function all(): array
    {
        return $this->data->toArray();
    }

    public function get($code): ?array
    {
        return $this->data
            ->where('code', strtoupper($code))
            ->first();
    }
}
