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
            $age = $request->request->get('age');

            if($age != 1)
            {
               // $error = 'Votre age ne permet pas l\'accès au site';
                return $this->redirect('https://solidarites-sante.gouv.fr/IMG/pdf/Vente_sur_place_HD.pdf');

            } else {
                 
                 $session->set('age', true);
                 return $this->redirectToRoute('home', [], Response::HTTP_FOUND);
            }
 
        }

        return $this->renderForm('front/verif_age/index.html.twig', []);
    }
}
