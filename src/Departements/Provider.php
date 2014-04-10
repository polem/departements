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

    public function findDepartementByName($departementCode) {
        return $this->datasource->findDepartementByName($departementCode);
    }

    public function findRegionByName($regionCode) {
        return $this->datasource->findRegionByName($regionCode);
    }

    public function findRegionByCode($regionCode) {
        return $this->datasource->findRegionByCode($regionCode);
    }
}

