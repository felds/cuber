<?php

declare(strict_types=1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cube")
 */
class CubeController extends Controller
{

    /**
     * @Route("/")
     */
    public function indexAction(): Response
    {
        return $this->render('cube/index.html.twig');
    }
}