<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasClearable;
use CupCode\FormBuilder\Traits\HasProperty;

class Select extends BaseComponent
{
    use
        HasProperty,
        HasClearable;
    protected string $type = 'v-combobox';


    public function options($items)
    {
        $this->props['items'] = array_map(function ($value, $key) {
            return ['key' => $key, 'value' => $value];
        }, $items->toArray(), array_keys($items->toArray()));
        $this->props['item-title'] = 'value';
        $this->props['item-value'] = 'key';
        $this->props['return-object'] = false;
        return $this;
    }

    public function multiple()
    {
        $this->props['multiple'] = true;
        return $this;
    }

    public function chips()
    {
        $this->props['chips'] = true;
        return $this;
    }

    public function returnObject()
    {
        $this->props['return-object'] = true;
        return $this;
    }
}
