<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfidTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfidTagsTable Test Case
 */
class RfidTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RfidTagsTable
     */
    public $RfidTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rfid_tags',
        'app.terminals',
        'app.operating_stations',
        'app.customers',
        'app.users',
        'app.zones',
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
        $config = TableRegistry::exists('RfidTags') ? [] : ['className' => RfidTagsTable::class];
        $this->RfidTags = TableRegistry::get('RfidTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RfidTags);

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
