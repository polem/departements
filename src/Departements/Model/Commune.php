<?php

namespace Departements\Model;

use Departements\Model\Departement;

class Commune
{
    protected $name;
    protected $zipcode;
    protected $departement;

    function __construct($name, $zipcode, Departement $departement) {
        $this->name        = $name;
        $this->zipcode     = $zipcode;
        $this->departement = $departement;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function getDepartement()
    {
        return $this->departement;
    }

    public function setDepartement(Departement $departement)
    {
        $this->departement = $departement;
    }
}

