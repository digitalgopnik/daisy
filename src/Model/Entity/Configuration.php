<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Configuration Entity.
 */
class Configuration extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'host' => true,
        'ip' => true
    ];
}
