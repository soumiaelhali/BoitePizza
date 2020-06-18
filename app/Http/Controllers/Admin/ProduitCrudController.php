<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\category;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
    }

    protected function setupListOperation()
    {
        $f1 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f2 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f3 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'In promo',
        ];
        $f4 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];
        $f5 = [
            'name' => 'category.namecat',
            'type' => 'text',
            'label' => 'Category'
        ];
        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->addField([
            'label' => "ImgPath",
            'name' => "imgPath",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1,
        ]);

        CRUD::addField([  // Select2
            'label'     => 'Category',
            'type'      => 'select2',
            'name'      => 'category_id', 
            'entity'    => 'category',
            'attribute' => 'namecat', 

            'tab' => 'Category',
        ]);

        $this->crud->setValidation(ProduitRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }



    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {

        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '300px'
        ];

        $f2 = [
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name',
        ];
        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];
        $f4 = [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f5 = [
            'name' => 'date_debut',
            'type' => 'date',
            'label' => 'Date debut',
        ];
        $f6 = [
            'name' => 'date_fin',
            'type' => 'date',
            'label' => 'Date in',
        ];
        $f7 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'In promo',
        ];
        $f8 = [
            'name' => 'category.namecat',
            'type' => 'text',
            'label' => 'Category',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8]);
    }
}
