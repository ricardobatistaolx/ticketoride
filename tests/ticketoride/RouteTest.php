<?php

namespace ticketoride;

use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    private $route;

    public function setUp()
    {
        $this->route = new Route(new City("a"), new City("b"), 1, new RouteColor(Color::WHITE));
    }

    public function testGetPoints()
    {
         $this->assertEquals($this->route->getPoints());
    }

    public function testGetLenght()
    {
         $this->assertEquals(1, $this->route->getLenght());
    }

    public function testGetColor()
    {
        $this->assertEquals(Color::WHITE, $this->route->getColor());
    }

    public function testGetCities()
    {
        $this->assertEquals([new City("a"), new City("b")], $this->route->getCities());
    }
}
