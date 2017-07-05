<?php

namespace ticketoride;

class Claim
{
    public function canClaim(Route $route, array $cards): bool
    {
        if (count($cards) !== $route->getLength()) {
            return false;
        }

        if ($route->getColor() == RouteColor::GRAY) {
            return true;
        }

        foreach ($cards as $card) {
            if ($card instanceof WildCard) {
                continue;
            }

            if ((string) $route->getColor() != (string) $card->getColor()) {
                return false;
            }
        }

        return true;
    }
}
