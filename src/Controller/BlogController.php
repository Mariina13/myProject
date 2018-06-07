<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Utilisateurs;

class BlogController
    extends Controller

{
    /**
      * @Route("/", name="accueil")
      */   
    public function accueil (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {
          
          ob_start();
      
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER rtm-1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-accueil.php");
          
        
            $contenuCache = ob_get_clean();
            
            return new Response($contenuCache);
        
    }
}