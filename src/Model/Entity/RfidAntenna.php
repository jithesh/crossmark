<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RfidAntenna Entity
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property float $lat
 * @property float $lon
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $createdby
 * @property string $modifiedby
 * @property string $createdip
 * @property string $modiifedip
 * @property string $type
 * @property string $model
 * @property string $customer_id
 * @property string $rfidcontroller_id
 * @property string $antenna_no
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\RfidController $rfid_controller
 */
class RfidAntenna extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
