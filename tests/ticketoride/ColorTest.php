<?php

namespace ticketoride;

use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    public function testGetColor()
    {
        $this->assertEquals(Color::WHITE, new Color(Color::WHITE));
    }
}
