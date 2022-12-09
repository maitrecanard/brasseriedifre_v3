<?php

namespace App\Controller\Front;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/bieres', name: 'app_front_beer')]
    public function index(ProductsRepository $productsRepository): Response
    {

        return $this->render('front/product/index.html.twig', [
            'products' => $productsRepository->findBy(['active'=>1, 'period'=> NULL], ['id' => 'DESC']),
            'productsPeriod' => $productsRepository->findBy(['active'=>1, 'period'=> !NULL], ['id' => 'DESC']),
            'productFut' => $productsRepository->findBy(['active'=>1, 'name'=> 'Fût']),
            'goodies' => $productsRepository->findBy(['active'=>1, 'period'=> NULL, 'degre'=> NULL], ['id' => 'DESC']),
        ]);
    }

    #[Route('/biere/{id}/{slug}', name:'app_details_beer', methods:'GET')]
    public function productDetail(Products $products)
    {
        return $this->render('front/product/show.html.twig',[
            'product'=> $products
        ]);
    }
}
