<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        $f1 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f2 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];
        $f3 = [
            'name' => 'email',
            'type' => 'email',
            'label' => 'email',
        ];


        $f4 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];
        $f5 = [
            'name' => 'date',
            'type' => 'date',
            'label' => 'date',
        ];
        $f6 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'adresse',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5,$f6]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);
        $this->crud->addField([
            'label' => "ImgPath",
            'name' => "imgPath",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1,
        ]
      );
      $this->crud->addField(
          [
              // Password
                'name' => 'motdepasse',
                'label' => 'mot de passe',
                'type' => 'password'

          ]
          );


        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
