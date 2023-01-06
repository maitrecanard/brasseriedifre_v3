<?php

namespace App\Service;

use App\Repository\ErrorRepository;
use App\Entity\Error AS E;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Error extends AbstractController
{

    private $errorRepository;

    /**
     * magic function fo declaration Visitor
     *
     * @param VisitorRepository $visitorRepository
     */
    public function __construct(ErrorRepository $errorRepository)
    {
        $this->errorRepository = $errorRepository;
    }

    /**
     * function that calculates the number of visitors arriving on the site
     */
    public function error($module,$error)
    {

  
        $err = new E;
        $err->setModule($module);
        $err->setContent($error);
        $err->setCreatedAt(new \DateTimeImmutable());
        $this->errorRepository->save($err, true);

        


    }

}