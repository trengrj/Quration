<?php
namespace App\Controller;

class IndexController extends AppController
{
    public function index()
    {
        $categories = $this->loadModel('Categories.Categories')
            ->find('all')
            ->contain(['CategoryImages'])
            ->order(['pos']);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

}
