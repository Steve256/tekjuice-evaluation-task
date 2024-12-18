<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CircleController extends AbstractController
{
    #[Route('/circle/{radius}')]
    public function index($radius): JsonResponse
    {
        $data = [
            "type" => "circle",
            "radius" => $radius,
            "surface" => $this->calculateSurface($radius),
            "circumference" => $this->calculateDiameter($radius),
        ];
        
        return new JsonResponse($data);
    }

    public function calculateSurface($radius): float
    {
        return  3.14 * $radius * $radius;
    }
    

    public function calculateDiameter($radius): float
    {
        return  2 * 3.14 * $radius;
    }
}