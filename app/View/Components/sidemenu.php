<?php

namespace App\View\Components;

use App\Helpers\Helper;
use Illuminate\View\Component;

class sidemenu extends Component
{
    public $modelsLinks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $models = Helper::getModels();
        foreach ($models as $model)
        {
            if(!isset($model::$menuable) || $model::$menuable)
            {
                $menuObject = [
                    'title' => $model::getTableName(),
                    'icon'  => '',
                    'index' => $model::getIndexRoute(),
                    'create' => $model::getCreateRoute(),
                ];
                $this->modelsLinks[] = $menuObject;
            }


        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidemenu');
    }
}
