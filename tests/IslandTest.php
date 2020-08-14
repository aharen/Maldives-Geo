<?php

use aharen\MaldivesGeo\Island;
use PHPUnit\Framework\TestCase;

class IslandTest extends TestCase
{
    private $islands;

    protected function setUp(): void
    {
        $this->islands = new Island();
    }

    public function test_get_all_islands()
    {
        $this->assertCount(1103, $this->islands->all());
    }

    public function test_get_island_by_name_lowercase()
    {
        $this->assertEquals([
            "atoll" => "HDH",
            "type" => "Islands",
            "name" => "Vaikaradhoo",
            "alt_name" => null,
            "latitude" => "6.549444444",
            "longitude" => "72.95305556",
            "flags" => [
                "I"
            ]
            ], $this->islands->get('vaikaradhoo'));
    }

    public function test_get_island_by_name_uppercase()
    {
        $this->assertEquals([
            "atoll" => "HDH",
            "type" => "Islands",
            "name" => "Vaikaradhoo",
            "alt_name" => null,
            "latitude" => "6.549444444",
            "longitude" => "72.95305556",
            "flags" => [
                "I"
            ]
            ], $this->islands->get('VAIKARADHOO'));
    }

    public function test_get_island_by_name_invalid()
    {
        $this->assertNull($this->islands->get('developerdhoo'));
    }

    public function test_get_island_with_atoll_lowercase()
    {
        $this->assertEquals([
            "atoll" => "HDH",
            "type" => "Islands",
            "name" => "Vaikaradhoo",
            "alt_name" => null,
            "latitude" => "6.549444444",
            "longitude" => "72.95305556",
            "flags" => [
                "I"
            ],
            "atoll_detail" => [
                "code" => "HDH",
                "name" => "Haa Dhaalu Atoll",
                "alt_name" => "Thiladhunmathi Dhekunuburi"
            ]
        ], $this->islands->getWithAtoll('vaikaradhoo'));
    }

    public function test_get_island_with_atoll_uppercase()
    {
        $this->assertEquals([
            "atoll" => "HDH",
            "type" => "Islands",
            "name" => "Vaikaradhoo",
            "alt_name" => null,
            "latitude" => "6.549444444",
            "longitude" => "72.95305556",
            "flags" => [
                "I"
            ],
            "atoll_detail" => [
                "code" => "HDH",
                "name" => "Haa Dhaalu Atoll",
                "alt_name" => "Thiladhunmathi Dhekunuburi"
            ]
        ], $this->islands->getWithAtoll('VAIKARADHOO'));
    }

    public function test_get_island_with_atoll_invalid()
    {
        $this->assertNull($this->islands->getWithAtoll('developerdhoo'));
    }

    public function test_get_in_atoll_uppercase()
    {
        $this->assertEquals([
            [
                "atoll" => "GN",
                "type" => "Islands",
                "name" => "Fuvahmulah",
                "alt_name" => null,
                "latitude" => "-0.295555556",
                "longitude" => "73.42472222",
                "flags" => [
                    "I",
                    "ADF,H"
                ]
            ]
        ], $this->islands->getInAtoll('GN'));
    }

    public function test_get_in_atoll_lowercase()
    {
        $this->assertEquals([
            [
                "atoll" => "GN",
                "type" => "Islands",
                "name" => "Fuvahmulah",
                "alt_name" => null,
                "latitude" => "-0.295555556",
                "longitude" => "73.42472222",
                "flags" => [
                    "I",
                    "ADF,H"
                ]
            ]
        ], $this->islands->getInAtoll('gn'));
    }
    
    public function test_get_in_atoll_invalid()
    {
        $this->assertNull($this->islands->getInAtoll('gns'));
    }
}
