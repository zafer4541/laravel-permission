<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use DataTables;

trait DataTableFetch {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    protected $route;
    protected $deleteFunction;
    public function fetch( Builder $model,$route,$deleteFunction) {

        $this->route=$route;
        $this->deleteFunction=$deleteFunction;
        
        return DataTables::eloquent($model)->addColumn('action',function($model){
            return '<td><a class="btn btn-success" href='.route($this->route,$model->id).'>Edit</a></td>
            <td><a class="btn btn-danger" onclick="'.$this->deleteFunction.'('.$model->id.')">Delete</a></td>';
         })->rawColumns(['action'])->make(true);

    }

}