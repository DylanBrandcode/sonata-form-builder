<?php

namespace Pirastru\FormBuilderBundle\Admin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class SubmittedFormAdmin extends AbstractAdmin
{    
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(array('show', 'edit'));
    }

    protected function configureFormFields(FormMapper $formMapper)
    {   
        $formMapper
        ->add('createdAt', 'sonata_type_datetime_picker')
        ->add('submittedValues', 'sonata_type_collection', array(
            'type_options' => array(
                // Prevents the "Delete" option from being displayed
                'delete' => false,
            )            
        ), array(
            'edit' => 'inline',
            'inline' => 'table',
            'sortable' => 'position',
        ))
        ;
    }
}