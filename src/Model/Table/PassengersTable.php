<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Passengers Model
 *
 * @property \Cake\ORM\Association\HasMany $Trips
 * @property \Cake\ORM\Association\BelongsToMany $Trips
 *
 * @method \App\Model\Entity\Passenger get($primaryKey, $options = [])
 * @method \App\Model\Entity\Passenger newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Passenger[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Passenger|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passenger patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Passenger[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Passenger findOrCreate($search, callable $callback = null, $options = [])
 */
class PassengersTable extends Table
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

        $this->setTable('passengers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Trips', [
            'foreignKey' => 'passenger_id'
        ]);
        $this->belongsToMany('Trips', [
            'foreignKey' => 'passenger_id',
            'targetForeignKey' => 'trip_id',
            'joinTable' => 'passengers_trips',
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');

        $validator
            ->requirePresence('passportID', 'create')
            ->notEmpty('passportID');

        return $validator;
    }
}
