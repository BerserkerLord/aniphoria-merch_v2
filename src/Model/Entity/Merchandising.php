<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Merchandising Entity
 *
 * @property int $id
 * @property int $categoria_id
 * @property string $articulo
 * @property string|null $detalles
 * @property string $costo
 * @property string $precio
 * @property bool $estatus
 *
 * @property \App\Model\Entity\Categorium $categorium
 */
class Merchandising extends Entity
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
        'categoria_id' => true,
        'articulo' => true,
        'detalles' => true,
        'costo' => true,
        'precio' => true,
        'imagen' => true,
        'categorium' => true,
        'estatus' => true
    ];
}
