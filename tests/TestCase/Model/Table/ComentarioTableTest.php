<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComentarioTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComentarioTable Test Case
 */
class ComentarioTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComentarioTable
     */
    protected $Comentario;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Comentario',
        'app.Merchandising',
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
        $config = $this->getTableLocator()->exists('Comentario') ? [] : ['className' => ComentarioTable::class];
        $this->Comentario = $this->getTableLocator()->get('Comentario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Comentario);

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
