<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property |\Cake\ORM\Association\HasMany $RfidAntennas
 * @property |\Cake\ORM\Association\HasMany $RfidControllers
 * @property |\Cake\ORM\Association\HasMany $RfidTags
 * @property |\Cake\ORM\Association\HasMany $Sites
 * @property |\Cake\ORM\Association\HasMany $Terminals
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 * @property |\Cake\ORM\Association\HasMany $Zones
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('RfidAntennas', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('RfidControllers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('RfidTags', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('OperatingStations', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Terminals', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Zones', [
            'foreignKey' => 'customer_id'
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
            ->allowEmpty('contactno');

        $validator
            ->allowEmpty('createdby');

        $validator
            ->allowEmpty('modifiedby');

        $validator
            ->allowEmpty('createdip');

        $validator
            ->allowEmpty('modiifedip');

        return $validator;
    }
}
