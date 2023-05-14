<?php

namespace App\Http\Controllers\API;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\models\Favorite;
use App\models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return new ProductCollection($products);
    }

    public function toggleFavorite($id)
    {
        $product=Product::findOrFail($id);
        $favoriteExist=$product->favorite()->where('user_id',auth()->id())->count() ;
        if($favoriteExist > 0)
        {
            $product->favorite()->where('user_id',auth()->id())->delete();
           return apiHelper::okResponse();
           //return "say hi";
        }
        else {
            Favorite::create([
                'favoritable_id' => $id,
                'favoritable_type' => 'App\models\Product',
                'user_id' => auth()->id()
            ]);
            return apiHelper::okResponse();
            //return "say bey";
        }
    }
}
