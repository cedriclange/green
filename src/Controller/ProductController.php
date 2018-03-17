<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
    public function getSingle($id)
    {

    }
    function getHeader() : array {
        $repo = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repo->findAll();
        return $categories;        
    }
}
