<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property int $estatus_id
 * @property int|null $cliente_id
 * @property int $direccion_id
 * @property int|null $cupon_id
 * @property \Cake\I18n\FrozenTime $fecha
 *
 * @property \App\Model\Entity\Estatus $estatus
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Direccion $direccion
 * @property \App\Model\Entity\Cupon $cupon
 * @property \App\Model\Entity\Merchandising[] $merchandising
 */
class Pedido extends Entity
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
        'estatus_id' => true,
        'cliente_id' => true,
        'direccion_id' => true,
        'cupon_id' => true,
        'fecha' => true,
        'estatus' => true,
        'cliente' => true,
        'direccion' => true,
        'cupon' => true,
        'merchandising' => true,
    ];
}
