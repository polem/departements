<?php

namespace Departements;

use Departements\Model\Region;
use Departements\Model\Departement;
use PhpCollection\Map;

class Provider
{
    private $regions;
    private $departements;

    public function __construct()
    {
        $this->regions = new Map();
        $this->departements = new Map();

        $this->loadDatas();
    }

    public function findAllDepartements() {
        return $this->departements;
    }

    public function findAllRegions() {
        return $this->regions;
    }

    public function findDepartementByCode($departementCode) {
        return $this->regions;
    }

    public function findDepartementByName($departementCode) {
        return $this->regions;
    }

    public function findRegionByName($regionCode) {
        return $this->regions;
    }

    public function findRegionByCode($regionCode) {
        return $this->regions;
    }

    private function loadDatas() {

        $datas = json_decode(file_get_contents(__DIR__ . '/Resources/datas/datas.json'), true);
        foreach($datas as $regionCode => $regionDatas) {
            $region = new Region();
            $region->setCode($regionCode);
            $region->setName($regionDatas['name']);
            foreach($regionDatas['depts'] as $deptCode => $deptName) {
                $departement = new Departement();
                $departement->setCode($deptCode);
                $departement->setName($deptName);
                $region->addDepartement($departement);
                $this->departements->set($deptCode, $departement);
            }
            $this->regions->set($regionCode, $region);
        }
    }
}

