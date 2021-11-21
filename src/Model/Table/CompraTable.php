<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Compra Model
 *
 * @property \App\Model\Table\EstatusTable&\Cake\ORM\Association\BelongsTo $Estatus
 * @property \App\Model\Table\FabricanteTable&\Cake\ORM\Association\BelongsTo $Fabricante
 * @property \App\Model\Table\MerchandisingTable&\Cake\ORM\Association\BelongsToMany $Merchandising
 *
 * @method \App\Model\Entity\Compra newEmptyEntity()
 * @method \App\Model\Entity\Compra newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Compra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Compra get($primaryKey, $options = [])
 * @method \App\Model\Entity\Compra findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Compra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Compra[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Compra|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compra saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compra[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compra[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compra[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Compra[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CompraTable extends Table
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

        $this->setTable('compra');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Estatus', [
            'foreignKey' => 'estatus_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Fabricante', [
            'foreignKey' => 'fabricante_id',
        ]);
        $this->belongsToMany('Merchandising', [
            'foreignKey' => 'compra_id',
            'targetForeignKey' => 'merchandising_id',
            'joinTable' => 'compra_merchandising',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDateTime('fecha');

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
        $rules->add($rules->existsIn(['estatus_id'], 'Estatus'), ['errorField' => 'estatus_id']);
        $rules->add($rules->existsIn(['fabricante_id'], 'Fabricante'), ['errorField' => 'fabricante_id']);

        return $rules;
    }
}
