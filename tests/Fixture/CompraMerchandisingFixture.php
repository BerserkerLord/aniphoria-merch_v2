<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompraMerchandisingFixture
 */
class CompraMerchandisingFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'compra_merchandising';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'compra_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'merchandising_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cantidad' => ['type' => 'smallinteger', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK1_COMPRA_MERCHANDISING' => ['type' => 'index', 'columns' => ['compra_id'], 'length' => []],
            'FK2_COMPRA_MERCHANDISING' => ['type' => 'index', 'columns' => ['merchandising_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK1_COMPRA_MERCHANDISING' => ['type' => 'foreign', 'columns' => ['compra_id'], 'references' => ['compra', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK2_COMPRA_MERCHANDISING' => ['type' => 'foreign', 'columns' => ['merchandising_id'], 'references' => ['merchandising', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'compra_id' => 1,
                'merchandising_id' => 1,
                'cantidad' => 1,
            ],
        ];
        parent::init();
    }
}
