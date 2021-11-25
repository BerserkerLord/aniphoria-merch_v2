<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidoMerchandisingFixture
 */
class PedidoMerchandisingFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pedido_merchandising';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pedido_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'merchandising_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cantidad' => ['type' => 'smallinteger', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK1_PEDIDO_MERCHANDISING' => ['type' => 'index', 'columns' => ['pedido_id'], 'length' => []],
            'FK2_PEDIDO_MERCHANDISING' => ['type' => 'index', 'columns' => ['merchandising_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK1_PEDIDO_MERCHANDISING' => ['type' => 'foreign', 'columns' => ['pedido_id'], 'references' => ['pedido', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK2_PEDIDO_MERCHANDISING' => ['type' => 'foreign', 'columns' => ['merchandising_id'], 'references' => ['merchandising', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'pedido_id' => 1,
                'merchandising_id' => 1,
                'cantidad' => 1,
            ],
        ];
        parent::init();
    }
}
