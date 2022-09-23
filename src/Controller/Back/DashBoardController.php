<?php

namespace App\Controller\Back;

use App\Repository\VisitorRepository;
use App\Service\VisitorCounter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashBoardController extends AbstractController
{
    /**
     * @Route("/admin", name="dashboard")
     */
    public function index(VisitorCounter $visitor): Response
    {
        
        $visitor->visitorEnter();
        $countVisitor = $visitor->getCountVisitor();

        return $this->render('back/main/index.html.twig', [
            'countVisitor' => $countVisitor,
        ]);
    }
}
