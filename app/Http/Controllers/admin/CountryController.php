<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\models\Country;
use Illuminate\Http\Request;

class CountryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Country::class;
        $this->setModel($model);
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('name_en',function($query) {
                return $query->getTranslation('name','en');
            });

        return parent::dataTableRelations();
    }

    public function create()
    {
        return view($this->createView);
    }

    public function store(StoreCountryRequest $request)
    {
        $validated_data = $request->validated();
        $object = $this->model::create(['name' => $validated_data['name']]);
        $this->handleTranslations($request,$object);
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function show($id)
    {
        $country = $this->model::findOrFail($id);
        return view($this->showView, compact('country'));
    }

    public function edit($id)
    {
        $country = $this->model::findOrFail($id);
        return view($this->editView, compact('country'));
    }

    public function update(UpdateCountryRequest $request, $id)
    {

        $object = $this->model::find($id);
        $validated_data =$request->validated();
        $object->update($validated_data);
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

    public function getCitiesByCountry (Request $request) {
        $cities = $this->model::find($request->country_id)->cities;
        if (empty($cities->toArray()))
            return '';
        return view('admin.countries.select', compact('cities'));
    }
}
