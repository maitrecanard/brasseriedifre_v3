<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FileUploader extends AbstractController
{
    // create slugger
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
   
        $this->slugger = $slugger;
    }

    /**
     * Supports images, in order to load this one, in a specific file
     * This function needs the file but also the save path to work
     */
    public function upload(UploadedFile $file, $directoryFile)
    {
        // get original name of the file :
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        // sluggify the name of the file :
        $safeFilename = $this->slugger->slug($originalFilename);

        // Add UniqID :
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        // try to send file to another folder with a new name :
        try {
            $file->move($this->getParameter($directoryFile), $fileName);
        } catch (FileException $e) {
            throw new \Exception('Erreur lors de la récupération de l\'image : '.$e);
        }

        return $fileName;
    }


}