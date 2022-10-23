<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;

class ProductSlugger
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
   
    }

    public function slugify(string $text)
    {
    
            return $this->slugger->slug($text);
       
    }


}