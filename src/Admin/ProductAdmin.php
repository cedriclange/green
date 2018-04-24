<?php 
// src/App/Admin/CategoryAdmin.php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelType;


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
        ->add('media', 'sonata_media_type', array(
            'provider' => 'sonata.media.provider.image',
            'context'  => 'engine'
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
                    ->add('isDeleted')
                    ->add('isNew')
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