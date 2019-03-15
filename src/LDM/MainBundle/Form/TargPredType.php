<?php

namespace LDM\MainBundle\Form;

use LDM\MainBundle\Validator\Constraints\FileExtension;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class TargPredType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('molecule', 'file', array(
                'label' => 'Structure file (.smi) 5 MB',
                'constraints' => array(
                    new NotBlank(),
                    new File(array(
                        'maxSize' => "5M",
                        'mimeTypes' => array("chemical/x-smi", "text/plain"),
                    )),
                    new FileExtension(array('allowedExtensions' => array('.smi')))
                ),
            ))
            
            ->add('submit', 'submit')
        ;
    }

    public function getName()
    {
        return 'targpred_form';
    }
}