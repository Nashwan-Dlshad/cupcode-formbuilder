<?php

namespace CupCode\FormBuilder\Traits;

trait HasColor
{
    public function color(string $color): static
    {
        $this->props['color'] = $color;
        return $this;
    }
}
