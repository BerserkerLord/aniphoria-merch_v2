<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidoFixture
 */
class PedidoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pedido';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'estatus_id' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cliente_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'direccion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cupon_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'FK1_PEDIDO' => ['type' => 'index', 'columns' => ['estatus_id'], 'length' => []],
            'FK2_PEDIDO' => ['type' => 'index', 'columns' => ['cliente_id'], 'length' => []],
            'FK3_PEDIDO' => ['type' => 'index', 'columns' => ['cupon_id'], 'length' => []],
            'FK4_PEDIDO' => ['type' => 'index', 'columns' => ['direccion_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK1_PEDIDO' => ['type' => 'foreign', 'columns' => ['estatus_id'], 'references' => ['estatus', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK2_PEDIDO' => ['type' => 'foreign', 'columns' => ['cliente_id'], 'references' => ['cliente', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK3_PEDIDO' => ['type' => 'foreign', 'columns' => ['cupon_id'], 'references' => ['cupon', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK4_PEDIDO' => ['type' => 'foreign', 'columns' => ['direccion_id'], 'references' => ['direccion', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'estatus_id' => 1,
                'cliente_id' => 1,
                'direccion_id' => 1,
                'cupon_id' => 1,
                'fecha' => '2021-11-25 00:25:09',
            ],
        ];
        parent::init();
    }
}
