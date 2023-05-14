<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component
{
    public $keys;
    public $ajaxRoute;
    public $tableName;
    public $createRoute;
    public $withOutCreate;
    /**
     * datatable constructor.
     * @param $model
     * @param bool $withOutCreate
     */
    public function __construct($model,$withOutCreate = false)
    {
        $this->keys = $model::getKeysForDataTable();
        $this->ajaxRoute = $model::getDataTableQueryRoute();
        $this->createRoute = $model::getCreateRoute();
        $this->tableName = $model::getTableName();
        $this->withOutCreate = $withOutCreate;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.Datatable');
    }
}
