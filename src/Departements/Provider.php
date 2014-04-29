<?php

namespace Departements;

use Departements\Datasource\DatasourceInterface;

class Provider
{
    private $datasource;

    public function __construct(DatasourceInterface $datasource)
    {
        $this->datasource = $datasource;
    }

    public function findAllDepartements() {
        return $this->datasource->findAllDepartements();
    }

    public function findAllRegions() {
        return $this->datasource->findAllRegions();
    }

    public function findDepartementByCode($departementCode) {
        return $this->datasource->findDepartementByCode($departementCode);
    }

    public function findDepartementByName($departementName) {
        return $this->datasource->findDepartementByName($departementName);
    }

    public function findRegionByName($regionName) {
        return $this->datasource->findRegionByName($regionName);
    }

    public function findRegionByCode($regionCode) {
        return $this->datasource->findRegionByCode($regionCode);
    }
}

