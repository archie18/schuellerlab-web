<?php

namespace LDM\MainBundle\Form;

use LDM\MainBundle\Validator\Constraints\FileExtension;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class DrSASAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('molecule', 'file', array(
                'label' => 'Structure file (.pdb/.ent/.mol2) 5 MB',
                'constraints' => array(
                    new NotBlank(),
                    new File(array(
                        'maxSize' => "5M",
                        'mimeTypes' => array("chemical/x-pdb", "chemical/x-mol2", "text/plain"),
                    )),
                    new FileExtension(array('allowedExtensions' => array('.pdb', '.ent', '.mol2')))
                ),
            ))
            ->add('mode', 'choice', array(
                'choices'  => array(
                    0 => 'Mode 0 - SASA only',
                    1 => 'Mode 1 - Intermolecular CSA',
                    2 => 'Mode 2 - Intramolecular CSA per residue',
                    3 => 'Mode 3 - Intramolecular CSA per atom',
                    4 => 'Mode 4 - Intermolecular CSA ignoring SASA',
                ),
                // *this line is important*
//                'choices_as_values' => true,
            ))
            ->add('submit', 'submit')
        ;
    }

    public function getName()
    {
        return 'dr_sasa_form';
    }
}