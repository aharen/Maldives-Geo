<?php

namespace aharen\MaldivesGeo;

use aharen\MaldivesGeo\Island;

class Atoll
{
    private array $data;

    public function __construct()
    {
        $this->data = json_decode(
            file_get_contents(__DIR__.'/data/atolls.json'),
            true
        );
    }

    public function all(): array
    {
        return array_values($this->data);
    }

    public function get($code): ?array
    {
        $code = strtoupper((string) $code);

        foreach ($this->data as $item) {
            if (($item['code'] ?? null) === $code) {
                return $item;
            }
        }

        return null;
    }

    public function getWithIslands($code): ?array
    {
        $out = $this->get($code);

        if (null !== $out) {
            $out['islands'] = (new Island)->getInAtoll($code);
        }

        return $out;
    }
}
