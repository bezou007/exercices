<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PremierPageController extends AbstractController
{  
   
     /**
 * @Route("/hello/{prenoms}/age/{age}", name="hello")
 * @Route("/hello", name="base")
 * @Route("/hello/{prenoms}", name="hello_prenom")
 * montre la page qui dit bonjour
 * routage multiple
 * omena anarana fona ny route
 * ahitana requirement (atao ftsn oe chiffre v sa lettre fotsin manao erreur ref ts izay)
 * @return void
 */
    public function hello($prenoms = "anonymes", $age=0){
        return $this ->render(
            'hello.html.twig',
            [
                'prenom' => $prenoms,
                'age' => $age
            ]
            );
    }

    /**
     * @Route("/", name="app_premier_page")
     */
    public function index(): Response
    {
        $prenoms =["Lior" => 31, "Joseph" => 12, "Anne" => 55];

    
        return $this->render('premier_page/index.html.twig', [
                'title' => 'Application Age',
                'age' => 12,
                'tableau' => $prenoms
            ]);
    }
}
