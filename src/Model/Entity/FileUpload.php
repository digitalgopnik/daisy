<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FileUpload Entity.
 */
class FileUpload extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'app_name' => true,
        'url' => true,
        'group_id' => true,
        'data' => true,
        'src' => true,
        'filename' => true,
        'type' => true,
        'user' => true,
        'group' => true,
        'created' => true,
        'modified' => true
    ];
}
