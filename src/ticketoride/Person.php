<?php

namespace ticketoride;

class Person
{
    private $cards;
    private $routes;
    private $points;
    private $currentPoints;

    public function __construct(Points $points)
    {
        $this->currentPoints = 0;
        $this->cards = new \SplObjectStorage();
        $this->points = $points;
    }

    public function addRoute(Route $route)
    {
        $this->routes[] = $route;
        $this->currentPoints += $this->points->calculatePoints($route);
    }

    public function getCards()
    {
        return  $this->cards;
    }

    public function keepCard(Card $card)
    {
        $this->cards->attach($card);
    }

    public function playCards(\SplObjectStorage $cards)
    {
        foreach ($cards as $card) {
            if (!$this->cards->contains($card)) {
                throw new \Exception;
            }
        }

        foreach ($cards as $card) {
            $this->cards->detach($card);
        }
    }

    public function getPoints(): int
    {
        return $this->currentPoints;
    }
}
