<?php

use aharen\MaldivesGeo\Atoll;
use PHPUnit\Framework\TestCase;

class AtollTest extends TestCase
{
    private $atolls;
    
    protected function setUp(): void
    {
        $this->atolls = new Atoll();
    }
    
    public function test_get_all_atolls()
    {
        $this->assertCount(20, $this->atolls->all());
    }

    public function test_get_by_code_uppercase()
    {
        $this->assertEquals([
            'code' => 'GN',
            'name' => 'Gnaviyani Atoll',
            'alt_name' => 'Fuvahmulah'
        ], $this->atolls->get('GN'));
    }

    public function test_get_by_code_lowercase()
    {
        $this->assertEquals([
            'code' => 'GN',
            'name' => 'Gnaviyani Atoll',
            'alt_name' => 'Fuvahmulah'
        ], $this->atolls->get('gn'));
    }

    public function test_get_by_code_invalid()
    {
        $this->assertNull($this->atolls->get('gns'));
    }

    public function test_get_with_islands_uppercase()
    {
        $this->assertEquals([
            'code' => 'GN',
            'name' => 'Gnaviyani Atoll',
            'alt_name' => 'Fuvahmulah',
            "islands" => [
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
            ]
        ], $this->atolls->getWithIslands('GN'));
    }

    public function test_get_with_islands_lowercase()
    {
        $this->assertEquals([
            'code' => 'GN',
            'name' => 'Gnaviyani Atoll',
            'alt_name' => 'Fuvahmulah',
            "islands" => [
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
            ]
        ], $this->atolls->getWithIslands('gn'));
    }

    public function test_get_with_islands_invalid()
    {
        $this->assertNull($this->atolls->getWithIslands('gns'));
    }
}
