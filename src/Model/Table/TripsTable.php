<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trips Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Passengers
 * @property \Cake\ORM\Association\BelongsToMany $Passengers
 *
 * @method \App\Model\Entity\Trip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip findOrCreate($search, callable $callback = null, $options = [])
 */
class TripsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('trips');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Passengers', [
            'foreignKey' => 'passenger_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Passengers', [
            'foreignKey' => 'trip_id',
            'targetForeignKey' => 'passenger_id',
            'joinTable' => 'passengers_trips'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('departure', 'create')
            ->notEmpty('departure');

        $validator
            ->requirePresence('destination', 'create')
            ->notEmpty('destination');

        $validator
            ->dateTime('departTime')
            ->requirePresence('departTime', 'create')
            ->notEmpty('departTime');

        $validator
            ->dateTime('destinTime')
            ->requirePresence('destinTime', 'create')
            ->notEmpty('destinTime');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['passenger_id'], 'Passengers'));

        return $rules;
    }
}
