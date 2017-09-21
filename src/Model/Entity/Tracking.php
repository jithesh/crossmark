<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tracking Entity
 *
 * @property string $id
 * @property int $unq
 * @property string $type
 * @property string $serialno
 * @property string $datablock
 * @property \Cake\I18n\FrozenTime $date
 * @property string $antnr
 * @property string $rsslalrt1
 * @property string $rssalrt2
 * @property string $rsslalrt3
 * @property string $rsslalrt4
 * @property string $input
 * @property string $state
 * @property bool $isexited
 * @property string $isprocessed
 */
class Tracking extends Entity
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
