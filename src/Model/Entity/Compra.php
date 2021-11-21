<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Compra Entity
 *
 * @property int $id
 * @property int $estatus_id
 * @property int|null $fabricante_id
 * @property \Cake\I18n\FrozenTime $fecha
 *
 * @property \App\Model\Entity\Estatus $estatus
 * @property \App\Model\Entity\Fabricante $fabricante
 * @property \App\Model\Entity\Merchandising[] $merchandising
 */
class Compra extends Entity
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
        'fabricante_id' => true,
        'fecha' => true,
        'estatus' => true,
        'fabricante' => true,
        'merchandising' => true,
    ];
}
