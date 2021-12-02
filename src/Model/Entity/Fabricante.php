<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fabricante Entity
 *
 * @property int $id
 * @property string $rfc
 * @property string $razon_social
 * @property string $direccion
 * @property string $telefono
 * @property bool $estatus
 */
class Fabricante extends Entity
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
        'rfc' => true,
        'razon_social' => true,
        'direccion' => true,
        'telefono' => true,
        'estatus' => true,
    ];
}
