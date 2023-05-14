<?php

namespace App\Http\Controllers\admin;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $model = Category::class;
        $this->setModel($model);
    }

    public function dataTableRelations()
    {
        $this->eloquentDataTable
            ->addColumn('parent',function($query) {
                return $query->parent->name ?? '';
            })->addColumn('name_en',function($query) {
                return $query->getTranslation('name','en');
            });

        return parent::dataTableRelations();
    }

    public function index()
    {
        return view($this->indexView, ['model' => $this->model]);
    }

    public function getDataTableQuery()
    {
        $parent_id = request()->has('parent_id') && request()->parent_id ? request()->parent_id : null;
        return $this->model::query()->where('parent_id', $parent_id);
    }

    public function dataTableActions()
    {
        $this->eloquentDataTable->addColumn('subcategory_url',function($query) {
                return route('admin.categories.index', ['parent_id' => $query->id]);
            });
        return parent::dataTableActions(); // TODO: Change the autogenerated stub
    }

    public function create()
    {
        $categories = Category::all();
        return view($this->createView, compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated_data = $request->validated();
        $object = $this->model::create($validated_data);
        $this->handleTranslations($request,$object);
        return $this->redirectToIndexWithSuccess($this->successCreateMessage);
    }

    public function show($id)
    {
        $category = $this->model::findOrFail($id);
        return view($this->showView, compact('category'));
    }

    public function edit($id)
    {
        $category = $this->model::findOrFail($id);
        $categories = Category::where('id','!=', $category->id)->get();
        return view($this->editView, compact('category', 'categories'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $object = $this->model::find($id);
        $update = $request->validated();
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
