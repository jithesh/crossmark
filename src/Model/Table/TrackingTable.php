<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tracking Model
 *
 * @method \App\Model\Entity\Tracking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tracking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tracking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tracking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tracking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tracking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tracking findOrCreate($search, callable $callback = null, $options = [])
 */
class TrackingTable extends Table
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

        $this->setTable('tracking');
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('unq');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('serialno');

        $validator
            ->allowEmpty('datablock');

        $validator
            ->dateTime('date')
            ->allowEmpty('date');

        $validator
            ->allowEmpty('antnr');

        $validator
            ->allowEmpty('rsslalrt1');

        $validator
            ->allowEmpty('rssalrt2');

        $validator
            ->allowEmpty('rsslalrt3');

        $validator
            ->allowEmpty('rsslalrt4');

        $validator
            ->allowEmpty('input');

        $validator
            ->allowEmpty('state');

        $validator
            ->boolean('isexited')
            ->allowEmpty('isexited');

        $validator
            ->allowEmpty('isprocessed');

        return $validator;
    }
}
