<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfidControllersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfidControllersTable Test Case
 */
class RfidControllersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RfidControllersTable
     */
    public $RfidControllers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rfid_controllers',
        'app.zones',
        'app.terminals',
        'app.operating_stations',
        'app.customers',
        'app.users',
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
        $config = TableRegistry::exists('RfidControllers') ? [] : ['className' => RfidControllersTable::class];
        $this->RfidControllers = TableRegistry::get('RfidControllers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RfidControllers);

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
