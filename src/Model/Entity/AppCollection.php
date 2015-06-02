<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppCollection Entity.
 */
class AppCollection extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'collection' => true,
        'user' => true,
    ];
}
