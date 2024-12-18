<?php

namespace App\Service;

use App\Model\Circle;
use App\Model\Triangle;

class GeometryCalculator
{
    public function calculateCircleDetails(Circle $circle): array
    {
        $surface = $circle->calculateSurface();
        $diameter = $circle->calculateDiameter();

        return [
            'type' => 'circle',
            'radius' => $circle->getRadius(),
            'surface' => round($surface, 2),
            'circumference' => round($diameter * pi(), 2),
        ];
    }

    public function calculateTriangleDetails(Triangle $triangle): array
    {
        $surface = $triangle->calculateSurface();
        $diameter = $triangle->calculateDiameter();

        return [
            'type' => 'triangle',
            'a' => $triangle->getSides()[0],
            'b' => $triangle->getSides()[1],
            'c' => $triangle->getSides()[2],
            'surface' => round($surface, 2),
            'circumference' => round($diameter, 2),
        ];
    }

    public function sumAreas(Circle $circle, Triangle $triangle): float
    {
        return $circle->calculateSurface() + $triangle->calculateSurface();
    }

    public function sumDiameters(Circle $circle, Triangle $triangle): float
    {
        return $circle->calculateDiameter() + $triangle->calculateDiameter();
    }
}
