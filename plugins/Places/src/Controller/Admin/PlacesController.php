<?php
namespace Places\Controller\Admin;

use Admin\Controller\AppController;
use Cake\Event\Event;

/**
 * Places Controller
 *
 * @property \Places\Model\Table\PlacesTable $Places
 */
class PlacesController extends AppController
{
    public function index()
    {
        $this->Crud->on('beforePaginate', function (Event $event) {
            $this->paginate['contain'] = ['Categories'];
        });

        return $this->Crud->execute();
    }

    public function add()
    {
        $categories = $this->loadModel('Categories.Categories')->find('list')->order(['pos']);

        $this->set(compact('categories'));

        $this->Crud->on('beforeFind', function (Event $event) {
            $event->subject->query->contain([
                'PlaceImages',
                'PlaceScenes',
            ]);
        });

        return $this->Crud->execute();
    }

    public function edit($id)
    {
        return $this->add();
    }
}
