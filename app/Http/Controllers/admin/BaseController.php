<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
abstract class BaseController extends Controller
{

    protected $model;
    protected $successCreateMessage;
    protected $successUpdateMessage;
    protected $successDeleteMessage;
    protected $successActionMessage;
    protected $failCreateMessage;
    protected $failUpdateMessage;
    protected $failDeleteMessage;
    protected $failActionMessage;
    protected $indexView;
    protected $createView;
    protected $showView;
    protected $editView;
    protected $indexRoute;
    protected $eloquentDataTable;



    public function __construct()
    {
        $this->successCreateMessage = trans('admin.created_successfully');
        $this->successDeleteMessage = trans('admin.deleted_successfully');
        $this->successUpdateMessage = trans('admin.updated_successfully');
        $this->successActionMessage = trans('admin.done_successfully');

        $this->failActionMessage = trans('admin.operation_fail');
        $this->failCreateMessage = trans('admin.fail_while_create');
        $this->failUpdateMessage = trans('admin.fail_while_update');
        $this->failDeleteMessage = trans('admin.fail_while_delete');
    }
    public function setModel($model)
    {

        $this->model = $model;
        $this->indexRoute = $model::getIndexRoute();
        $this->createView = $model::getCreateString();
        $this->editView = $model::getEditString();
        $this->indexView = $model::getIndexString();
        $this->showView = $model::getShowString();
    }

    public function setDynamicProperties(Array $properties)
    {
        foreach ($properties as $key => $val)
        {
            $this->$key = $val;
        }
    }

    public function successRedirectTo($route,$message)
    {
        return redirect()->route($route)->with('success',$message);
    }

    public function FailRedirectTo($route,$message)
    {
        return redirect()->route($route)->with('error', $message);
    }

    public function redirectToIndexWithSuccess($message)
    {

        return redirect()->route($this->indexView)->with('success',$message);
    }

    public function redirectToIndexWithError($message)
    {

        return redirect()->route($this->indexView)->with('error',$message);
    }

    public function getDataTableQuery()
    {
        return $this->model::query();
    }

    public function dataTableQuery()
    {

        $objects = $this->getDataTableQuery();


        $this->eloquentDataTable = datatables()->of($objects);

        return $this->dataTableBasicActions()
            ->dataTableActions()
            ->dataTableRelations()
            ->getDataTableEloquent()
            ->toJson();
    }

    private function getDataTableEloquent()
    {
        return $this->eloquentDataTable;
    }

    public function dataTableBasicActions()
    {

         $this->eloquentDataTable
            ->addColumn('edit_url', function($query) {
                return $query->getEditRoute();
            })->addColumn('delete_url', function($query) {
                return $query->getDestroyRoute();
            });

         return $this;
    }

    public function dataTableActions()
    {
        return $this;
    }

    public function dataTableRelations()
    {
        return $this;
    }

    public function handleTranslations($request,$object)
    {
        if(!$request->has('translations'))
        {
            return;
        }

        foreach ($request->translations as $key => $values)
        {
            foreach ($values as $valueKey => $valueArray)
            {
                $value = $valueArray['value'];
                $local = $valueArray['local'];
                $object->setTranslation($key,$value,$local);
            }

        }
    }


}
