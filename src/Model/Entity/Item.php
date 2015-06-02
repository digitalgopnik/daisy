<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity.
 */
class Item extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'auth_key' => true,
        'auth_token' => true,
        'url' => true,
        'favorites' => true,
        'notes' => true,
        'words' => true,
    ];
}
