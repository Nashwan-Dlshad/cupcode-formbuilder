<?php

namespace CupCode\FormBuilder\Traits;

trait HasDefaultValue
{
    public function defaultValue(string|int|bool|null $value): static
    {
        $this->props['defaultValue'] = $value;
        return $this;
    }
}
