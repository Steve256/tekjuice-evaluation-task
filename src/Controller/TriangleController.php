<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TriangleController extends AbstractController
{
    #[Route('/triangle/{a}/{b}/{c}')]
    public function index($a, $b, $c): JsonResponse
    {
        $data = [
            "type" => "triangle",
            "a" => $a,
            "b" => $b,
            "c" => $c,
            "surface" => $this->calculateSurfaceArea($a, $b, $c),
            "circumference" => $this->calculateCircumference($a, $b, $c),
        ];
        
        return new JsonResponse($data);
    }

    public function calculateSurfaceArea($a, $b, $c): float
    {
        return  (($a * $b)/2);
    }

    public function calculateCircumference($a, $b, $c): float
    {
        return  $a + $b + $c;
    }
}