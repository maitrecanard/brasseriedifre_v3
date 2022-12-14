<?php

namespace App\Controller\Front;

use App\Entity\Pages;
use App\Repository\PagesRepository;
use App\Service\VerifAge;
use App\Service\VisitorCounter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MainController extends AbstractController
{
    /**
     *@Route("/", name="home")
     */
    public function index(VerifAge $verif, VisitorCounter $visitorCounter, SessionInterface $session, PagesRepository $pagesRepository): Response
    {
        $visitorCounter->visitorEnter();
        if (!$verif->verification()) {
            return $this->redirectToRoute('front_verif_age', [], Response::HTTP_SEE_OTHER);
        } 
        return $this->render('front/main/index.html.twig', [
            'page' => $pagesRepository->find(1)
        ]);
    }
}
