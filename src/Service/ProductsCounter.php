<?php

namespace App\Service;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class ProductsCounter
{

    private $productsRepository;

    /**
     * magic function fo declaration products
     *
     * @param ProductsRepository $productsRepository
     */
    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    /**
     * count all products 
     */
    public function getCountProductsStatus($status) : Int
    {
        $products = $this->productsRepository->findBy(['active'=> $status]);

        $count = count($products);

        return $count;
    }

    public function getBestproduct() : array
    {
        $bestProduct = $this->productsRepository->findBy([],['vue'=> 'DESC'],1,NULL);
        //$count = count($bestProduct);
        $best = [];
        foreach($bestProduct AS $product)
        {
            if($product->getVue() == NULL)
            {
                return $best;
            } else {
                $best[] = $product;
                
            }
        }
        
        return $best;
        
    }

}