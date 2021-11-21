<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompraFixture
 */
class CompraFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'compra';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'estatus_id' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fabricante_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'FK1_COMPRA' => ['type' => 'index', 'columns' => ['estatus_id'], 'length' => []],
            'FK2_COMPRA' => ['type' => 'index', 'columns' => ['fabricante_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK1_COMPRA' => ['type' => 'foreign', 'columns' => ['estatus_id'], 'references' => ['estatus', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK2_COMPRA' => ['type' => 'foreign', 'columns' => ['fabricante_id'], 'references' => ['fabricante', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'fabricante_id' => 1,
                'fecha' => '2021-11-20 23:59:40',
            ],
        ];
        parent::init();
    }
}
