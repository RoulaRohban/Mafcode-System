<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\models\City;
use App\models\Country;
use Illuminate\Http\Request;

class CityController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = City::class;
        $this->setModel($model);
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('country',function($query) {
                return $query->country->name ?? '';
            })->addColumn('name_en',function($query) {
                return $query->getTranslation('name','en');
            });

        return parent::dataTableRelations();
    }

    public function create()
    {
        $countries=Country::all();
        return view($this->createView,compact('countries'));
    }

    public function store(StoreCityRequest $request)
    {
        $validated_data = $request->validated();
        $object = $this->model::create($validated_data);
        $this->handleTranslations($request,$object);
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function show($id)
    {
        $city = $this->model::findOrFail($id);
        return view($this->showView, compact('city'));
    }

    public function edit($id)
    {
        $countries=Country::all();
        $city = $this->model::findOrFail($id);
        return view($this->editView, compact(['city','countries']));
    }

    public function update(UpdateCityRequest $request, $id)
    {
        $object = $this->model::find($id);
        $update=$request->validated();
        $object->update($update);
        $this->handleTranslations($request,$object);
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

    public function getRegionsByCity (Request $request) {
        $regions = $this->model::find($request->city_id)->regions;
        if (empty($regions->toArray()))
            return '';
        return view('admin.cities.select', compact('regions'));
    }
}
