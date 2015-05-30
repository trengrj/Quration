<?php
namespace Places\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Places\Model\Entity\Place;

/**
 * Places Model
 */
class PlacesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('places');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'Categories.Categories'
        ]);
        $this->hasMany('PlaceImages', [
            'className' => 'Places.PlaceImages',
            'foreignKey' => 'foreign_key',
            'conditions' => [
                'PlaceImages.model' => 'PlaceImage'
            ]
        ]);
        $this->hasMany('PlaceScenes', [
            'className' => 'Places.PlaceScenes',
            'foreignKey' => 'foreign_key',
            'conditions' => [
                'PlaceScenes.model' => 'PlaceScene'
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
            ->add('rating', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('rating');

        $validator
            ->add('price', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('price');

        $validator
            ->add('lat', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('lat');

        $validator
            ->add('lng', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('lng');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        return $rules;
    }
}
