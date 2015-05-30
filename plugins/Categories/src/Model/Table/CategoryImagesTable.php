<?php
namespace Categories\Model\Table;

use Cake\ORM\Table;
use Burzum\FileStorage\Model\Table\ImageStorageTable;

class CategoryImagesTable extends ImageStorageTable
{
    public function upload($productId, $data) {
        $data['adapter'] = 'Local';
        $data['model'] = 'CategoryImage';
        $data['foreign_key'] = $productId;
        $entity = $this->newEntity($data);
        return $this->save($entity);
    }
}
