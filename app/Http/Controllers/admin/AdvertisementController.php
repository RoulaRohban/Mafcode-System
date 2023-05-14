<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Helpers\Helper;
use App\Http\Requests\Advertisement\StoreAdvertisementRequest;
use App\Http\Requests\Advertisement\UpdateAdvertisementRequest;
use App\models\Advertisement;
use App\models\Category;
use App\models\City;
use App\models\Country;
use App\models\Image;
use App\models\Region;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\Translatable;

class AdvertisementController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Advertisement::class;
        $this->setModel($model);
    }
    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('user',function($query) {
                return $query->user->email ?? '';
            })->addColumn('category',function($query) {
                return $query->category->name ?? '';
            })->addColumn('title_en',function($query) {
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
        $users=User::all();
        $categories=Category::all();
        $countries=Country::all();
        $cities=City::all();
        $regions=Region::all();
        return view($this->createView,compact(['users','categories','countries','cities','regions']));
    }

    public function store(StoreAdvertisementRequest $request)
    {
        $validated_data = $request->validated();
        //dd(Arr::except($validated_data, [$validated_data['image']]));
        DB::beginTransaction();

        $object = $this->model::create(Arr::except($validated_data, ['image']));
        $object->setLocation($request);
        $this->handleTranslations($request,$object);
        $object->setPrimaryImage($request);
        DB::commit();
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function getImages ($id) {
        $images = $this->model::find($id)->images()->orderBy('is_primary', 'desc')->get();
        return view('admin.images.gallery', compact('images'));
    }

    public function setImages (Request $request,$id) {
        $object = $this->model::find($id);
        foreach ($request->images as $image) {
            $image_data = Helper::uploadFileTo($image, 'advertisements');
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
        $advertisement = $this->model::findOrFail($id);
        return view($this->showView, compact('advertisement'));
    }

    public function edit($id)
    {
        $users=User::all();
        $categories=Category::all();
        $countries=Country::all();
        $cities=City::all();
        $regions=Region::all();
        $advertisement = $this->model::findOrFail($id);
        return view($this->editView,compact(['users','categories','countries','cities','regions','advertisement']));
    }

    public function update(UpdateAdvertisementRequest $request, $id)
    {
        $object = $this->model::find($id);
        $update = $request->validated();
        DB::beginTransaction();
        if ($request->has('region_id') && $request->region_id) {
            $update['location_type'] = 'region';
            $update['location_id'] = $request->region_id;
        } elseif ($request->has('city_id') && $request->city_id) {
            $update['location_type'] = 'city';
            $update['location_id'] = $request->city_id;
        } elseif ($request->has('country_id') && $request->country_id) {
            $update['location_type'] = 'country';
            $update['location_id'] = $request->country_id;
        }
        if ($request->hasFile('image')) {

            if ($object->primaryImage()) {
                Helper::deleteFile($object->primaryImage()->image_path);
                $object->primaryImage()->delete();
            }
            $image_data = Helper::uploadFileTo($update["image"], 'users');
            $image = Image::create([
                'image_path' => $image_data["media_path"],
                'is_primary' => 'yes'
            ]);
            $object->images()->save($image);
        }
        $updated_instance = $object->update(Arr::except($update, ['image']));
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
