<?php

namespace App\Http\Controllers\API;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementCollection;
use App\models\Advertisement;
use App\Http\Resources\Advertisement as AdvertisementResource;
use App\models\Favorite;
use App\models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::paginate(10);

        return new AdvertisementCollection($advertisements);
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return new AdvertisementResource($advertisement);
    }


    private function storeValidationRules()
    {
        return [
            'title' => 'required|max:200',
            'description' => 'required',
            'category_id' => 'required',
            'unique_id' => 'nullable',
            'location_id' => 'required',
            'location_type' => 'required',
            'type' => 'required|in:lost,found,need',
            'blood_type_id' => 'required_if:type,=,need|exists:blood_types,id',
            'user_id' => 'nullable|exists:users,id',
            'primary_image' => 'required|image'
        ];
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->storeValidationRules());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $validated_data = $validator->validated();
        $validated_data['user_id'] = auth()->id();
        DB::beginTransaction();
       $advertisement =  Advertisement::create($validated_data);

        if($request->hasFile('images'))
        {
            foreach ($request->images as $key => $image)
            {
                Image::handleUploadImage($advertisement,$image,'advertisements');
            }
        }
        if($request->hasFile('primary_image'))
        {
            Image::handleUploadImage($advertisement,$request->primary_image,'advertisements');
        }


        DB::commit();

        return new AdvertisementResource($advertisement);
    }


    private function updateValidationRules()
    {
        return [
            'title' => 'sometimes|max:200',
            'description' => 'sometimes',
            'category_id' => 'sometimes',
            'unique_id' => 'nullable',
            'type' => 'required|in:lost,found,need',
            'blood_type_id' => 'required_if:type,=,need|exists:blood_types,id',
            'location_id' => 'sometimes',
            'location_type' => 'sometimes',
            'primary_image' => 'sometimes|image'
        ];
    }

    public function update(Request $request,$id)
    {

        $validator = Validator::make($request->all(), $this->updateValidationRules());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }
        $advertisement = Advertisement::findOrFail($id);
        if(auth()->id() != $advertisement->user_id)
        {
            return apiHelper::failResponse('validation.not_owner');
        }

        $validated_data = $validator->validated();
        $advertisement->update($validated_data);

        if($request->hasFile('images'))
        {
            foreach ($request->images as $key => $image)
            {
                $primaryImage =   $key === array_key_first($request->images) ? true : false;
                Image::handleReplaceImage($advertisement,$image,'advertisements',$primaryImage);
            }
        }

        if($request->hasFile('primary_image'))
        {
            Image::handleUploadImage($advertisement,$request->primary_image,'advertisements');
        }
        return apiHelper::okResponse();

    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();
        return apiHelper::okResponse();
    }

    public function toggleFavorite($id)
    {

        $advertisement = Advertisement::findOrFail($id);
        $favoriteExist = $advertisement->favorite()->where('user_id',auth()->id())->count() ;

        if($favoriteExist > 0)
        {
            $advertisement->favorite()->where('user_id',auth()->id())->delete();
            return apiHelper::okResponse();
            //return "say hi";
        }
        else {
            Favorite::create([
                'favoritable_id' => $id,
                'favoritable_type' => 'App\models\Advertisement',
                'user_id' => auth()->id()
            ]);
            return apiHelper::okResponse();
            //return "say bey";
        }
    }
}
