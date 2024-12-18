<?php

namespace App\Model;

class Circle
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    // function to calculate  area of the circle pie r squared :-)
    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    // function to calculate diamter of a circle
    public function calculateDiameter(): float
    {
        return 2 * $this->radius;
    }

    // Getter method to get radius
    public function getRadius(): float
    {
        return $this->radius;
    }
}
