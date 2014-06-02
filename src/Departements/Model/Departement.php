<?php

namespace Departements\Model;

use PhpCollection\Sequence;
use PhpCollection\SequenceInterface;

class Departement
{
    protected $name;
    protected $code;
    protected $region;
    protected $communes;

    function __construct () {
        $this->communes = new Sequence();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion(Region $region)
    {
        $this->region = $region;
        return $this;
    }

    public function getCommunes()
    {
        return $this->communes;
    }

    public function addCommune(Commune $commune) {
        $this->communes->add($commune);
    }

    public function setCommunes(SequenceInterface $communes)
    {
        $this->communes = $communes;
    }

    public function __toString()
    {
        return $this->getName();
    }

}

