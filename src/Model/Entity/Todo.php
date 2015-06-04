<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Todo Entity.
 */
class Todo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'name' => true,
        'done' => true,
        'due_date' => true,
        'extra' => true,
    ];
}
