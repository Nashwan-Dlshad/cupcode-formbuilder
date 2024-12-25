<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasClearable;
use CupCode\FormBuilder\Traits\HasProperty;

class ToggleInput extends BaseComponent
{
    use
        HasProperty,
        HasClearable;

    protected string $type = 'v-switch';

    public function inset()
    {
        $this->props['inset'] = true;
        return $this;
    }
}
