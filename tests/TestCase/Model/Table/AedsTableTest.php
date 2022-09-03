<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AedsTable Test Case
 */
class AedsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AedsTable
     */
    public $Aeds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Aeds'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Aeds') ? [] : ['className' => AedsTable::class];
        $this->Aeds = TableRegistry::getTableLocator()->get('Aeds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Aeds);

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
