<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\models\bloodType;
use App\models\Country;
use App\models\Image;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = User::class;
        $this->setModel($model);
    }

    public function index()
    {
        return view($this->indexView,['model' => $this->model]);
    }

    public function create()
    {
        $blood_types= bloodType::all();
        $countries = Country::all();
        return view($this->createView,compact(['blood_types', 'countries']));
    }

    public function store(StoreUserRequest $request)
    {
        $validated_data = $request->validated();
        $password = bcrypt($request->password);
        $validated_data['password'] = $password;
        if ($request->has('region_id') && $request->region_id) {
            $validated_data['location_type'] = 'region';
            $validated_data['location_id'] = $request->region_id;
        } elseif ($request->has('city_id') && $request->city_id) {
            $validated_data['location_type'] = 'city';
            $validated_data['location_id'] = $request->city_id;
        } elseif ($request->has('country_id') && $request->country_id) {
            $validated_data['location_type'] = 'country';
            $validated_data['location_id'] = $request->country_id;
        }
        DB::beginTransaction();
        $object = $this->model::create(Arr::except($validated_data, ['image']));
        if($request->hasFile('image')) {
            $image_data = Helper::uploadFileTo($validated_data["image"], 'users');
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

        $user = $this->model::findOrFail($id);
        return view($this->showView, compact('user'));
    }

    public function edit($id)
    {
        $user = $this->model::findOrFail($id);
        $blood_types = bloodType::all();
        $countries = Country::all();
        return view($this->editView, compact(['user','blood_types', 'countries']));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $update = $request->validated();
        $object = $this->model::find($id);
        if ($request->hasFile('image')) {

            $image_data = Helper::uploadFileTo($update["image"], 'users');
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
        if ($request->has('password') && $request->password) {
            $password = bcrypt($request->password);
            $update['password'] = $password;
        } else {
            unset($update['password']);
        }
        $updated_instance = $object->update(Arr::except($update, ['image']));
        return $this->redirectToIndexWithSuccess($this->successUpdateMessage);

    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $deleted = $this->model::findOrFail($id)->delete();
            if ($deleted) {
                return response()->json(['status' => 'success', 'message' => 'deleted_successfully']);
            } else {
                return response()->json(['status' => 'fail', 'message' => 'fail_while_delete']);
            }




        }

        return redirect()->route($this->index_route);
    }
}
