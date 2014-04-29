<?php

namespace Departements\Datasource;

interface DatasourceInterface
{
    public function findAllDepartements();
    public function findAllRegions();
    public function findDepartementByCode($departementCode);
    public function findDepartementByName($departementName);
    public function findRegionByName($regionName);
    public function findRegionByCode($regionCode);
}

