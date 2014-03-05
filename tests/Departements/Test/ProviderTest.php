<?php
namespace Departements\Test;

use Departements\Provider;

class ProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Departements\Provider::findAllDepartements
     */
    public function testFindAllDepartements()
    {
        $datasource = $this->getDatasourceMock();

        $datasource->expects($this->once())
            ->method('findAllDepartements')
            ->with()
        ;

        $provider = new Provider($datasource);
        $provider->findAllDepartements();
    }

    /**
     * @covers Departements\Provider::findAllRegions
     */
    public function testFindAllRegions()
    {
        $datasource = $this->getDatasourceMock();

        $datasource->expects($this->once())
            ->method('findAllRegions')
            ->with()
        ;

        $provider = new Provider($datasource);
        $provider->findAllRegions();
    }

    /**
     * @covers Departements\Provider::findDepartementByCode
     */
    public function testFindDepartementByCode()
    {
        $code = 'code';

        $datasource = $this->getDatasourceMock();

        $datasource->expects($this->once())
            ->method('findDepartementByCode')
            ->with($code)
        ;

        $provider = new Provider($datasource);
        $provider->findDepartementByCode($code);
    }

    /**
     * @covers Departements\Provider::findDepartementByName
     */
    public function testFindDepartementByName()
    {
        $name = 'name';

        $datasource = $this->getDatasourceMock();

        $datasource->expects($this->once())
            ->method('findDepartementByName')
            ->with($name)
        ;

        $provider = new Provider($datasource);
        $provider->findDepartementByName($name);
    }

    /**
     * @covers Departements\Provider::findRegionByName
     */
    public function testFindRegionByName()
    {
        $name = 'name';

        $datasource = $this->getDatasourceMock();

        $datasource->expects($this->once())
            ->method('findRegionByName')
            ->with($name)
        ;

        $provider = new Provider($datasource);
        $provider->findRegionByName($name);
    }

    /**
     * @covers Departements\Provider::findRegionByCode
     */
    public function testFindRegionByCode()
    {
        $code = 'code';

        $datasource = $this->getDatasourceMock();

        $datasource->expects($this->once())
            ->method('findRegionByCode')
            ->with($code)
        ;

        $provider = new Provider($datasource);
        $provider->findRegionByCode($code);
    }

    public function getDatasourceMock() {
        return $this->getMockBuilder('\Departements\Datasource\AbstractDatasource')
            ->getMock();
    }
}
