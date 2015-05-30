<?php
namespace Places\Model\Entity;

use Cake\ORM\Entity;

/**
 * Place Entity.
 */
class Place extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'category_id' => true,
        'api_id' => true,
        'title' => true,
        'category' => true,
        'address' => true,
        'description' => true,
        'image_url' => true,
        'rating' => true,
        'price' => true,
        'lat' => true,
        'lng' => true,
    ];
}
