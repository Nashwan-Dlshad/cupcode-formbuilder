<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasClearable;
use CupCode\FormBuilder\Traits\HasProperty;

class RadioInput extends BaseComponent
{
    use
        HasProperty,
        HasClearable;

    protected string $type = 'v-radio';
}
