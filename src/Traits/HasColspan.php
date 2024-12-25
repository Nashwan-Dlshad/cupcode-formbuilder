<?php

namespace CupCode\FormBuilder\Traits;

trait HasColspan
{
    public function colspan(string | int $colspan): static
    {
        $this->props['colspan'] = $colspan;
        return $this;
    }
}
