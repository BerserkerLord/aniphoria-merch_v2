<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property bool|null $verificado
 * @property string $nombre
 * @property string $apaterno
 * @property string|null $amaterno
 * @property \Cake\I18n\FrozenDate $fecha_nacimiento
 * @property \Cake\I18n\FrozenTime $fecha_registro
 * @property string|null $token
 * @property string $usuario
 * @property string $correo
 * @property string $contrasenia
 * @property string $foto
 * @property string $telefono
 */
class Cliente extends Entity
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
        'verificado' => true,
        'nombre' => true,
        'apaterno' => true,
        'amaterno' => true,
        'fecha_nacimiento' => true,
        'fecha_registro' => true,
        'token' => true,
        'usuario' => true,
        'correo' => true,
        'contrasenia' => true,
        'foto' => true,
        'telefono' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token',
    ];


}
