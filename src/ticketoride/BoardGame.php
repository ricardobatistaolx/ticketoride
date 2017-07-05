<?php
namespace ticketoride;

use PharIo\Manifest\CopyrightInformation;

class Cities
{
    private $cities;

    public function __construct()
    {
        $this->cities = [];

        $this->cities[] = new City("Arroios");
        $this->cities[] = new City("Campo Grande");
        $this->cities[] = new City("Areeiro");
        $this->cities[] = new City("Campo Pequeno");
        $this->cities[] = new City("Lumiar");
        $this->cities[] = new City("S. Sebastião");
        $this->cities[] = new City("Alameda");
        $this->cities[] = new City("Oriente");
        $this->cities[] = new City("Odivelas");
        $this->cities[] = new City("Chiado");
    }

    public function getCitiesToUse()
    {
        $cities = [];
        $cities = array_merge($cities, $this->cities);
        $cities = array_merge($cities, $cities);
        $cities = array_merge($cities, $cities);

        shuffle($cities);

        return $cities;
    }
}

class BoardGame
{
    private $routes;
    private $players;
    private $deck;

    public function __construct()
    {

    }

    public function initializeGame($numberOfRoutes, $numberOfPlayers, $numberOfCardsPerColor)
    {
        $this->createRoutes($numberOfRoutes);
  //      $this->createPlayers($numberOfPlayers);
        $this->createDeck($numberOfCardsPerColor);
    }

    public function showStatistics()
    {
        $i = 0;
        foreach($this->players as $player) {
            echo "Player ".(++$i)." points: ".$player->getPoints();
        }
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function getDeck()
    {
        return $this->deck;
    }

    private function createRoutes(int $numberOfRoutes)
    {
        $this->routes = [];

        $cities = (new Cities())->getCitiesToUse();

        for ($i = 0; $i < $numberOfRoutes; $i++) {
            $firstCity = array_pop($cities);
            $secondCity = array_pop($cities);

            $length = rand(1, 6);
            $colorIndex  = rand(0, 7);

            $oClass = new \ReflectionClass(Color::class);
            $constants = $oClass->getConstants();
            $j = 0;
            $color = RouteColor::WHITE;
            foreach ($constants as $constant) {
                if ($j == $colorIndex) {
                    $color = $constant;
                    break;
                }
                $j++;
            }
            $this->routes[] = new Route($firstCity, $secondCity, $length,new RouteColor($color));
        }

        /**
         * @var $route Route
         */
        //echo "\n";
        //foreach ($this->routes as $route) {
        //    echo "Route: ".$route->getCities()[0]->getName()." >> ".$route->getCities()[1]->getName()." with Color: ".$route->getColor()." with length: ".$route->getLength()."\n";
        //}

    }

    private function createPlayers(int $numberOfPlayers)
    {
        $this->players = [];

        for ($i = 0; $i < $numberOfPlayers; $i++) {
            $this->players[] = new Person(new Points());
        }
    }

    private function createDeck(int $numberOfCardsPerColor)
    {
        $this->deck = new Deck($numberOfCardsPerColor);
    }
}