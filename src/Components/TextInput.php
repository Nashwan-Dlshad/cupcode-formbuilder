<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasClearable;
use CupCode\FormBuilder\Traits\HasProperty;

class TextInput extends BaseComponent
{
    use
        HasProperty,
        HasClearable;

    protected string $type = 'v-text-field';

    public function numeric()
    {
        $this->type = 'v-number-input';
        $this->props['controlVariant'] = 'split';
        return $this;
    }


    public function controlVariant(string $controlVariant)
    {
        $this->props['controlVariant'] = $controlVariant;
        return $this;
    }
}
