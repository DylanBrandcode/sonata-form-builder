<?php

namespace Pirastru\FormBuilderBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;


class SubmittedValueAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(array());
    }
    
    protected function configureFormFields(FormMapper $formMapper)
    {   
        $formMapper
            ->add('fieldKey')
            ->add('fieldValue')
        ;
    }


    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('fieldKey')
            ->add('fieldValue')
        ;
    }
}