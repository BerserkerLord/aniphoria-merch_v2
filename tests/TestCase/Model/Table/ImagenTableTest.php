<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagenTable Test Case
 */
class ImagenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagenTable
     */
    protected $Imagen;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Imagen',
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
        $config = $this->getTableLocator()->exists('Imagen') ? [] : ['className' => ImagenTable::class];
        $this->Imagen = $this->getTableLocator()->get('Imagen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Imagen);

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
