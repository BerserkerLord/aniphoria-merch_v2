<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estatus Model
 *
 * @property \App\Model\Table\FacturaTable&\Cake\ORM\Association\HasMany $Factura
 *
 * @method \App\Model\Entity\Estatus newEmptyEntity()
 * @method \App\Model\Entity\Estatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Estatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Estatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EstatusTable extends Table
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

        $this->setTable('estatus');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Factura', [
            'foreignKey' => 'estatus_id',
        ]);
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('estatus')
            ->maxLength('estatus', 15)
            ->requirePresence('estatus', 'create')
            ->notEmptyString('estatus');

        return $validator;
    }
}
