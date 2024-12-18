<?php

namespace App\Controller;

use App\Model\Circle;
use App\Model\Triangle;
use App\Service\GeometryCalculator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeometryController extends AbstractController
{
    private GeometryCalculator $geometryCalculator;

    public function __construct(GeometryCalculator $geometryCalculator)
    {
        $this->geometryCalculator = $geometryCalculator;
    }
    
    // Function to initialise circle object
    #[Route('geometry/circle/{radius}')]
    public function circleDetails(float $radius): JsonResponse
    {
        $circle = new Circle($radius);
        $details = $this->geometryCalculator->calculateCircleDetails($circle);
        return new JsonResponse($details);
    }

    // Function to initialise triangle object
    #[Route('/geometry/triangle/{a}/{b}/{c}')]
    public function triangleDetails(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);
        $details = $this->geometryCalculator->calculateTriangleDetails($triangle);
        return new JsonResponse($details);
    }

    // Function to sum up areas of the objects
    #[Route('geometry/sum-areas/{radius}/{a}/{b}/{c}')]
    public function sumAreas(float $radius, float $a, float $b, float $c): JsonResponse
    {
        $circle = new Circle($radius);
        $triangle = new Triangle($a, $b, $c);

        $sum = $this->geometryCalculator->sumAreas($circle, $triangle);

        return new JsonResponse([
            'sumAreas' => round($sum, 2)
        ]);
    }
    
    // Function to sum up diameters of the objects
    #[Route('geometry/sum-diameters/{radius}/{a}/{b}/{c}')]
    public function sumDiameters(float $radius, float $a, float $b, float $c): JsonResponse
    {
        $circle = new Circle($radius);
        $triangle = new Triangle($a, $b, $c);

        $sum = $this->geometryCalculator->sumDiameters($circle, $triangle);

        return new JsonResponse([
            'sumDiameters' => $sum
        ]);
    }
}
