<?php
namespace ticketoride;

class Deck
{
    /**
     * @var array
     */
    private $cards = [];

    public function __construct(int $numberOfCardsByType)
    {
        $this->initializeDeck($numberOfCardsByType);
    }

    public function getTotalCards()
    {
        return count($this->cards);
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function drawCards(int $number)
    {
        $drawCards = [];
        for($i = 0; $i < $number; $i++) {
            $drawCards[] = array_pop($this->cards);
        }

        return $drawCards;
    }

    public function isEmpty()
    {
        return empty($this->cards);
    }

    public function shuffleCards()
    {
        $this->cards = shuffle($this->cards);
    }

    private function initializeDeck(int $numberOfCardsByType)
    {
        $cards = [];
        $wildCardsNumber  = $numberOfCardsByType;

        for ($i = 0; $i < $wildCardsNumber; $i++) {
            $cards[] = new WildCard();
        }

        $oClass = new \ReflectionClass(Color::class);
        $colors = $oClass->getConstants();

        foreach ($colors as $color) {
            for ($i = 0; $i < $numberOfCardsByType; $i++) {
                $cards[] = new ColorCard(new Color($color));
            }
        }

        $this->cards = $cards;
    }
}