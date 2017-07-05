<?php

namespace ticketoride;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    private $person;

    public function setUp()
    {
        $this->person = new Person(new Points());
    }

    private function createColorCard(string $color)
    {
        return new ColorCard(new Color($color));
    }

    public function testKeepOneCard()
    {
        $card = $this->createColorCard(Color::YELLOW);
        $cards = new \SplObjectStorage();
        $cards->attach($card);
        $this->person->keepCard($card);
        $this->assertEquals($cards, $this->person->getCards());
    }

    public function testKeepTwoCards()
    {
        $cards = new \SplObjectStorage();
        $cards->attach($this->createColorCard(Color::YELLOW));
        $cards->attach($this->createColorCard(Color::YELLOW));

        foreach ($cards as $card) {
            $this->person->keepCard($card);
        }

        $this->assertEquals($cards, $this->person->getCards());
    }

    public function testCantPlayThisCards()
    {
        $cards = new \SplObjectStorage();
        $cards->attach($this->createColorCard(Color::BLUE));
        $cards->attach(new WildCard());

        foreach ($cards as $card) {
            $this->person->keepCard($card);
        }
        $playCards = new \SplObjectStorage();
        $playCards->attach($this->createColorCard(Color::YELLOW));
        $playCards->attach(new WildCard());
        $this->expectException(\Exception::class);
        $this->person->playCards($playCards);
    }


    public function testCanPlayThisCards()
    {
        $cards = new \SplObjectStorage();
        $cards->attach($this->createColorCard(Color::BLUE));
        $cards->attach(new WildCard());

        foreach ($cards as $card) {
            $this->person->keepCard($card);
        }

        $this->person->playCards($cards);
        $this->assertEquals(new \SplObjectStorage, $this->person->getCards());
    }

    public function testGetZeroPoints()
    {
        $this->assertEquals(0, $this->person->getPoints());
    }
}
