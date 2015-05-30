<?php
namespace Categories\Controller;

use Categories\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \Categories\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{
    public function index()
    {
        $categories = $this->loadModel('Categories.Categories')
            ->find('all')
            ->contain(['CategoryImages'])
            ->order(['pos']);

        // Set the view vars that have to be serialized.
        $this->set(compact('categories'));

        // Specify which view vars JsonView should serialize.
        $this->set('_serialize', ['categories']);
    }
}
