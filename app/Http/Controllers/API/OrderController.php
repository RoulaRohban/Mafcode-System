<?php

namespace App\Http\Controllers\API;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\models\Order;
use App\Http\Resources\Order as OrderResource;
use App\models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::findOrFail($id);
        if($order->user_id != auth()->id())
            return apiHelper::failResponse('not_owner');

        return new OrderResource($order);
    }


    private function storeOrderValidation()
    {
        return [
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity'  => 'required|numeric|max:50',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,hold,processing,complete,refund,reject',
        ];
        //TODO check product quantity stock availability
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->storeOrderValidation());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }

        $validated_data = $validator->validated();
        $order = Order::create($validated_data);

        foreach ($validated_data["products"] as $product)
        {
            $orderDetail = OrderDetails::create([
                'product_id' => $product["product_id"],
                'quantity' => $product["quantity"],
            ]);

            $order->orderDetails()->attach($orderDetail);
        }

        return apiHelper::okResponse();
    }

    private function updateOrderValidation()
    {
        return [
            'products' => 'sometimes|array',
            'products.*.product_id' => 'sometimes|exists:products,id',
            'products.*.quantity'  => 'sometimes|numeric|max:50',
            'user_id' => 'sometimes|required|exists:users,id',
            'status' => 'sometimes|required|in:pending,hold,processing,complete,refund,reject',
        ];
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), $this->updateOrderValidation());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return apiHelper::failResponse($validator->errors()->getMessages());
        }
        $validated_data = $validator->validated();
        $order = Order::findOrFail($id);
        $order->update($validated_data);
        return apiHelper::okResponse();
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return apiHelper::okResponse();
    }


}
