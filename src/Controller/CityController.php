<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CityController extends AbstractController
{
    /**
     * @Route("/city", name="city")
     */
    public function index()
    {
        
        return $this->render('city/index.html.twig', [
            'controller_name' => 'CityController',
        ]);
    }

     /**
     * @Route("/city/create", name="city_create", condition="request.isXmlHttpRequest()")
     */
    public function create(Request $request)
    {
        $article = new City();
        
        $form = $this->createForm(ArticleType::class, $article, array(
            'action' => $this->generateUrl($request->get('_route'))
        ))
        ->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($article);
            $this->getDoctrine()->getManager()->flush();
            return new Response('success');
        }
        
        return $this->render('city/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
 
}
