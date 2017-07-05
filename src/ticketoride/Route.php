<?php

namespace ticketoride;

class Route
{
    private $color;
    private $aCity;
    private $bCity;
    private $points;
    private $lenght;

    public function __construct(City $aCity, City $bCity, int $lenght, RouteColor $color)
    {
        $this->validateLength($lenght);

        $this->color = $color;
        $this->aCity = $aCity;
        $this->bCity = $bCity;
        $this->lenght = $lenght;
    }

    private function validateLength(int $length)
    {
        if ($length < 1 || $length > 6) {
            throw new \InvalidArgumentException;
        }
    }
    public function getCities(): array
    {
        return [$this->aCity, $this->bCity];
    }

    public function getLenght(): int
    {
        return $this->lenght;
    }

    public function getColor() : RouteColor
    {
        return $this->color;
    }
}
