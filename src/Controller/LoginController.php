<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use ORM\EntityManager;

use App\Entity\Utilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class LoginController
    extends Controller
{
    /**
      * @Route("/connectMe", name="connectMe")
      */   
   public function connectMe (Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
   {
       
        ob_start();

        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER         
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-login.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        $verifNiveau = $objetSession->get("niveau");
       
        if($verifNiveau >= 9.25)
        {
            // ON VA VERS LA PAGE admin
            $urlAdminis = $this->generateUrl("adminis");
            return new RedirectResponse($urlAdminis);
        }
        else
        {
            // ON VA SUR LA PAGE D'ACCUEIL 
            return new Response($contenuCache);
        }
        
   }
    /**
      * @Route("/logout", name="logout")
      */   
   public function logout (Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
   {    
      
            $objetSession->set("niveau", 0);
            $objetSession->set("nom", "");
            $objetSession->set("user",  "");
            $objetSession->set("id",  "");
        // on redirige sur la page de login
        $urlLogin = $this->generateUrl("login");

        return new RedirectResponse($urlLogin);
        
   }
}