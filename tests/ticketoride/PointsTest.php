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
        $this->assertEquals(1, $this->points->calculatePoints($this->createCityWithLength(1)));
    }

    public function testLengthTwoShouldReturnTwoPoints()
    {
        $this->assertEquals(2,$this->points->calculatePoints($this->createCityWithLength(2)));
    }

    public function testLengthThreeShouldReturnFourPoints()
    {
        $this->assertEquals(4, $this->points->calculatePoints($this->createCityWithLength(3)));
    }

    public function testLengthFourShouldReturnSevenPoints()
    {
        $this->assertEquals(7, $this->points->calculatePoints($this->createCityWithLength(4)));
    }

    public function testLengthFiveShouldReturnTenPoints()
    {
        $this->assertEquals(10, $this->points->calculatePoints($this->createCityWithLength(5)));
    }

    public function testLengthSixShouldReturnFifteenPoints()
    {
        $this->assertEquals(15, $this->points->calculatePoints($this->createCityWithLength(6)));
    }

    public function testInvalidLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->points->calculatePoints($this->createCityWithLength(10));
    }

    public function testZeroLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->points->calculatePoints($this->createCityWithLength(0));
    }


    public function testNegativeLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->points->calculatePoints($this->createCityWithLength(-1));
    }

    private function createCityWithLength(int $length)
    {
        return new Route(new City("a"), new City("b"), $length, new RouteColor(Color::WHITE));
    }
}
