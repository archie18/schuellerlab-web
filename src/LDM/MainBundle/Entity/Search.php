<?php

namespace LDM\MainBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Search
{

    /**
     * @Assert\NotBlank()
     */
    protected $compound;

    /**
     * @Assert\NotBlank()
     */
    protected $target;

    /**
     * @Assert\NotBlank()
     */
    protected $similarity;

    protected $pubmed;

    protected $pmc;

    public function getCompound()
    {
        return $this->compound;
    }

    public function setCompound($compound)
    {
        $this->compound = $compound;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function getSimilarity()
    {
        return $this->similarity;
    }

    public function setSimilarity($similarity)
    {
        $this->similarity = $similarity;
    }

    public function getPubmed()
    {
        return $this->pubmed;
    }

    public function setPubmed($pubmed)
    {
        $this->pubmed = $pubmed;
    }

    public function getPmc()
    {
        return $this->pmc;
    }

    public function setPmc($pmc)
    {
        $this->pmc = $pmc;
    }

}