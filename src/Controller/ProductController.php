<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use App\Entity\Product;
use App\Entity\Category;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product_list")
     */
    public function indexAction()
    {
        
            $repo = $this->getDoctrine()->getRepository(Product::class);
            $catrepo = $this->getDoctrine()->getRepository(Category:: class);

            $products = $repo->findAll();
            $categories = $catrepo->findAll();

            return $this->render('product/index.html.twig', [
                'products' => $products,'categories'=>$categories]);   
            
    }
    /**
     * @Route("/product/{id}", name="show_product")
     */
    public function detailAction($id, Request $request)
    {   
        //retrive product from database
        $repo = $this->getDoctrine()->getRepository(Product::class);
        $product = $repo->find($id);

        
        $data = array('product'=>$product->getName());
       

        //build the form for confirmation
        
        $form = $this->createFormBuilder($data)
        ->add('product',HiddenType::Class)
        ->add('name', TextType::class)
        ->add('phone', TextType::class)
        ->add('email', EmailType::class)
        ->add('send', SubmitType::class, array('label'=>'ENVOYER'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // ... send email here
            return $this->redirectToRoute('task_success');
        }
            
        return $this->render('product/details.html.twig',[
                'product'=>$product,'form'=>$form->createView()]);
    }   

    
    
}
