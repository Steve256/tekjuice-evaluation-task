<?php

namespace App\Model;

class Triangle
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    // function to calculate surface area
    public function calculateSurface(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    //function to calculate diameter
    public function calculateDiameter(): float
    {
        return $this->a + $this->b + $this->c;
    }

    // Getter method to get all sides
    public function getSides(): array
    {
        return [$this->a, $this->b, $this->c];
    }
}
