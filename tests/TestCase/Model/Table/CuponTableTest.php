<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CuponTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CuponTable Test Case
 */
class CuponTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CuponTable
     */
    protected $Cupon;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Cupon',
        'app.Pedido',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cupon') ? [] : ['className' => CuponTable::class];
        $this->Cupon = $this->getTableLocator()->get('Cupon', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Cupon);

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
