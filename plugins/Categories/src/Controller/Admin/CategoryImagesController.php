<?php
namespace Categories\Controller\Admin;

use Admin\Controller\AppController;
use Cake\Event\Event;

/**
 * StudioImages Controller
 *
 * @property \Studios\Model\Table\StudioImagesTable $StudioImages
 */
class CategoryImagesController extends AppController
{
    public $components = [
        'Crud.Crud' => [
            'actions' => [
                'Crud.Delete'
            ]
        ]
    ];

    public function add($categoryId)
    {
        if ($this->request->is('post') && isset($this->request->data['file'])) {
            if ($this->CategoryImages->upload($categoryId, $this->request->data)) {
                $this->Flash->success('The image has been uploaded.');
            } else {
                $this->Flash->error('The image could not be uploaded. Please, try again.');
            }
        }

        return $this->redirect($this->referer());
    }

    public function delete($id)
    {
        $this->Crud->on('afterDelete', function(Event $event) {
            if ($event->subject->success) {
                $this->redirect(['controller' => 'Categories', 'action' => 'edit', $event->subject->entity->foreign_key, 'plugin' => 'Categories']);
            }
        });

        return $this->Crud->execute();
    }
}
