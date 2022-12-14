<?php

namespace LDM\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('compound', 'text')
            ->add('target', 'text')
            ->add('similarity', 'number')
            ->add('pubmed', 'checkbox')
            ->add('pmc', 'checkbox')
            ->add('id', 'text', array('empty_data' => uniqid()))
            ->add('iter', 'text')
            ->add('search', 'submit');
    }

    public function getName()
    {
        return 'search';
    }

}