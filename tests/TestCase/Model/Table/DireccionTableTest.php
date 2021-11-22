<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DireccionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DireccionTable Test Case
 */
class DireccionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DireccionTable
     */
    protected $Direccion;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Direccion',
        'app.Cliente',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Direccion') ? [] : ['className' => DireccionTable::class];
        $this->Direccion = $this->getTableLocator()->get('Direccion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Direccion);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
