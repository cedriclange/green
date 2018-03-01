<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repo->findAll();        
        return $this->render('default/index.html.twig',['categories'=>$categories]);
    }

    /**
     * @Route("/about", name="aboutpage")
     */
    public function aboutAction() {
        return $this->render('default/about.html.twig');
    }
     /**
     * @Route("/contact", name="contactpage")
     */
    public function contactAction() {
        return $this->render('default/contact.html.twig');
    }
}
