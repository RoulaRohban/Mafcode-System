<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->paginate(10);
        return new CategoryCollection($categories);
    }

    public function subcategories($id)
    {
        $category = Category::findOrFail($id);
        $subcategories = $category->subCategories;
        return new CategoryCollection($subcategories);
    }
}
