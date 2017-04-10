<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trip Entity
 *
 * @property int $id
 * @property string $departure
 * @property string $destination
 * @property \Cake\I18n\Time $departTime
 * @property \Cake\I18n\Time $destinTime
 * @property int $passenger_id
 *
 * @property \App\Model\Entity\Passenger[] $passengers
 */
class Trip extends Entity
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
