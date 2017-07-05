<?php

namespace ticketoride;

class RouteColor extends Color
{
    const GRAY = "gray";

    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }
}
