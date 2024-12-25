<?php

namespace CupCode\FormBuilder\Traits;

trait HasVisibility
{
    public function hidden(bool $hidden = true): static
    {
        $this->props['hidden'] = $hidden;
        return $this;
    }
}
