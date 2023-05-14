<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Http\Requests\BloodType\StoreBloodTypeRequest;
use App\Http\Requests\BloodType\UpdateBloodTypeRequest;
use App\models\bloodType;
use Illuminate\Http\Request;

class BloodTypeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = bloodType::class;
        $this->setModel($model);
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function create()
    {
        return view($this->createView);
    }


    public function store(StoreBloodTypeRequest $request)
    {
        $validated_data = $request->validated();
        $this->model::create($validated_data);
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }


    public function show($id)
    {

        $type = $this->model::findOrFail($id);
        return view($this->showView, compact('type'));
    }


    public function edit($id)
    {
        $type = $this->model::findOrFail($id);
        return view($this->editView, compact('type'));
    }


    public function update(UpdateBloodTypeRequest $request, $id)
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
