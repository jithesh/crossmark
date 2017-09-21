<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfidAntennas Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\RfidControllersTable|\Cake\ORM\Association\BelongsTo $RfidControllers
 *
 * @method \App\Model\Entity\RfidAntenna get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfidAntenna newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RfidAntenna[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfidAntenna|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfidAntenna patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfidAntenna[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfidAntenna findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RfidAntennasTable extends Table
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

        $this->setTable('rfid_antennas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('RfidControllers', [
            'foreignKey' => 'rfidcontroller_id'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->numeric('lat')
            ->allowEmpty('lat');

        $validator
            ->numeric('lon')
            ->allowEmpty('lon');

        $validator
            ->allowEmpty('createdby');

        $validator
            ->allowEmpty('modifiedby');

        $validator
            ->allowEmpty('createdip');

        $validator
            ->allowEmpty('modiifedip');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('model');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['rfidcontroller_id'], 'RfidControllers'));

        return $rules;
    }
}
