<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TerminalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TerminalsTable Test Case
 */
class TerminalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TerminalsTable
     */
    public $Terminals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.terminals',
        'app.operating_stations',
        'app.customers',
        'app.users',
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
        $config = TableRegistry::exists('Terminals') ? [] : ['className' => TerminalsTable::class];
        $this->Terminals = TableRegistry::get('Terminals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Terminals);

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
