<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompraMerchandising Model
 *
 * @property \App\Model\Table\CompraTable&\Cake\ORM\Association\BelongsTo $Compra
 * @property \App\Model\Table\MerchandisingTable&\Cake\ORM\Association\BelongsTo $Merchandising
 *
 * @method \App\Model\Entity\CompraMerchandising newEmptyEntity()
 * @method \App\Model\Entity\CompraMerchandising newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CompraMerchandising[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompraMerchandising get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompraMerchandising findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CompraMerchandising patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompraMerchandising[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompraMerchandising|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompraMerchandising saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompraMerchandising[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompraMerchandising[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompraMerchandising[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompraMerchandising[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CompraMerchandisingTable extends Table
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

        $this->setTable('compra_merchandising');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Compra', [
            'foreignKey' => 'compra_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Merchandising', [
            'foreignKey' => 'merchandising_id',
            'joinType' => 'INNER',
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
            ->requirePresence('cantidad', 'create')
            ->notEmptyString('cantidad');

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
        $rules->add($rules->existsIn(['compra_id'], 'Compra'), ['errorField' => 'compra_id']);
        $rules->add($rules->existsIn(['merchandising_id'], 'Merchandising'), ['errorField' => 'merchandising_id']);

        return $rules;
    }
}
