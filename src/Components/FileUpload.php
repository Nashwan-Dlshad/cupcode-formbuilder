<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasClearable;
use CupCode\FormBuilder\Traits\HasProperty;

class FileUpload extends BaseComponent
{
    use
        HasProperty,
        HasClearable;

    protected string $type = 'FileUpload';

    public function imageEditor()
    {
        $this->props['imageEditor'] = true;
        return $this;
    }

    public function multiple()
    {
        $this->props['multiple'] = true;
        return $this;
    }

    public function accept($accept)
    {
        $this->props['accept'] = $accept;
        return $this;
    }
}
