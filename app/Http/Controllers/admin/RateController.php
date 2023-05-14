<?php

namespace App\Http\Controllers\admin;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Rate::class;
        $this->setModel($model);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('user',function($query) {
                return $query->user->email ?? '';
            });
        return parent::dataTableRelations();
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Rate $rate)
    {
        //
    }

    public function edit(Rate $rate)
    {
        //
    }

    public function update(Request $request, Rate $rate)
    {
        //
    }
    public function destroy(Rate $rate)
    {
        //
    }

}
