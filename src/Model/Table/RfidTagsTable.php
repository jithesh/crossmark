<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfidTags Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Firstdectectedantennas
 * @property |\Cake\ORM\Association\BelongsTo $Lastdectectedantennas
 * @property |\Cake\ORM\Association\BelongsTo $Registringantennas
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\TerminalsTable|\Cake\ORM\Association\BelongsTo $Terminals
 *
 * @method \App\Model\Entity\RfidTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfidTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RfidTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfidTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfidTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfidTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfidTag findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RfidTagsTable extends Table
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

        $this->setTable('rfid_tags');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // $this->belongsTo('Firstdectectedantennas', [
            // 'foreignKey' => 'firstdectectedantenna_id'
        // ]);
        // $this->belongsTo('Lastdectectedantennas', [
            // 'foreignKey' => 'lastdectectedantenna_id'
        // ]);
        // $this->belongsTo('Registringantennas', [
            // 'foreignKey' => 'registringantenna_id'
        // ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Terminals', [
            'foreignKey' => 'terminal_id'
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
            ->allowEmpty('serialno');

        $validator
            ->allowEmpty('tagtype');

        $validator
            ->dateTime('firstdetectedtime')
            ->allowEmpty('firstdetectedtime');

        $validator
            ->dateTime('lastdetectedtime')
            ->allowEmpty('lastdetectedtime');

        $validator
            ->boolean('activated')
            ->allowEmpty('activated');

        $validator
            ->boolean('exited')
            ->allowEmpty('exited');

        $validator
            ->dateTime('registrationtime')
            ->allowEmpty('registrationtime');

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
            ->allowEmpty('rowdata');

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
        // $rules->add($rules->existsIn(['firstdectectedantenna_id'], 'Firstdectectedantennas'));
        // $rules->add($rules->existsIn(['lastdectectedantenna_id'], 'Lastdectectedantennas'));
        // $rules->add($rules->existsIn(['registringantenna_id'], 'Registringantennas'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['terminal_id'], 'Terminals'));

        return $rules;
    }
}
