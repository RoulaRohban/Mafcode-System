<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Helpers\Helper;
use App\Http\Requests\Slider\StoreSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\models\Image;
use App\models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Slider::class;
        $this->setModel($model);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('caption_en', function ($query) {
                return $query->getTranslation('caption', 'en');
            });

        return parent::dataTableRelations();
    }

    public function index()
    {
        return view($this->indexView, ['model' => $this->model]);
    }

    public function create()
    {
        return view($this->createView);
    }

    public function store(StoreSliderRequest $request)
    {
        $validated_data = $request->validated();
        DB::beginTransaction();
        $object = $this->model::create(Arr::except($validated_data, ['image']));
        $this->handleTranslations($request, $object);
        if ($request->hasFile('image')) {
            $image_data = Helper::uploadFileTo($validated_data["image"], 'sliders');
            $image = Image::create([
                'image_path' => $image_data["media_path"],
                'is_primary' => 'yes'
            ]);
            $object->image()->save($image);
        }
        DB::commit();
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function show($id)
    {
        $slider = $this->model::findOrFail($id);
        return view($this->showView, compact('slider'));
    }

    public function edit($id)
    {
        $slider = $this->model::findOrFail($id);
        return view($this->editView, compact('slider'));
    }

    public function update(UpdateSliderRequest $request, $id)
    {
        $validated_data = $request->validated();
        DB::beginTransaction();
        $object = $this->model::find($id);
        $this->handleTranslations($request, $object);
        if ($request->hasFile('image')) {

            $image_data = Helper::uploadFileTo($validated_data["image"], 'sliders');
            $image = Image::create([
                'image_path' => $image_data["media_path"],
                'is_primary' => 'yes'
            ]);
            if ($object->image()->count()) {
                Helper::deleteFile($object->image->image_path);
                $object->image()->delete();
            }
            $object->image()->save($image);
        }
        $object->update($validated_data);
        DB::commit();
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
