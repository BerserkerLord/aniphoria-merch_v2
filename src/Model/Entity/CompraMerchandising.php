<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompraMerchandising Entity
 *
 * @property int $id
 * @property int $compra_id
 * @property int $merchandising_id
 * @property int $cantidad
 *
 * @property \App\Model\Entity\Compra $compra
 * @property \App\Model\Entity\Merchandising $merchandising
 */
class CompraMerchandising extends Entity
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
        'compra_id' => true,
        'merchandising_id' => true,
        'cantidad' => true,
        'compra' => true,
        'merchandising' => true,
    ];
}
