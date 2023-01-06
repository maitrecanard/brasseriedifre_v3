<?php

namespace App\Controller\Install;

use App\Controller\Mail\MailerController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ExploitantRepository;
use App\Entity\Exploitant;
use App\Entity\User;
use App\Form\ExploitantType;
use App\Form\UserInstallType;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InstallerController extends AbstractController
{
    #[Route('/install', name: 'app_install')]
    public function newExploitant(Request $request, ExploitantRepository $exploitantRepository): Response
    {
        $exploit =  $exploitantRepository->find(1);
        if($exploit != NULL)
        {
            return $this->redirectToRoute('login');
        }
        $exploitant = new Exploitant();
        $form = $this->createForm(ExploitantType::class, $exploitant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $exploitantRepository->save($exploitant, true);

            return $this->redirectToRoute('app_install_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('install/installer/index.html.twig', [

            'form' => $form,
        ]);
    }
    #[Route('/install/user', name: 'app_install_user')]
    public function newUser(Request $request, UserRepository $userRepository, MailerController $mailer, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserInstallType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(["ROLE_SUPADMIN"]);
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $userRepository->add($user, true);
            $mailer->sendEmailNewInstall();
            return $this->redirectToRoute('login', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('install/installer/index.html.twig', [

            'form' => $form,
        ]);
    }

}
