<?php
namespace ticketoride;

class ColorCard extends Card
{
    private $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function __toString()
    {
        return "colorcard: ".$this->color;
    }
}