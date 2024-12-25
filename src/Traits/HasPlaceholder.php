<?php

namespace CupCode\FormBuilder\Traits;

trait HasPlaceholder
{
    public function placeholder(string $placeholder): static
    {
        $this->props['placeholder'] = $placeholder;
        return $this;
    }
}
