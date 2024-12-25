<?php

namespace CupCode\FormBuilder\Components;

use CupCode\FormBuilder\Traits\HasClearable;
use CupCode\FormBuilder\Traits\HasProperty;

class Group extends BaseComponent
{
    use HasProperty, HasClearable;

    protected string $type = 'v-list';

    protected array $fields = [];

    /**
     * Define the schema for the group.
     */
    public function schema(array $fields): self
    {
        $this->props['columns'] = 1;
        $this->fields = $fields;
        return $this;
    }

    /**
     * Retrieve the group's schema.
     */
    public function getSchema(): array
    {
        return $this->fields;
    }

    public function cols(string | int $cols)
    {
        $this->props['columns'] = $cols;
        return $this;
    }

    /**
     * Serialize the group to JSON.
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'type' => $this->type,
            'fields' => $this->fields,
        ]);
    }
}
