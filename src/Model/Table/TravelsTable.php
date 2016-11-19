<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Travels Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Travel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Travel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Travel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Travel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Travel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Travel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Travel findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TravelsTable extends Table
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

        $this->table('travels');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'travel_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'travels_users'
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
            ->dateTime('time_to_go')
            ->requirePresence('time_to_go', 'create')
            ->notEmpty('time_to_go');

        $validator
            ->requirePresence('local_to_start', 'create')
            ->notEmpty('local_to_start');

        $validator
            ->requirePresence('destination', 'create')
            ->notEmpty('destination');

        $validator
            ->integer('space')
            ->requirePresence('space', 'create')
            ->notEmpty('space');

        $validator
            ->requirePresence('space_cost', 'create')
            ->notEmpty('space_cost');

        $validator
            ->requirePresence('volume', 'create')
            ->notEmpty('volume');

        $validator
            ->requirePresence('volume_cost', 'create')
            ->notEmpty('volume_cost');

        $validator
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->requirePresence('weight_cost', 'create')
            ->notEmpty('weight_cost');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
