<?php

namespace App\Controller;

use App\Service\GeometryCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GeometryControllerOld extends AbstractController
{
    private $geometryCalculator;
    
    public function __construct(GeometryCalculator $geometryCalculator)
    {
        $this->geometryCalculator = $geometryCalculator;
    }
    
    #[Route('old/geometry/circle/{radius}')]
    public function geometry_circle(float $radius): JsonResponse
    {
        $this->geometryCalculator->calculateSurface($radius);
        $this->geometryCalculator->calculateDiameter($radius);
        
        $data = [
            "type" => "circle",
            "radius" => $radius,
            "surface" => $this->geometryCalculator->CircleSurfaceArea,
            "circumference" => $this->geometryCalculator->CircleCircumference,
        ];
        
        return new JsonResponse($data);
    }

    #[Route('old/geometry/triangle/{a}/{b}/{c}')]
    public function geometry_triangle($a, $b, $c): JsonResponse
    {
        $this->geometryCalculator->calculateSurfaceArea($a, $b, $c);
        $this->geometryCalculator->calculateCircumference($a, $b, $c);

        $data = [
            "type" => "triangle",
            "a" => $a,
            "b" => $b,
            "c" => $c,
            "surface" => $this->geometryCalculator->TriangleArea,
            "circumference" => $this->geometryCalculator->TriangleCircumference,
        ];
        
        return new JsonResponse($data);
    }

    #[Route('old/geometry/totalarea')]
    public function getObjectTotalArea(): JsonResponse
    {
        return new JsonResponse([
            'type' => 'totalarea',
            'circle_area' => $this->geometryCalculator->CircleSurfaceArea,
            'triangle_area' => $this->geometryCalculator->TriangleArea,
            'area' => $this->geometryCalculator->sum_of_areas()
        ]);
    }
}
