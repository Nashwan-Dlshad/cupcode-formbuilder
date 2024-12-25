<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasClearable;
use CupCode\FormBuilder\Traits\HasProperty;

class Textarea extends BaseComponent
{
    use
        HasProperty,
        HasClearable;

    protected string $type = 'v-textarea';
}
