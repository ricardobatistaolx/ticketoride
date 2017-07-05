<?php

namespace ticketoride;

use PHPUnit\Framework\TestCase;

class RouteColorTest extends TestCase
{

    public function testGetColor()
    {
        $routeColor = new RouteColor(Color::WHITE);
        $this->assertEquals(Color::WHITE, $routeColor->getColor());
    }
}
