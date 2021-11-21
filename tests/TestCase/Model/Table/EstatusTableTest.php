<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstatusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstatusTable Test Case
 */
class EstatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstatusTable
     */
    protected $Estatus;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Estatus',
        'app.Factura',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Estatus') ? [] : ['className' => EstatusTable::class];
        $this->Estatus = $this->getTableLocator()->get('Estatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Estatus);

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
}
