<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Region\StoreRegionRequest;
use App\Http\Requests\Region\UpdateRegionRequest;
use App\models\City;
use App\models\Region;
use Illuminate\Http\Request;

class RegionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Region::class;
        $this->setModel($model);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('city',function($query) {
                return $query->city->name ?? '';
            })->addColumn('name_en',function($query) {
                return $query->getTranslation('name','en');
            });
        return parent::dataTableRelations();
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function create()
    {
        $cities=City::all();
        return view($this->createView,compact('cities'));
    }

    public function store(StoreRegionRequest $request)
    {
        $validated_data = $request->validated();
        $object = $this->model::create($validated_data);
        $this->handleTranslations($request,$object);
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function show($id)
    {
        $region = $this->model::findOrFail($id);
        return view($this->showView, compact('region'));
    }

    public function edit($id)
    {
        $cities=City::all();
        $region = $this->model::findOrFail($id);
        return view($this->editView, compact(['region','cities']));
    }

    public function update(UpdateRegionRequest $request, $id)
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
