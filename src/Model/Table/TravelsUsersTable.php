<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TravelsUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Travels
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TravelsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\TravelsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TravelsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TravelsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TravelsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TravelsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TravelsUser findOrCreate($search, callable $callback = null)
 */
class TravelsUsersTable extends Table
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

        $this->table('travels_users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Travels', [
            'foreignKey' => 'travel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('space_number')
            ->requirePresence('space_number', 'create')
            ->notEmpty('space_number');

        $validator
            ->decimal('volume')
            ->requirePresence('volume', 'create')
            ->notEmpty('volume');

        $validator
            ->decimal('weight')
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->decimal('total_price')
            ->requirePresence('total_price', 'create')
            ->notEmpty('total_price');

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
        $rules->add($rules->existsIn(['travel_id'], 'Travels'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
