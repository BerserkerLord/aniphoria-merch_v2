<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompraMerchandisingTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompraMerchandisingTable Test Case
 */
class CompraMerchandisingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompraMerchandisingTable
     */
    protected $CompraMerchandising;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CompraMerchandising',
        'app.Compra',
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
        $config = $this->getTableLocator()->exists('CompraMerchandising') ? [] : ['className' => CompraMerchandisingTable::class];
        $this->CompraMerchandising = $this->getTableLocator()->get('CompraMerchandising', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CompraMerchandising);

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
