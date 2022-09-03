<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aeds Model
 *
 * @method \App\Model\Entity\Aed get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aed newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aed[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aed|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aed saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aed[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aed findOrCreate($search, callable $callback = null, $options = [])
 */
class AedsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    // データの取得や更新を行う
    // バリデーション等の定義も行える（追加予定）
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('aeds');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('location_name')
            ->maxLength('location_name', 255)
            ->requirePresence('location_name', 'create')
            ->allowEmptyString('location_name', false);

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->decimal('latitude')
            ->requirePresence('latitude', 'create')
            ->allowEmptyString('latitude', false);

        $validator
            ->decimal('longitude')
            ->requirePresence('longitude', 'create')
            ->allowEmptyString('longitude', false);

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->requirePresence('phone', 'create')
            ->allowEmptyString('phone', false);

        $validator
            ->scalar('usable_time')
            ->maxLength('usable_time', 255)
            ->requirePresence('usable_time', 'create')
            ->allowEmptyString('usable_time', false);

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->requirePresence('url', 'create')
            ->allowEmptyString('url', false);

        return $validator;
    }
}
