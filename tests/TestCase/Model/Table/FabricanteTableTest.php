<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FabricanteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FabricanteTable Test Case
 */
class FabricanteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FabricanteTable
     */
    protected $Fabricante;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Fabricante',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fabricante') ? [] : ['className' => FabricanteTable::class];
        $this->Fabricante = $this->getTableLocator()->get('Fabricante', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Fabricante);

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
