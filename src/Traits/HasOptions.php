<?php

namespace CupCode\FormBuilder\Traits;

trait HasOptions
{
    public function options(array $options): static
    {
        $this->props['options'] = $options;
        return $this;
    }
}
