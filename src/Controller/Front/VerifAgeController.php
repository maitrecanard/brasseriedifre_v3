<?php

namespace App\Controller\Front;

use App\Form\VerifAgeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VerifAgeController extends AbstractController
{   
    
    /**
    * @Route("/verification/age", name="front_verif_age")
    */
    public function index(Request $request, RequestStack $session): Response
    {
        
        $form = $this->createForm(VerifAgeType::class);
        $form->handleRequest($request);
        // Tester le fonctionnement avec 
        //https://www.bilendi.tech/index.php?post/2021/03/22/Validation-d-un-formulaire-Symfony-au-sein-d-un-formulaire-DevExtreme
        if ($form->isSubmitted() && $form->isValid())
        {
            $year = $_POST['year'];
            $month = $_POST['month'];
            $day = $_POST['day'];

            $date = $year.''.$month.''.$day;

            $now = new \DateTime();
            $bornDate = new \DateTimeImmutable($date);

            $compare = $now->diff($bornDate);

            $age = $compare->format('%y');
            dd($age);

            if($age < 18)
            {
               // $error = 'Votre age ne permet pas l\'accès au site';
                return $this->redirectToRoute('front_verif_age', [], Response::HTTP_SEE_OTHER);

            } else {
                 
                 $session->set('age', true);
                 return $this->redirectToRoute('front_main', [], Response::HTTP_OK);
            }


          
        }

        return $this->renderForm('front/verif_age/index.html.twig', []);
    }
}
