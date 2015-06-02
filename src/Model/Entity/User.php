<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'hashed_username' => true,
        'role' => true,
        'favorites' => true,
        'notes' => true,
        'groups' => true,
    ];
}
