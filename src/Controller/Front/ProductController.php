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

    #[Route('/biere/{id}', name:'app_count_beer', methods:'GET')]
    public function countBeer(Products $products, ProductsRepository $productsRepository)
    {
        $view = $productsRepository->find($products);

        $count = $view->getVue() + 1;

        $products->setVue($count);
        $productsRepository->add($products, true);

        return $this->redirectToRoute('details_beer', ['id'=>$products->getId(), 'slug'=>$products->getSlug()]);
    }

    #[Route('/biere/{id}/{slug}', name:'details_beer', methods:'GET')]
    public function productDetail(Products $products, ProductsRepository $productsRepository)
    {
        return $this->render('front/product/show.html.twig',[
            'product'=> $products,
            'otherProducts' => $productsRepository->findByOtherProduct($products),
            'goodies' => $productsRepository->findBy(['active'=>1, 'period'=> NULL, 'degre'=> NULL], ['id' => 'DESC']),
        ]);
    }
}
