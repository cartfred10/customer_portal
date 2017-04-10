<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PassengersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PassengersTable Test Case
 */
class PassengersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PassengersTable
     */
    public $Passengers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passengers',
        'app.trips',
        'app.passengers_trips'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Passengers') ? [] : ['className' => 'App\Model\Table\PassengersTable'];
        $this->Passengers = TableRegistry::get('Passengers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Passengers);

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
