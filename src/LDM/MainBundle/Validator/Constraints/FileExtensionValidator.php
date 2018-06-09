<?php

namespace LDM\MainBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * Validator for Grant entities
 * 
 * @author Andreas Schueller <aschueller@bio.puc.cl>
 */
class FileExtensionValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        $ext = '.'.$value->getClientOriginalExtension();
        if (!in_array($ext, $constraint->allowedExtensions)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ extension }}', $ext)
                ->setParameter('{{ allowed_ext }}', '"'.implode('", "', $constraint->allowedExtensions).'"')
                ->addViolation();
        }
    }
}

