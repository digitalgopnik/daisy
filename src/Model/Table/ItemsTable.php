<?php
namespace App\Model\Table;

use App\Model\Entity\Item;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 */
class ItemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('items');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Favorites', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Words', [
            'foreignKey' => 'item_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->requirePresence('auth_key', 'create')
            ->notEmpty('auth_key');
            
        $validator
            ->requirePresence('auth_token', 'create')
            ->notEmpty('auth_token');
            
        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        return $validator;
    }
}
