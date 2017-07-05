<?php
namespace ticketoride;

class Points
{
    public function calculatePoints(Route $route)
    {
        $length = $route->getLength();

        switch ($length) {
            case 1:
                return 1;
            case 2:
                return 2;
            case 3:
                return 4;
            case 4:
                return 7;
            case 5:
                return 10;
            case 6:
                return 15;
            default:
                throw new \InvalidArgumentException;
        }
    }
}
