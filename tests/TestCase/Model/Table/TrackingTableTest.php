<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrackingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrackingTable Test Case
 */
class TrackingTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrackingTable
     */
    public $Tracking;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tracking'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tracking') ? [] : ['className' => TrackingTable::class];
        $this->Tracking = TableRegistry::get('Tracking', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tracking);

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
}
