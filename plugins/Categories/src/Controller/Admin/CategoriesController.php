<?php
namespace Categories\Controller\Admin;

use Admin\Controller\AppController;
use Cake\Event\Event;

/**
 * Categories Controller
 *
 * @property \Categories\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{
    public function edit($id)
    {
        $this->Crud->on('beforeFind', function (Event $event) {
            $event->subject->query->contain([
                'CategoryImages',
            ]);
        });

        return $this->Crud->execute();
    }

}
