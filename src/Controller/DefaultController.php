<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    
    public function aboutAction() {
        return $this->render('default/about.html.twig');
    }
    public function contactAction() {
        return $this->render('default/contact.html.twig');
    }
}
