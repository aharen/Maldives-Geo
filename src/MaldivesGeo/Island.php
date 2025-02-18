<?php

namespace aharen\MaldivesGeo;

use aharen\MaldivesGeo\Atoll;
use Illuminate\Support\Collection;

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

    public function all(): array
    {
        return $this->data->values()->toArray();
    }

    public function get($name, $atoll = null): ?array
    {
        return $this->data
            ->filter(function ($value, $key) use ($name, $atoll) {
                if (null === $atoll) {
                    return $value['name'] === ucwords(strtolower($name));
                }
                return $value['name'] === ucwords(strtolower($name)) && $value['atoll'] === strtoupper($atoll);
            })?->values()->toArray()[0] ?? null;
    }

    public function getWithAtoll($name): ?array
    {
        $out = $this->data
            ->filter(function ($value, $key) use ($name) {
                return $value['name'] === ucwords(strtolower($name));
            })?->values()->toArray()[0] ?? null;

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
