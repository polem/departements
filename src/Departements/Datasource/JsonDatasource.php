<?php

namespace Departements\Datasource;

use Departements\Model\Region;
use Departements\Model\Departement;
use Departements\Model\Commune;

use PhpCollection\Sequence;

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
            foreach($regionDatas['depts'] as $deptCode => $deptDatas) {
                $departement = new Departement();
                $departement->setCode($deptCode);
                $departement->setName($deptDatas['name']);
                $departement->setRegion($region);

                $region->addDepartement($departement);

                if (!isset($deptDatas['cities'])) {
                    $deptDatas['cities'] = array();
                }
                
                // add cities
                foreach($deptDatas['cities'] as $zipcode => $cities) {
                    $communes = new Sequence();
                    foreach($cities as $cityName) {
                        $commune = new Commune($cityName, $zipcode, $departement);
                        $this->addToIndex('communes', $cityName, $zipcode);
                        $communes->add($commune);
                        $departement->addCommune($commune);
                    }
                    $this->communes->set($zipcode, $communes);
                }

                $this->addToIndex('departements', $deptDatas['name'], $deptCode);
                $this->departements->set($deptCode, $departement);
            }
            $this->addToIndex('regions', $region->getName(), $regionCode);
            $this->regions->set($regionCode, $region);
        }
    }
}

