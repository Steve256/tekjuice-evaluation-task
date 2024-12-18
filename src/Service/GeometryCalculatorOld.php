<?php

namespace App\Service;

class GeometryCalculatorOld

{
    public $CircleSurfaceArea;
    public $CircleCircumference;
    
    public $TriangleArea;
    public $TriangleCircumference;

    public function calculateSurface($radius): float
    {
        $this->CircleSurfaceArea = 3.14 * $radius * $radius;
        return  $this->CircleSurfaceArea;
    }

    public function calculateDiameter($radius): float
    {
        $this->CircleCircumference = 2 * 3.14 * $radius;
        return  $this->CircleCircumference;
    }

    public function calculateSurfaceArea($a, $b, $c): float
    {
        $this->TriangleArea = (($a * $b)/2);
        return  $this->TriangleArea;
    }

    public function calculateCircumference($a, $b, $c): float
    {
        $this->TriangleCircumference = $a + $b + $c;
        return  $this->TriangleCircumference;
    }

    public function sum_of_areas(): float
    {
        return  $this->CircleSurfaceArea + $this->TriangleArea;
    }

    public function sum_of_diameters(): float
    {
        return  $this->CircleCircumference + $this->TriangleCircumference;
    }
}
