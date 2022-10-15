<?php

namespace App\Controller\Front;

use App\Form\VerifAgeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class VerifAgeController extends AbstractController
{   
    
    /**
    * @Route("/verification/age", name="front_verif_age")
    */
    public function index(Request $request, Session $session): Response
    {
        
        // Tester le fonctionnement avec 
        //https://www.bilendi.tech/index.php?post/2021/03/22/Validation-d-un-formulaire-Symfony-au-sein-d-un-formulaire-DevExtreme
        if ($request->isMethod('POST'))
        {
            $year = $request->request->get('year');
            $month = $request->request->get('month');
            $day = $request->request->get('day');

            $date = $year.''.$month.''.$day;

            $now = new \DateTime();
            $bornDate = new \DateTimeImmutable($date);

            $compare = $now->diff($bornDate);

            $age = $compare->format('%y');

            if($age < 18)
            {
               // $error = 'Votre age ne permet pas l\'accès au site';
                return $this->redirectToRoute('front_verif_age', [], Response::HTTP_SEE_OTHER);

            } else {
                 
                 $session->set('age', true);
                 return $this->redirectToRoute('home', [], Response::HTTP_FOUND);
            }
 
        }

        return $this->renderForm('front/verif_age/index.html.twig', []);
    }
}
