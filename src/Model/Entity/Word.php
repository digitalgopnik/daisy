<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Word Entity.
 */
class Word extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
    ];
}
