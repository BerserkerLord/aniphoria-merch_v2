<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompraTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompraTable Test Case
 */
class CompraTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompraTable
     */
    protected $Compra;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Compra',
        'app.Estatus',
        'app.Fabricante',
        'app.Merchandising',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Compra') ? [] : ['className' => CompraTable::class];
        $this->Compra = $this->getTableLocator()->get('Compra', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Compra);

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
