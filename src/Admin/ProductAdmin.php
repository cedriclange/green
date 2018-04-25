<?php 
// src/App/Admin/CategoryAdmin.php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\MediaBundle\Form\Type\MediaType;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        
        $formMapper
        ->add('name')
        ->add('description')
        ->add('price')       
        ->add('category',ModelType::class,[           
            'property'=>'name',           
        ])
        ->add('isNew')
        ->add('isDeleted')
        ->add('media', MediaType::class, array(
            'provider' => 'sonata.media.provider.image',
            'context'  => 'product'
       ));

         
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')
                        ->add('description')
                        ->add('price');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
                    ->add('description')
                    ->add('price')                   
                    ->add('isNew')
                    ->add('media')
                    ->add('isDeleted')
                    ->add('_action', null, [
                        'actions' => [
                            'show' => [],
                            'edit' => [],
                            'delete' => [],
                        ],
                    ]);
    }
}
?>