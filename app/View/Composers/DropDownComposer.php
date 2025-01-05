<?php

namespace App\View\Composers;

use App\Repositories\DataRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DropDownComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        protected DataRepository $data,
         protected Request $request
    ) {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('dropdownData', $this->data->getDropDownData($this->request));
    }
}
