<?php

namespace CupCode\FormBuilder\Traits;

trait HasValidation
{
    public function required(bool $required = true): static
    {
        $this->props['required'] = $required;
        return $this;
    }

    public function disabled(bool $disabled = true): static
    {
        $this->props['disabled'] = $disabled;
        return $this;
    }
}
