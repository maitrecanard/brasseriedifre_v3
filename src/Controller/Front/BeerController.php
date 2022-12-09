<?php

namespace App\Controller\Front;

use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    #[Route('/bieres', name: 'app_front_beer')]
    public function index(ProductsRepository $productsRepository): Response
    {

        return $this->render('front/beer/index.html.twig', [
            'products' => $productsRepository->findBy(['active'=>1, 'period'=> NULL], ['id' => 'DESC']),
            'productsPeriod' => $productsRepository->findBy(['active'=>1, 'period'=> !NULL], ['id' => 'DESC']),
            'productFut' => $productsRepository->findBy(['active'=>1, 'name'=> 'Fût']),
            'goodies' => $productsRepository->findBy(['active'=>1, 'period'=> !NULL, 'degre'=> !NULL], ['id' => 'DESC']),
        ]);
    }

   // #[Route('/b')]
}
