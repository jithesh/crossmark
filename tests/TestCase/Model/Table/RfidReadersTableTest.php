<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfidReadersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfidReadersTable Test Case
 */
class RfidReadersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RfidReadersTable
     */
    public $RfidReaders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rfid_readers',
        'app.zones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RfidReaders') ? [] : ['className' => RfidReadersTable::class];
        $this->RfidReaders = TableRegistry::get('RfidReaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RfidReaders);

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
