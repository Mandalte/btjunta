<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Travel Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $time_to_go
 * @property string $local_to_start
 * @property string $destination
 * @property int $space
 * @property string $space_cost
 * @property string $volume
 * @property string $volume_cost
 * @property string $weight
 * @property string $weight_cost
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\User[] $users
 */
class Travel extends Entity
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
