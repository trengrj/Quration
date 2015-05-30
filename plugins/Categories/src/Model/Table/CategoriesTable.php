<?php
namespace Categories\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Categories\Model\Entity\Category;

/**
 * Categories Model
 */
class CategoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('categories');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Places', [
            'foreignKey' => 'category_id',
            'className' => 'Categories.Places'
        ]);
        $this->hasMany('CategoryImages', [
            'className' => 'Categories.CategoryImages',
            'foreignKey' => 'foreign_key',
            'conditions' => [
                'CategoryImages.model' => 'CategoryImage'
            ]
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->add('pos', 'valid', ['rule' => 'numeric'])
            ->requirePresence('pos', 'create')
            ->notEmpty('pos');

        return $validator;
    }
}
