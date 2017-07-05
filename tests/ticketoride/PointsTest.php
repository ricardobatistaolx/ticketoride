<?php
namespace ticketoride;

use PHPUnit\Framework\TestCase;

class PointsTest extends TestCase
{
    private $points;

    public function setUp()
    {
        $this->points = new Points;
    }

    public function testLengthOneShouldReturnOnePoint()
    {
        $this->assertEquals(1, $this->points->calculatePoints(new Route(new City("a"), new City("b"), 1, new RouteColor(Color::WHITE))));
    }

    public function testLengthTwoShouldReturnTwoPoints()
    {
        $this->assertEquals(2, $this->points->calculatePoints(new Route(new City("a"), new City("b"), 2, new RouteColor(Color::WHITE))));
    }

    public function testLengthThreeShouldReturnFourPoints()
    {
        $this->assertEquals(4, $this->points->calculatePoints(new Route(new City("a"), new City("b"), 3, new RouteColor(Color::WHITE))));
    }

    public function testLengthFourShouldReturnSevenPoints()
    {
        $this->assertEquals(7, $this->points->calculatePoints(new Route(new City("a"), new City("b"), 4, new RouteColor(Color::WHITE))));
    }

    public function testLengthFiveShouldReturnTenPoints()
    {
        $this->assertEquals(10, $this->points->calculatePoints(new Route(new City("a"), new City("b"), 5, new RouteColor(Color::WHITE))));
    }

    public function testLengthSixShouldReturnFifteenPoints()
    {
        $this->assertEquals(15, $this->points->calculatePoints(new Route(new City("a"), new City("b"), 6, new RouteColor(Color::WHITE))));
    }

    public function testInvalidLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->points->calculatePoints(new Route(new City("a"), new City("b"), 10, new RouteColor(Color::WHITE)));
    }

    public function testZeroLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->points->calculatePoints(new Route(new City("a"), new City("b"), 0, new RouteColor(Color::WHITE)));
    }


    public function testNegativeLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->points->calculatePoints(new Route(new City("a"), new City("b"), -1, new RouteColor(Color::WHITE)));
    }
}
