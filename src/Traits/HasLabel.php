<?php

namespace CupCode\FormBuilder\Traits;

trait HasLabel
{
    public function label(string $label): static
    {
        $this->props['label'] = $label;
        return $this;
    }
}
