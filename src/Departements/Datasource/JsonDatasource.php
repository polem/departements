<?php

namespace Departements\Datasource;

use Departements\Model\Region;
use Departements\Model\Departement;

class JsonDatasource extends AbstractDatasource implements DatasourceInterface
{
    private $file;

    public function __construct($file)
    {
        parent::__construct();
        $this->file = $file;
        $this->loadDatas();
    }

    private function loadDatas() {
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

                $this->addToIndex('departements', $deptName, $deptCode);
                $this->departements->set($deptCode, $departement);
            }
            $this->addToIndex('regions', $region->getName(), $regionCode);
            $this->regions->set($regionCode, $region);
        }
    }

}

