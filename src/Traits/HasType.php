<?php

namespace CupCode\FormBuilder\Traits;

trait HasType
{
    public function type(string $type): static
    {
        $this->props['type'] = $type;
        return $this;
    }
}
