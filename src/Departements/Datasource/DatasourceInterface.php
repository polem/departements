<?php

namespace Departements\Datasource;

interface DatasourceInterface
{
    public function findAllDepartements();
    public function findAllRegions();
    public function findDepartementByCode($departementCode);
    public function findDepartementByName($departementCode);
    public function findRegionByName($regionCode);
    public function findRegionByCode($regionCode);
}

