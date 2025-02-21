<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Direccion Entity
 *
 * @property int $id
 * @property int $cliente_id
 * @property string $direccion
 * @property bool $estatus
 * @property \App\Model\Entity\Cliente $cliente
 */
class Direccion extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'cliente_id' => true,
        'direccion' => true,
        'cliente' => true,
        'estatus' => true
    ];
}
