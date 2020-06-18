<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
    }

    protected function setupListOperation()
    {
        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];

        $f2 = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'nomFormule',
        ];
        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];

        $f5 = [
            'name' => 'id',
            'type' => 'text',
            'label' => 'Id',
        ];


        $this->crud->addColumns([$f5, $f1, $f2, $f3]);
    }

    protected function setupCreateOperation()
    {


        $this->crud->setValidation(FormuleRequest::class);
        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];


        $f2 = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Nom Formule',
        ];

        $f4 = [
            'name' => 'text',
            'label' => 'Text',
            'type' => 'ckeditor',
            'placeholder' => 'text ici ...',
        ];

        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];

        $this->crud->addFields([$f1, $f2, $f3, $f4]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
