<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\Order;
use App\models\Report;
use Illuminate\Http\Request;

class ReportController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Report::class;
        $this->setModel($model);
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('advertisement',function($query) {
                return $query->advertisement->title ?? '';
            })->addColumn('user',function($query) {
                return $query->user->email ?? '';
            });

        return parent::dataTableRelations();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
