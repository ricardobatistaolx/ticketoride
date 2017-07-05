<?php
namespace ticketoride;

class Color
{
    const PURPLE = "purple";
    const WHITE  = "white";
    const BLUE   = "blue";
    const YELLOW = "yellow";
    const ORANGE = "orange";
    const BLACK  = "black";
    const RED    = "red";
    const GREEN  = "green";

    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function __toString()
    {
        return $this->color;
    }
}
