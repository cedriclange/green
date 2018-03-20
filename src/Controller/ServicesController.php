<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Services;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ServicesController extends Controller
{
    /**
     * @Route("/services", name="services_list")
     */
    public function indexAction()
    {
        
        $repo = $this->getDoctrine()->getRepository(Services::class);
        $services = $repo->findAll();
                
            
        return $this->render('services/index.html.twig',['services'=>$services]);
        
        
    }
    /**
     * @Route("/services/{id}", name="show_service")
     */
    function detailAction($id, Request $request) 
    {
        $data = array();
        $repo = $this->getDoctrine()->getRepository(Services::class);
        $service = $repo->find($id);
        

        

        //build the form for confirmation
        
        $form = $this->createFormBuilder($data)
        ->add('service',HiddenType::Class)
        ->add('name', TextType::class)
        ->add('phone', TextType::class)
        ->add('email', EmailType::class)
        ->add('send', SubmitType::class, array('label'=>'Confirmer'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // ... send email here
            return $this->redirectToRoute('task_success');
        }
        return $this->render('services/detail.html.twig', array(
            'form' => $form->createView(),'service' => $service ));
    
    }
    /**
     * @Route("/services/order", name="order_service")
     */
    function orderAction($id,Request $request) 
    {
        $em = $this->getDoctrine()->getRepository(Services::class);
        $sv = $em->find($id);

        
            //build the form for confirmation
            $data = array('service_name'=>$sv.name);
            $form = $this->createFormBuilder($data)
            ->add('service_name',HiddenType::class)
            ->add('name', TextType::class)
            ->add('phone', TextType::class)
            ->add('email', EmailType::class)
            ->add('send', SubmitType::class, array('label'=>'Confirmer'))
            ->getForm();
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) 
            {
                // ... perform some action, such as saving the task to the database
                return $this->redirectToRoute('task_success');
            }
                
            return $this->render('services/detail.html.twig', array(
                'form' => $form->createView(),'service' => $service ));


        
    }
    
}
