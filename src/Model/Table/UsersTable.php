<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Favorites', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Groups', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'group_id',
            'through' => 'groups_users'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');
            
        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        return $validator;
    }
}
