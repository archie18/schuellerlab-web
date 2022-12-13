<?php

namespace LDM\MainBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * A property-scope constraint to ensure certain file extensions of uploaded files.
 * 
 * @author Andreas Schueller <aschueller@bio.puc.cl>
 * @Annotation
 */
class FileExtension extends Constraint
{   
    /**
     * Error message
     * @var string
     */
    public $message = 'The file extension "{{ extension }}" is invalid. Allowed file extensions are {{ allowed_ext }}.';

    /**
     * Allowed extensions, e.g. array('.pdb', '.ent', '.mol2')
     * @var array
     */
    public $allowedExtensions;

    public function __construct($options = null) {
        $this->allowedExtensions = $options['allowedExtensions'];
        parent::__construct($options);
    }

    public function getRequiredOptions()
    {
        return array('allowedExtensions');
    }

    /**
     * Provide the class scope of the validator.  
     */
    public function getTargets() {
        return self::PROPERTY_CONSTRAINT;
    }
    
    /**
     * Returns the validator class name
     * @return string
     */
    public function validatedBy() {
        return get_class($this).'Validator';
//        return 'file_extension_validator';
    }
}