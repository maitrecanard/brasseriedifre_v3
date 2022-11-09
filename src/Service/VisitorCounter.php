<?php

namespace App\Service;

use App\Entity\Visitor;
use App\Repository\VisitorRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VisitorCounter extends AbstractController
{

    private $visitorRepository;

    /**
     * magic function fo declaration Visitor
     *
     * @param VisitorRepository $visitorRepository
     */
    public function __construct(VisitorRepository $visitorRepository)
    {
        $this->visitorRepository = $visitorRepository;
    }

    /**
     * function that calculates the number of visitors arriving on the site
     */
    public function visitorEnter()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = new \DateTime(date('Y-m-d'));
        $verifVisit = $this->visitorRepository->findBy(['ip'=> $ip, 'date'=> $date]);
        if (!$verifVisit)
        {
            
            if(!$this->getUser()) {
                $visitor = new Visitor;
                $visitor->setIp($ip);
                $visitor->setDevice('No information');
                $visitor->setDate(new \DateTime(date('Y-m-d')));
                $this->visitorRepository->add($visitor, true);
            } else if($this->getUser()->getRoles() == "ROLES_SUPADMIN" || $this->getUser()->getRoles() == "ROLES_ADMIN")
            {} 
        }


    }

    public function getCountVisitor()
    {
        $date = new \DateTime(date('Y-m-d'));
        $visitor = $this->visitorRepository->findBy(['date' => $date]);

        $count = count($visitor);

        return $count;
    }
}