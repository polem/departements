# Departements

[![Build Status](https://secure.travis-ci.org/polem/departements.png)](http://travis-ci.org/polem/departements)

!! Under developement !!

## Installation

`composer require polem/departements`

## Usage

```php
use Departements\Datasource\JsonDatasource;
use Departements\Provider;

$file = __DIR__ . '/datas.json';
$datasource = new JsonDatasource($file);
$provider = new Provider($datasource);

// will return all departments
$provider->findAllDepartements();

// will return all departments
$provider->findAllRegions();
```
