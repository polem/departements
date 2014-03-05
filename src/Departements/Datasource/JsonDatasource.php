<?php

namespace Departements\Datasource;

use Departements\Model\Region;
use Departements\Model\Departement;
use PhpCollection\Map;

class JsonDatasource extends AbstractDatasource implements DatasourceInterface
{
    private $file;
    private $departementNameIndex;
    private $regionNameIndex;

    public function __construct($file)
    {
        parent::__construct();
        $this->file = $file;
        $this->loadDatas();
    }

    public function findAllDepartements() {
        return $this->departements;
    }

    public function findAllRegions() {
        return $this->regions;
    }

    public function findDepartementByCode($departementCode) {
        return $this->departements->get($departementCode)->get();
    }

    public function findDepartementByName($departementName) {
        if(!isset($this->departementNameIndex[$departementName])) {
            return null;
        }

        $departementCode = $this->departementNameIndex[$departementName];

        return $this->departements->get($departementCode)->get();
    }

    public function findRegionByName($regionName) {
        if(!isset($this->regionNameIndex[$regionName])) {
            return null;
        }

        $regionCode = $this->regionNameIndex[$regionName];

        return $this->regions->get($regionCode)->get();
    }

    public function findRegionByCode($regionCode) {
        return $this->regions->get($regionCode)->get();
    }

    private function loadDatas() {
        $regions = array();
        $datas = json_decode(file_get_contents($this->file), true);
        foreach($datas as $regionCode => $regionDatas) {
            $region = new Region();
            $region->setCode($regionCode);
            $region->setName($regionDatas['name']);
            foreach($regionDatas['depts'] as $deptCode => $deptName) {
                $departement = new Departement();
                $departement->setCode($deptCode);
                $departement->setName($deptName);
                $departement->setRegion($region);

                $region->addDepartement($departement);
                $this->departementNameIndex[$deptName] = $deptCode;
                $this->departements->set($deptCode, $departement);
            }
            $this->regionNameIndex[$regionDatas['name']] = $regionCode;
            $this->regions->set($regionCode, $region);
        }
    }

}

