# Departements [![Build Status](https://secure.travis-ci.org/polem/departements.png)](http://travis-ci.org/polem/departements)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c75102a7-cf78-4059-81d7-22e10726d44c/mini.png)](https://insight.sensiolabs.com/projects/c75102a7-cf78-4059-81d7-22e10726d44c)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/polem/departements/badges/quality-score.png?s=117955da2fe7ce4e43e50df81df101ba520f3456)](https://scrutinizer-ci.com/g/polem/departements/)

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
