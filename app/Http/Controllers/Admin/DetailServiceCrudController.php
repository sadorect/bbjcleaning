<?php

namespace App\Http\Controllers\Admin;

use App\Models\DetailService;
use App\Http\Requests\DetailServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DetailServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DetailServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\DetailService::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/detail-service');
        CRUD::setEntityNameStrings('detail service', 'detail services');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */

         
 
         // other setup configurations...
     
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setFromDb(); // set fields from db columns.
       
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::field([   // Upload
            'name'      => 'img1',
            'label'     => 'Image1',
            'type'      => 'upload',
            'withFiles' => true,
            'disk' => 'public', // Default storage disk (usually public)
            'prefix' => 'ds1-img1', // Custom folder for events
            'path' => 'serviceDetail', // Custom folder for events (relative to the disk root)
     
            ]);

            CRUD::field([   // Upload
                'name'      => 'img2',
                'label'     => 'Image2',
                'type'      => 'upload',
                'withFiles' => true,
                'disk' => 'public', // Default storage disk (usually public)
                'prefix' => 'ds1-img2', // Custom folder for events
                'path' => 'serviceDetail', // Custom folder for events (relative to the disk root)
         
                ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
