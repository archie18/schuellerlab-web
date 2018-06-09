<?php

namespace MeloLab\BioGestion\ResearchBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * A class-scope constraint for Grant entities.
 * 
 * @author Andreas Schueller <aschueller@bio.puc.cl>
 * @Annotation
 */
class UniqueGrant extends Constraint
{   
    /**
     * "This grant was already found in the database" message
     * @var string
     */
    public $grantAlreadyExists = 'grant.validator.grant_already_exists';
    
    public function __construct($options = null) {
        parent::__construct($options);
    }
    
    /**
     * Provide the class scope of the validator.  
     */
    public function getTargets() {
        return self::CLASS_CONSTRAINT;
    }
    
    /**
     * Returns the validator class name
     * @return string
     */
    public function validatedBy() {
        return 'unique_grant_validator';
    }
}