<?php

namespace CupCode\FormBuilder\Traits;

trait HasClearable
{
    public function clearable(): static
    {
        $this->props['clearable'] = true;
        return $this;
    }
}
