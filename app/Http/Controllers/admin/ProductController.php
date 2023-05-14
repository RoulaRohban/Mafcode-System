<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\models\Image;
use App\models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Product::class;
        $this->setModel($model);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
             ->addColumn('name_en',function($query) {
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
        return view($this->createView);
    }

    public function store(StoreProductRequest $request)
    {
        $validated_data = $request->validated();
        //dd(Arr::except($validated_data, [$validated_data['image']]));
        DB::beginTransaction();
        $object = $this->model::create(Arr::except($validated_data, ['image']));
        if($request->hasFile('image')) {
            $image_data = Helper::uploadFileTo($validated_data["image"], 'products');
            $image = Image::create([
                'image_path' => $image_data["media_path"],
                'is_primary' => 'yes'
            ]);
            $object->images()->save($image);
        }
        $this->handleTranslations($request,$object);
        DB::commit();
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function getImages ($id) {
        $images = Product::find($id)->images()->orderBy('is_primary', 'desc')->get();
        return view('admin.images.gallery', compact('images'));
    }

    public function setImages (Request $request,$id) {
        $object = $this->model::find($id);
        foreach ($request->images as $image) {
            $image_data = Helper::uploadFileTo($image, 'products');
            Log::error($image_data);
            $image = Image::create([
                'image_path' => $image_data["media_path"],
                'is_primary' => 'yes'
            ]);
            $object->images()->save($image);
        }
    }

    public function show($id)
    {

        $product = $this->model::findOrFail($id);
        return view($this->showView, compact('product'));
    }

    public function edit($id)
    {
        $product = $this->model::findOrFail($id);
        return view($this->editView, compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
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
}
