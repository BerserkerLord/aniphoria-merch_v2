<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Merchandising Model
 *
 * @property \App\Model\Table\CategoriaTable&\Cake\ORM\Association\BelongsTo $Categoria
 *
 * @method \App\Model\Entity\Merchandising newEmptyEntity()
 * @method \App\Model\Entity\Merchandising newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Merchandising[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Merchandising get($primaryKey, $options = [])
 * @method \App\Model\Entity\Merchandising findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Merchandising patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Merchandising[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Merchandising|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Merchandising saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Merchandising[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Merchandising[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Merchandising[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Merchandising[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MerchandisingTable extends Table
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

        $this->setTable('merchandising');
        $this->setDisplayField('articulo');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categoria', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('Imagen', ['dependent' => true]);

        $this->belongsToMany('Compra', [
            'foreignKey' => 'merchandising_id',
            'targetForeignKey' => 'compra_id',
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
            ->scalar('articulo')
            ->maxLength('articulo', 100)
            ->requirePresence('articulo', 'create')
            ->notEmptyString('articulo');

        $validator
            ->scalar('detalles')
            ->allowEmptyString('detalles');

        $validator
            ->decimal('costo')
            ->requirePresence('costo', 'create')
            ->notEmptyString('costo');

        $validator
            ->decimal('precio')
            ->requirePresence('precio', 'create')
            ->notEmptyString('precio');

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
        $rules->add($rules->existsIn(['categoria_id'], 'Categoria'), ['errorField' => 'categoria_id']);

        return $rules;
    }
}
