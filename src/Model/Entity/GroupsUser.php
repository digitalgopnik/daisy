<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity.
 */
class GroupsUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'group_id' => true,
        'is_admin' => true,
        'token' => true,
        'accepted' => true
    ];
}
