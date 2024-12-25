<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasColor;
use CupCode\FormBuilder\Traits\HasColspan;
use JsonSerializable;
use CupCode\FormBuilder\Traits\HasLabel;
use CupCode\FormBuilder\Traits\HasPlaceholder;
use CupCode\FormBuilder\Traits\HasDefaultValue;
use CupCode\FormBuilder\Traits\HasValidation;
use CupCode\FormBuilder\Traits\HasVisibility;
use CupCode\FormBuilder\Traits\HasCustomProperties;

class BaseComponent implements JsonSerializable
{
    use
        HasLabel,
        HasPlaceholder,
        HasDefaultValue,
        HasValidation,
        HasVisibility,
        HasColor,
        HasColspan;

    protected string $name;
    protected string $type;
    protected array $props = [];

    public static function make(string $name = ''): static
    {
        $instance = new static();
        $instance->name = $name;
        $instance->props['variant'] = 'outlined';
        $instance->props['color'] = 'primary';
        $instance->label(ucfirst(str_replace('_', ' ', $name)));
        return $instance;
    }

    public function variant(string $variant)
    {
        $this->props['variant'] = $variant;
        return $this;
    }
    public function jsonSerialize(): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'props' => $this->props,
        ];
    }
}
