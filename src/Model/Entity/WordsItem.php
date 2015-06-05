<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity.
 */
class WordsItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'word_id' => true,
        'item_id' => true
    ];
}
