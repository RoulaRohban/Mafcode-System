<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Http\Requests\Plan\StorePlanRequest;
use App\Http\Requests\Plan\UpdatePlanRequest;
use App\models\Plan;
use Illuminate\Http\Request;

class PlanController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Plan::class;
        $this->setModel($model);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('title_en',function($query) {
                return $query->getTranslation('title','en');
            });
        return parent::dataTableRelations();
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function create()
    {
        return view($this->createView);
    }

    public function store(StorePlanRequest $request)
    {
        $validated_data = $request->validated();
        $this->model::create($validated_data);
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function show($id)
    {
        $plan = $this->model::findOrFail($id);
        return view($this->showView, compact('plan'));
    }

    public function edit($id)
    {
        $plan = $this->model::findOrFail($id);
        return view($this->editView, compact('plan'));
    }

    public function update(UpdatePlanRequest $request, $id)
    {
        $object = $this->model::find($id);
        $update=$request->validated();
        $updated_instance = $object->update($update);
        return $this->redirectToIndexWithSuccess($this->successUpdateMessage);

    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $deleted = $this->model::findOrFail($id)->delete();
            if ($deleted) {
                return apiHelper::okResponse($this->successDeleteMessage);
            } else {
                return apiHelper::failResponse($this->failDeleteMessage);
            }
        }
        return $this->redirectToIndexWithError($this->failActionMessage);
    }
}
