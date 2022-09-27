<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class VerifAge extends AbstractController
{
    private $session;
    private $route;

    public function __construct(RequestStack $session)
    {
        $this->session = $session;
    }

    /**
     * Vérification de l'age de l'utilisat
     */
    public function verification()
    {
        $session = $this->session->getSession()->has('age');

        if(!$session)
        {
            return false;
        } 

        return true;
    }
           
}