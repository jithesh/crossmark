<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfidAntennasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfidAntennasTable Test Case
 */
class RfidAntennasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RfidAntennasTable
     */
    public $RfidAntennas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rfid_antennas',
        'app.customers',
        'app.users',
        'app.rfid_controllers',
        'app.zones',
        'app.terminals',
        'app.operating_stations',
        'app.rfid_tags',
        'app.rfid_readers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RfidAntennas') ? [] : ['className' => RfidAntennasTable::class];
        $this->RfidAntennas = TableRegistry::get('RfidAntennas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RfidAntennas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
