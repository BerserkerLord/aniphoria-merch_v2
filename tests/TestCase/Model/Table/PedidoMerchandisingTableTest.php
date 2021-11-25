<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidoMerchandisingTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidoMerchandisingTable Test Case
 */
class PedidoMerchandisingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidoMerchandisingTable
     */
    protected $PedidoMerchandising;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PedidoMerchandising',
        'app.Pedido',
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
        $config = $this->getTableLocator()->exists('PedidoMerchandising') ? [] : ['className' => PedidoMerchandisingTable::class];
        $this->PedidoMerchandising = $this->getTableLocator()->get('PedidoMerchandising', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PedidoMerchandising);

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
