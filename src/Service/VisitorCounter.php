<?php

namespace App\Service;

use App\Entity\Visitor;
use App\Repository\VisitorRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class VisitorCounter
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
        dump($verifVisit);
        if (!$verifVisit)
        {
            $visitor = new Visitor;
            $visitor->setIp($ip);
            $visitor->setDevice('No information');
            $visitor->setDate(new \DateTime(date('Y-m-d')));
            $this->visitorRepository->add($visitor, true);
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