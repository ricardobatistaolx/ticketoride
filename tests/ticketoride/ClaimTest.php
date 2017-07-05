<?php

namespace ticketoride;

use PHPUnit\Framework\TestCase;

class ClaimTest extends TestCase
{
    private $claim;

    public function setUp()
    {
        $this->claim = new Claim();
    }

    public function testCantClaimWithDifferentColorsCards()
    {
        $cards = [$this->createColorCard(Color::RED), $this->createColorCard(Color::RED)];
        $route = $this->createRoute(2, RouteColor::BLUE);
        $this->assertFalse($this->claim->canClaim($route, $cards));
    }

    public function testCanClaimWithSameColorCards()
    {
        $cards = [$this->createColorCard(Color::BLUE), $this->createColorCard(Color::BLUE)];
        $route = $this->createRoute(2, RouteColor::BLUE);
        $this->assertTrue($this->claim->canClaim($route, $cards));
    }

    public function testCanClaimWithWildCards()
    {
        $cards = [new WildCard(), new WildCard()];
        $route = $this->createRoute(2, RouteColor::WHITE);
        $this->assertTrue($this->claim->canClaim($route, $cards));
    }

    public function testCanClaimWithMixedCards()
    {
        $cards = [$this->createColorCard(Color::WHITE), new WildCard()];
        $route = $this->createRoute(2, RouteColor::WHITE);
        $this->assertTrue($this->claim->canClaim($route, $cards));
    }

    public function testCanClaimGrayRoute()
    {
        $cards = [$this->createColorCard(Color::WHITE), $this->createColorCard(Color::WHITE)];
        $route = $this->createRoute(2, RouteColor::GRAY);
        $this->assertTrue($this->claim->canClaim($route, $cards));
    }

    public function testCantClaimWithInsufficientCards()
    {
        $cards = [$this->createColorCard(Color::WHITE), $this->createColorCard(Color::WHITE)];
        $route = $this->createRoute(3, RouteColor::WHITE);
        $this->assertFalse($this->claim->canClaim($route, $cards));
    }

    public function testCantClaimWithExtraCards()
    {
        $cards = [$this->createColorCard(Color::WHITE), $this->createColorCard(Color::WHITE)];
        $route = $this->createRoute(1, RouteColor::WHITE);
        $this->assertFalse($this->claim->canClaim($route, $cards));
    }

    private function createColorCard(string $color)
    {
        return new ColorCard(new Color($color));
    }

    private function createRoute(int $length, string $color)
    {
        return  new Route(new City("a"), new City("b"), $length, new RouteColor($color));
    }
}
