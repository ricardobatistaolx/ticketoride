<?php
namespace ticketoride;

use PHPUnit\Framework\TestCase;

class PointsTest extends TestCase
{
    public function testLengthOneShouldReturnOnePoint()
    {
        $points = new Points(1);
        $this->assertEquals(1, $points->getPoints());
    }

    public function testLengthTwoShouldReturnTwoPoints()
    {
        $points = new Points(2);
        $this->assertEquals(2, $points->getPoints());
    }

    public function testLengthThreeShouldReturnFourPoints()
    {
        $points = new Points(3);
        $this->assertEquals(4, $points->getPoints());
    }

    public function testLengthFourShouldReturnSevenPoints()
    {
        $points = new Points(4);
        $this->assertEquals(7, $points->getPoints());
    }

    public function testLengthFiveShouldReturnTenPoints()
    {
        $points = new Points(5);
        $this->assertEquals(10, $points->getPoints());
    }

    public function testLengthSixShouldReturnFifteenPoints()
    {
        $points = new Points(6);
        $this->assertEquals(15, $points->getPoints());
    }

    public function testInvalidLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Points(10);
    }

    public function testZeroLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Points(0);
    }


    public function testNegativeLengthShouldThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Points(-1);
    }
}