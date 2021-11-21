<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdministradorTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdministradorTable Test Case
 */
class AdministradorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdministradorTable
     */
    protected $Administrador;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Administrador',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Administrador') ? [] : ['className' => AdministradorTable::class];
        $this->Administrador = $this->getTableLocator()->get('Administrador', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Administrador);

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
