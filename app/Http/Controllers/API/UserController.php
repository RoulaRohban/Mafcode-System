<?php

namespace App\Http\Controllers\API;

use App\Helpers\apiHelper;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\User as UserResource;
use App\models\Image;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    private function RegisterValidations()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'first_name' => 'required|string|max:200',
            'last_name' => 'required|string|max:200',
            'phone' => 'required|string|unique:users,phone|max:10',
            'password' => 'required|confirmed',
            'blood_type_id' => 'nullable|exists:blood_types,id',
            'location_id' => 'required',
            'location_type' => 'required|in:country,city,region'

        ];
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), $this->RegisterValidations());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $validated_data = $validator->validated();
        $validated_data["password"] = Hash::make($validated_data["password"]);
        $validated_data["active"] = "no";
        DB::beginTransaction();
        $user = User::create($validated_data);
        $user->generateActivationCode()->save();
        if($request->hasFile('image')) {

            Image::handleUploadImage($user,$request->image,'users',true);
        }


        DB::commit();
        $responseData = $user->toArray();
        $tokenResult = $user->createToken('mafcode_application')->plainTextToken;
        $responseData = Arr::add($responseData,'token',$tokenResult);
        unset($responseData["image"]);

        return apiHelper::okResponse($responseData);
    }

    private function LoginValidations()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), $this->LoginValidations());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }

            $user = User::where(['username' => $request->username])->first();
            if($user && Hash::check($request->password, $user->password))
            {
                if($user->active == "yes")
                {
                    $user->activateSession()->update();

                    $responseData = $user->toArray();
                    $tokenResult = $user->createToken('mafcode_application')->plainTextToken;
                    $responseData = Arr::add($responseData,'token',$tokenResult);

                    return apiHelper::okResponse($responseData);
                }


                return apiHelper::failResponse(trans('admin.account_not_active'));
            }
            return apiHelper::failResponse(trans('admin.invalid_username_or_password'));

    }

    public function activateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'activation_code' => 'required'
        ]);

        if ($validator->fails()) {
            Log::error($validator->errors());
            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $user = User::where('email',$request->email)->first();
        if($user->checkActivationCode($request->activation_code))
        {
            $user->acivate()->save();
            return apiHelper::okResponse();
        }

        return apiHelper::failResponse(trans('admin.code_not_correct'));
    }



    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            Log::error($validator->errors());
            return apiHelper::failResponse($validator->errors()->getMessages());
        }


            $validated_data = $validator->validated();
            $user = User::where('email',$validated_data["email"])->first();
            $user->generatePasswordToken()->save();
            return apiHelper::okResponse();

    }


    public function checkPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'reset_code'  => 'required',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            Log::error($validator->errors());
            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $validated_data = $validator->validated();

            $user = User::where('email',$validated_data["email"])->first();
            $checkCode = $user->checkPasswordCode($validated_data["reset_code"]);
            if($checkCode)
            {
                $user->reset_verified = "yes";
                $user->reset_token = null;
                $password_changed = $user->changePassword($validated_data["password"]);
                if($password_changed)
                    return apiHelper::okResponse();

                return apiHelper::failResponse(trans('admin.password_not_reset'));


            }


            return apiHelper::failResponse(trans('admin.code_not_valid'));


    }


    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password'  => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            Log::error($validator->errors());
            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $validated_data = $validator->validated();

            $user = User::where('email',$validated_data["email"])->first();
            $password_changed = $user->changePassword($validated_data["password"]);
            if($password_changed)
                return apiHelper::okResponse();

            return apiHelper::failResponse(trans('admin.reset_password_not_verified'));


    }

    private function updateProfileValidation()
    {
        return [
            'email' => 'sometimes|email|unique:users,email',
            'username' => 'sometimes|string|unique:users,username',
            'first_name' => 'sometimes|string|max:200',
            'last_name' => 'sometimes|string|max:200',
            'phone' => 'sometimes|string|unique:users,phone|max:10',
            'blood_type_id' => 'nullable|exists:blood_types,id',
            'location_id' => 'sometimes',
            'location_type' => 'sometimes|in:country,city,region'

        ];
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), $this->updateProfileValidation());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $validated_data = $validator->validated();

        $user = auth()->user();
        $user->update($validated_data);
        $responseData = $user->toArray();

        if($request->hasFile('image'))
        {
            Image::handleReplaceImage($user,$request->image,'users',true);
        }

        return new UserResource($user);
    }

    public function advertisements()
    {
        $advertisements = auth()->user()->advertisements()->paginate(10);
        return new AdvertisementCollection($advertisements);
    }

    public function productFavorite()
    {
        $user = auth()->user();
        $products = $user->getFavoriteProducts();
        return new ProductCollection($products);
    }

    public function advertisementFavorite()
    {
        $user = auth()->user();
        $advertisements = $user->getFavoriteAdvertisements();
        return new AdvertisementCollection($advertisements);
    }

    public function updateFirebaseToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firebase_token' => 'required'
        ]);
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $user = auth()->user();
        $user->setFirebaseToken($request->firebase_token)->save();
        return apiHelper::okResponse();
    }
}
