<?php
namespace ticketoride;

use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testTotalCards()
    {
        $deck = new Deck(5);
        $this->assertEquals(45, $deck->getTotalCards());
    }

    public function testRemoveCards()
    {
        $deck = new Deck(5);
        $deck->drawCards(2);

        $this->assertEquals(43, $deck->getTotalCards());
    }

    public function testIfIsEmpty()
    {
        $deck = new Deck(5);
        $deck->drawCards(45);

        $this->assertTrue($deck->isEmpty());
    }

    public function testShuffleCards()
    {
        $deck = new Deck(5);
        $cards = $deck->getCards();
        $deck->shuffleCards();
        $cardsShuffled = $deck->getCards();

        $this->assertNotEquals($cards, $cardsShuffled);
    }
}