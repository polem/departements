<?php

namespace Departements\Model;

class Departement
{
    private $name;
    private $code;
    private $region;

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
}

