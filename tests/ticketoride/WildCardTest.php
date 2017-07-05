<?php
namespace ticketoride;

use PHPUnit\Framework\TestCase;

class WildCardTest extends TestCase
{
    public function testIsWildCard()
    {
        $this->assertEquals("wildcard", new WildCard());
    }
}