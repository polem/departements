<?php

namespace Departements\Datasource;

use PhpCollection\Map;

abstract class AbstractDatasource implements DatasourceInterface
{
    protected $regions;
    protected $departements;

    public function __construct() {
        $this->regions = new Map();
        $this->departements = new Map();
    }
}

