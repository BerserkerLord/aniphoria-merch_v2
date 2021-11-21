<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchandisingTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchandisingTable Test Case
 */
class MerchandisingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchandisingTable
     */
    protected $Merchandising;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Merchandising',
        'app.Categoria',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Merchandising') ? [] : ['className' => MerchandisingTable::class];
        $this->Merchandising = $this->getTableLocator()->get('Merchandising', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Merchandising);

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
