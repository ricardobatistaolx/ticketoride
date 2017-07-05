<?php
namespace ticketoride;

use PHPUnit\Framework\TestCase;

class ColorCardTest extends TestCase
{
    public function testGetColorShouldAssertEquals()
    {
        $card = new ColorCard(new Color(Color::BLACK));
        $this->assertEquals("black", $card->getColor());
    }

    public function testToStringShouldAssertEquals()
    {
        $card = new ColorCard(new Color(Color::BLUE));
        $this->assertEquals("colorcard: blue", $card);
    }
}