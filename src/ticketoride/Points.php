<?php
namespace ticketoride;

class Points
{
    private $length;

    public function __construct($length)
    {
        $this->validateLength($length);

        $this->length = $length;
    }

    public function getPoints()
    {
        switch ($this->length) {
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
        }
    }

    private function validateLength(int $length)
    {
        if ($length < 1 || $length > 6) {
            throw new \InvalidArgumentException;
        }
    }
}