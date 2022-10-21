<?php

namespace App\Controller\Back;

use App\Entity\HistoricMovement;
use App\Entity\Prix;
use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\PrixRepository;
use App\Repository\ProductsRepository;
use App\Repository\QuantitiesRepository;
use App\Repository\HistoricMovementRepository;
use App\Service\ProductSlugger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/products")
 */
class ProductsController extends AbstractController
{
    /**
     * @Route("/", name="app_back_products_index", methods={"GET"})
     */
    public function index(ProductsRepository $productsRepository): Response
    {
        return $this->render('back/products/index.html.twig', [
            'products' => $productsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_products_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProductsRepository $productsRepository, QuantitiesRepository $quantitiesRepository, PrixRepository $prixRepository, ProductSlugger $slugger, HistoricMovementRepository $historicMovementRepository): Response
    {
        $product = new Products();
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);
        $quantities = $quantitiesRepository->findAll();
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            // enregistrement du sug / de l'image et de la date de création du produit
            $product->setSlug($slugger->slugify($product->getName()));
            $product->setImage('test.jpg');
            $product->setCreatedAt(new \DateTimeImmutable());

            $productsRepository->add($product, true);

            
            // récupération des champs de tarif
            $prices = [];
            for ($i = 1; $i <= count($quantities); $i ++) {
            
                $price = $request->request->get($i);
                // intégration des valeurs dans un tableau
                $prices[] = $price;
            }
            
            // récupération de la quantité / tarif et produit pour les enregistré en table prix
            for($i = 0; $i < count($quantities); $i ++) {
                $prix = new Prix();
                $prix->setQuantity($quantities[$i]);
                $prix->setPrix($prices[$i]);
                $prix->setProduct($product);
                $prixRepository->add($prix, true);

            } 
            
            // hitorisation du mouvement
            $user = $this->getUser();
            $historic = new HistoricMovement();
            $historic->setName('Création');
            $historic->setProduct($product);
            $historic->setUser($user);
            $historic->setCreatedAt(new \DateTimeImmutable());
            $historicMovementRepository->add($historic,true);
            

            return $this->redirectToRoute('app_back_products_show', ['id'=>$product->getId()], Response::HTTP_SEE_OTHER);
        }
        
        return $this->renderForm('back/products/new.html.twig', [
            'product' => $product,
            'form' => $form,
            'quantities' => $quantities
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_products_show", methods={"GET"})
     */
    public function show(Products $product, PrixRepository $prixRepository, QuantitiesRepository $quantitiesRepository): Response
    {
        return $this->render('back/products/show.html.twig', [
            'product' => $product,
            'prices' => $prices = $prixRepository->findBy(['product'=> $product],['id'=> 'ASC']),
            'quantities' => $quantities = $quantitiesRepository->findBy([],['id'=> 'ASC']),
            'historical' => $historical = $product->getHistoricMovements()->getValues()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_products_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Products $product, ProductsRepository $productsRepository, PrixRepository $prixRepository): Response
    {
       //dd($product);
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);
        $prices = $prixRepository->findBy(['product'=> $product]);

        if ($form->isSubmitted() && $form->isValid()) {
            $prices = $product->getPrixes()->getValues();
            
            $arrayPrice = [];
            foreach($prices AS $price) {
            
                $price = $request->request->get('price_'.$price->getId());
                // intégration des valeurs dans un tableau
                $arrayPrice[] = $price;
            }
     
            for($i = 0; $i < count($prices); $i ++) {

               $getPrice = $prixRepository->find($prices[$i]);
               $getPrice->getId($prices[$i]);
               $getPrice->setPrix($arrayPrice[$i]);
               $prixRepository->add($getPrice, true);
            }

     

            $productsRepository->add($product, true);

            return $this->redirectToRoute('app_back_products_show', ['id'=>$product->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/products/edit.html.twig', [
            'product' => $product,
            'form' => $form,
            'prices' => $prices
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_products_delete", methods={"POST"})
     */
    public function delete(Request $request, Products $product, ProductsRepository $productsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $productsRepository->remove($product, true);
        }

        return $this->redirectToRoute('app_back_products_index', [], Response::HTTP_SEE_OTHER);
    }
}
