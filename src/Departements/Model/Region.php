<?php

namespace Departements\Model;

use Departements\Model;
use PhpCollection\Map;
use PhpCollection\MapInterface;

class Region
{
    private $departements;
    private $name;
    private $code;

    public function __construct() {
        $this->departements = new Map();
    }

    public function addDepartement(Departement $departement) {
        $this->departements->set($departement->getCode(), $departement);
        return $this;
    }

    public function getDepartements()
    {
        return $this->departements;
    }

    public function setDepartements(MapInterface $departements)
    {
        $this->departements = $departements;
        return $this;
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
}

