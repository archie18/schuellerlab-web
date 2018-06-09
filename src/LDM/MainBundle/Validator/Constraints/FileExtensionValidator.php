<?php

namespace MeloLab\BioGestion\ResearchBundle\Validator\Constraints;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * Validator for Grant entities
 * 
 * @author Andreas Schueller <aschueller@bio.puc.cl>
 */
class UniqueGrantValidator extends ConstraintValidator {

    /**
     * Doctrine registry
     */
    protected $doctrine;

    public function __construct(Registry $doctrine) {
        $this->doctrine = $doctrine;
    }
            
    public function validate($data, Constraint $constraint) {
        if (!$data or !($data instanceof \MeloLab\BioGestion\ResearchBundle\Entity\Grant)) {
            return;
        }
        
        // Check whether this grant already exists (it should not)
        if (in_array('Unique', $constraint->groups)) {
            if ($data->getProjectId() and $data->getType()) {
                $employee = null;
                $count = count($this->doctrine->getRepository('MeloLabBioGestionResearchBundle:Grant')->findSameGrant($data, $employee));
                if ($count > 0) {
                    $this->context->addViolation($constraint->grantAlreadyExists);
                }
            }
        }
    }
}

