<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cupon Entity
 *
 * @property int $id
 * @property string $codigo
 * @property \Cake\I18n\FrozenDate $fecha_lanzamiento
 * @property \Cake\I18n\FrozenDate $fecha_expiracion
 * @property string $porcentaje
 * @property string $minimo
 *
 * @property \App\Model\Entity\Pedido[] $pedido
 */
class Cupon extends Entity
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
        'codigo' => true,
        'fecha_lanzamiento' => true,
        'fecha_expiracion' => true,
        'porcentaje' => true,
        'minimo' => true,
        'pedido' => true,
    ];
}
