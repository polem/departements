<?php

namespace Departements\Datasource;

use PhpCollection\Map;

abstract class AbstractDatasource implements DatasourceInterface
{
    protected $regions;
    protected $departements;
    protected $index;

    public function __construct() {
        $this->regions = new Map();
        $this->departements = new Map();
        $this->index = array(
            'departements'  => array(),
            'regions'  => array()
        );
    }

    protected function slugify($value) {
        $value = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $value));
        return preg_replace("/[^a-z0-9]/", "", $value);
    }

    protected function addToIndex($type, $value, $key) {
        $this->index[$type][$this->slugify($value)] = $key;
    }

    public function findAllDepartements() {
        return $this->departements;
    }

    public function findAllRegions() {
        return $this->regions;
    }

    public function findDepartementByCode($departementCode) {
        return $this->departements->get($departementCode)->getOrElse(null);
    }

    public function findDepartementByName($departementName) {
        $departementName = $this->slugify($departementName);

        if(!isset($this->index['departements'][$departementName])) {
            return null;
        }

        $departementCode = $this->index['departements'][$departementName];

        return $this->departements->get($departementCode)->get();
    }

    public function findRegionByName($regionName) {
        $regionName = $this->slugify($regionName);

        if(!isset($this->index['regions'][$regionName])) {
            return null;
        }

        $regionCode = $this->index['regions'][$regionName];

        return $this->regions->get($regionCode)->get();
    }

    public function findRegionByCode($regionCode) {
        return $this->regions->get($regionCode)->getOrElse(null);
    }
}

