<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{

    public $tableName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->tableName = $model::getTableName();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.Breadcrumb');
    }
}
