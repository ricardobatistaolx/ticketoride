<?php

namespace ticketoride;

use ticketoride\exception\InvalidLengthException;

class Route
{
    private $color;
    private $aCity;
    private $bCity;
    private $points;
    private $length;

    public function __construct(City $aCity, City $bCity, int $length, RouteColor $color)
    {
        $this->validateLength($length);

        $this->color = $color;
        $this->aCity = $aCity;
        $this->bCity = $bCity;
        $this->length = $length;
    }

    private function validateLength(int $length)
    {
        if ($length < 1 || $length > 6) {
            throw new InvalidLengthException;
        }
    }
    public function getCities(): array
    {
        return [$this->aCity, $this->bCity];
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getColor() : RouteColor
    {
        return $this->color;
    }
}
