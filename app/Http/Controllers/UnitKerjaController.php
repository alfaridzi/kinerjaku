<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;

class UnitKerjaController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("App\Models\UnitKerja");
        $this->crud->setRoute(config('backpack.base.route_prefix').'/unitkerja-item');
        $this->crud->setEntityNameStrings('unit kerja item', 'unit kerja items');

        // $this->crud->allowAccess('reorder');
        // $this->crud->enableReorder('nama_unit', 2);

        $this->crud->addColumn([
                                'name' => 'nama_unit',
                                'label' => 'Label',
                            ]);
        $this->crud->addColumn([
                                'name' => 'urutan',
                                'label' => 'Urutan',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Parent',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'nama_unit',
                                'model' => "App\Models\UnitKerja",
                            ]);
      $this->crud->addColumn([
                                'label' => 'User',
                                'type' => 'select',
                                'name' => 'user_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "App\User",
                          ]);

        $this->crud->addField([
                                'name' => 'nama_unit',
                                'label' => 'Label',
                            ]);

        $this->crud->addField([
                                'name' => 'urutan',
                                'label' => 'Urutan',
                            ]);
        $this->crud->addField([
                                'label' => 'Parent',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'nama_unit',
                                'model' => "App\Models\UnitKerja",
                            ]);
        $this->crud->addField([
                                'label' => 'User',
                                'type' => 'select',
                                'name' => 'user_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "App\User",
                            ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }
}
