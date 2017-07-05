<?php

namespace ticketoride;

use PHPUnit\Framework\TestCase;

class RouteColorTest extends TestCase
{

    public function testGetColor()
    {
        $routeColor = new RouteColor(RouteColor::GRAY);
        $this->assertEquals(RouteColor::GRAY, $routeColor->getColor());
    }
}
