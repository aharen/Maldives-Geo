<?php

namespace aharen\MaldivesGeo;

use aharen\MaldivesGeo\Atoll;

class Island
{
    private array $data;

    public function __construct()
    {
        $this->data = json_decode(
            file_get_contents(__DIR__.'/data/islands.json'),
            true
        );
    }

    public function all(): array
    {
        return array_values($this->data);
    }

    public function get($name, $atoll = null): ?array
    {
        $name = ucwords(strtolower((string) $name));
        $atollCode = null === $atoll ? null : strtoupper((string) $atoll);

        foreach ($this->data as $item) {
            if (($item['name'] ?? null) !== $name) {
                continue;
            }

            if (null === $atollCode) {
                return $item;
            }

            if (($item['atoll'] ?? null) === $atollCode) {
                return $item;
            }
        }

        return null;
    }

    public function getWithAtoll($name): ?array
    {
        $out = $this->get($name);

        if (null !== $out) {
            $out['atoll_detail'] = (new Atoll)->get($out['atoll']);
        }

        return $out;
    }

    public function getInAtoll($code): ?array
    {
        $code = strtoupper((string) $code);
        $out = array_values(array_filter(
            $this->data,
            static fn (array $item): bool => ($item['atoll'] ?? null) === $code
        ));

        if (count($out) === 0) {
            return null;
        }

        return $out;
    }
}
