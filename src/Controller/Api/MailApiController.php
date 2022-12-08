<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Mail;
use App\Form\MailType;
use App\Repository\MailRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MailApiController extends AbstractController
{
    #[Route('/api/sendmail', name: 'mail_post',  methods: ["POST"])]
    public function index(Request $request, SerializerInterface $serializer, ManagerRegistry $doctrine, ValidatorInterface $validator, MailRepository $mailRepository) : JsonResponse
    {
        
        $json = $request->getContent();
        
        $mail = $serializer->deserialize($json, Mail::class, 'json');
        $errors = $validator->validate($mail);
        if(count($errors) > 0) {
            $cleanErrors = [];

            foreach($errors AS $error) {
                
                $property = $error->getPropertyPath();
                $message = $error->getMessage();

                $cleanErrors[$property][] = $message;

            }

            return $this->json($cleanErrors, Response::HTTP_UNPROCESSABLE_ENTITY); 
        }

        $manager = $doctrine->getManager();
        
        $manager->persist($mail);
        $manager->flush();
        $mail->setCreatedAt(new \DateTimeImmutable());
        $mail->setStatus(1);
        $mailRepository->add($mail, true);

        return $this->json(['success' => 'Mail send'], Response::HTTP_CREATED );
        
    }

    #[Route('/api/getnewmail', name: 'mail_get', methods: ["GET"])]
    public function getNewMail(MailRepository $mailRepository) : JsonResponse
    {
        $mails = $mailRepository->findBy(['status'=>1]);
        $mail = count($mails);

        return $this->json(['mail'=>$mail], Response::HTTP_OK, [], [
            'groups' => 'mail_get'
        ]);
    }
}
