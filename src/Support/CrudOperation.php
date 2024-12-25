<?php

namespace CupCode\FormBuilder\Support;

use Illuminate\Database\Eloquent\Model;

class CrudOpertaion
{

    public function create(Model $model)
    {
        $request = request();
        dd($request);
    }
}
