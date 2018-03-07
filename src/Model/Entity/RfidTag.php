<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RfidTag Entity
 *
 * @property string $id
 * @property string $serialno
 * @property string $tagtype
 * @property string $firstdectectedantenna_id
 * @property \Cake\I18n\FrozenTime $firstdetectedtime
 * @property string $lastdectectedantenna_id
 * @property \Cake\I18n\FrozenTime $lastdetectedtime
 * @property bool $activated
 * @property bool $exited
 * @property \Cake\I18n\FrozenTime $registrationtime
 * @property string $registringantenna_id
 * @property string $customer_id
 * @property string $terminal_id
 * @property float $lat
 * @property float $lon
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $createdby
 * @property string $modifiedby
 * @property string $createdip
 * @property string $modiifedip
 * @property string $rowdata
 *
 * @property \App\Model\Entity\Terminal $terminal
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Customer $customer
 */
class RfidTag extends Entity
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
