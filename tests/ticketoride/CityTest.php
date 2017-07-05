<?php

namespace ticketoride;

use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    public function testGetName()
    {
        $name = "name";
        $city = new City($name);
        $this->assertEquals($name, $city->getName());
    }
}
