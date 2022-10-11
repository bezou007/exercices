<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Form\AdType;
use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index(AdRepository $repo): Response
    {
        $ads = $repo->findAll();
        return $this->render('ad/index.html.twig', [
            'ads' => $ads
        ]);
    }
     /**
     * @Route("/ads/new", name="ads_create")
     * 
     * @return Response
     */

    public function create(Request $request){
        $ad = new Ad();

        $form = $this ->createForm(AdType::class , $ad);
        $form -> handleRequest($request); //moramora koko iz amin t
                      //->createFormBuilder($ad)
                     //->add('tittle')
                     // ->add('introduction')
                      //->add('content')
                      //->add('rooms')
                       // ->add('price')
                       // ->add('coverImage')
                       // ->add('save', SubmitType::class,[    
                        //  'label' => 'creer la noouvelle annonce',  // fanaovana bouton
                         // 'attr'  => [
                            //  'class' => 'btn btn-primary'
                         // ]
                    //  ])
                        //->getForm();
         
            if ($form->isSubmitted() && $form->isValid()){

                
            }
        $form -> handleRequest($request);
        return $this->render('ad/new.html.twig',[
       'form' => $form -> createView()
        ]);
    }

    /**
     * Permet d'afficher une seule annonce
     * 
     * @Route("/ads/{slug}", name="ads_show")
     * 
     * @return Response
     */
    public function show(Ad $ad){
        //je recupere l'annonce qui correspond au slug
       //$ad = $repo->findOneBySlug($slug);
        return $this->render('ad/show.html.twig',[
            'ad' => $ad
        ]);
    }
} 