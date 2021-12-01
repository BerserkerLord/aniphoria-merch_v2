<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Administrador Model
 *
 * @method \App\Model\Entity\Administrador newEmptyEntity()
 * @method \App\Model\Entity\Administrador newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Administrador[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Administrador get($primaryKey, $options = [])
 * @method \App\Model\Entity\Administrador findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Administrador patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Administrador[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Administrador|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Administrador saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Administrador[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Administrador[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Administrador[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Administrador[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdministradorTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('administrador');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->allowEmptyString('token')
            ->add('token', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 100)
            ->requirePresence('usuario', 'create')
            ->notEmptyString('usuario')
            ->add('usuario', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'El usuario ya existe, introduzca uno nuevo']);;

        $validator
            ->scalar('correo')
            ->maxLength('correo', 100)
            ->requirePresence('correo', 'create')
            ->notEmptyString('correo')
            ->add('correo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'El correo ya existe, introduzca uno nuevo']);;

        $validator
            ->scalar('contrasenia')
            ->maxLength('contrasenia', 32)
            ->requirePresence('contrasenia', 'create')
            ->notEmptyString('contrasenia');

        $validator
            ->allowEmptyFile('imagen')
            ->add( 'imagen', [
            'mimeType' => [
                'rule' => [ 'mimeType', [ 'image/jpg', 'image/png', 'image/jpeg' ] ],
                'message' => 'Solo se admiten imagenes en png, jpg o jpeg.',
            ],
            'fileSize' => [
                'rule' => [ 'fileSize', '<=', '2MB' ],
                'message' => 'El tamaño del archivo debe de ser menor a 1MB.',
            ],
        ] );

        return $validator;
    }
}
