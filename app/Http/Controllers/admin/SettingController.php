<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Http\Controllers\admin\BaseController;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Setting::class;
        $this->setModel($model);
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('value_en',function($query) {
                return $query->getTranslation('value','en');
            });

        return parent::dataTableRelations();
    }

    public function create()
    {
        return view($this->createView);
    }

    public function store(StoreSettingRequest $request)
    {
        $validated_data = $request->validated();
        $this->model::create($validated_data);
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function show($id)
    {
        $setting = $this->model::findOrFail($id);
        return view($this->showView, compact('setting'));
    }

    public function edit($id)
    {
        $setting = $this->model::findOrFail($id);
        return view($this->editView, compact(['setting']));
    }

    public function update(UpdateSettingRequest $request, $id)
    {
        $object = $this->model::find($id);
        $update=$request->validated();
        $updated_instance = $object->update($update);
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

    public function changeLanguage(Request $request)
    {
        $request->validate([
            'lang' => 'required'
        ]);

        $lang = $request->lang;

        Setting::saveSettingByKey('layout_language',$lang);

        return redirect()->back();
    }
}
