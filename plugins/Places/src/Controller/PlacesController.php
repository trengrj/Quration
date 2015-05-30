<?php
namespace Places\Controller;

use Places\Controller\AppController;

/**
 * Places Controller
 *
 * @property \Places\Model\Table\PlacesTable $Places
 */
class PlacesController extends AppController
{
    public function categories()
    {
        $categories = $this->loadModel('Categories.Categories')
            ->find('all')
            ->contain(['CategoryImages'])
            ->order(['pos']);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    public function index($categoryId = null)
    {
        $places = $this->loadModel('Places.Places')
            ->find('all')
            ->contain(['PlaceImages', 'PlaceScenes', 'Categories'])
            ->order(['RAND()'])
            ->limit(5);

        if ($categoryId) {
            $places = $places->where(['category_id' => $categoryId]);
        }

        $this->set(compact('places'));
        $this->set('_serialize', ['places']);
    }

    public function view($id)
    {
        $place = $this->loadModel('Places.Places')
            ->get(
                $id,
                [
                    'contain' => ['PlaceImages', 'PlaceScenes', 'Categories']
                ]
            );

        $this->set(compact('place'));
        $this->set('_serialize', ['place']);
    }
}
