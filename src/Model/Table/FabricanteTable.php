<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fabricante Model
 *
 * @method \App\Model\Entity\Fabricante newEmptyEntity()
 * @method \App\Model\Entity\Fabricante newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fabricante findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fabricante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fabricante saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fabricante[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fabricante[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fabricante[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fabricante[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FabricanteTable extends Table
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

        $this->setTable('fabricante');
        $this->setDisplayField('razon_social');
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
            ->scalar('rfc')
            ->maxLength('rfc', 13)
            ->requirePresence('rfc', 'create')
            ->notEmptyString('rfc')
            ->add('rfc', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'El RFC ingresado ya existe. Introduzca uno nuevo.']);

        $validator
            ->scalar('razon_social')
            ->maxLength('razon_social', 100)
            ->requirePresence('razon_social', 'create')
            ->notEmptyString('razon_social');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 100)
            ->requirePresence('direccion', 'create')
            ->notEmptyString('direccion');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 15)
            ->requirePresence('telefono', 'create')
            ->notEmptyString('telefono')
            ->add('telefono', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'El telefono ingresado ya existe. Introduzca uno nuevo.']);;

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['rfc']), ['errorField' => 'rfc']);

        return $rules;
    }
}
