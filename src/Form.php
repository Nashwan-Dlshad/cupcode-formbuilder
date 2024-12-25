<?php

namespace CupCode\FormBuilder;

use CupCode\FormBuilder\Components\Group;
use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

class Form implements JsonSerializable
{
    protected string $method = 'post';
    protected array $fields = [];
    protected string $action;
    protected string $actionLocation = 'bottom';
    protected array $actionButtons = [];
    protected array $state = [];
    protected int $columns = 1;
    protected string $stateName;

    /**
     * Create a new form instance.
     */
    public static function make(string $stateName = ''): self
    {
        $instance = new self();

        $instance->stateName = $stateName ?: 'form_' . uniqid();
        $instance->action = route(request()->route()->getName());
        $instance->actionButtons = [
            [
                'component' => 'v-btn',
                'props' => [
                    'text' => 'Create',
                    'color' => 'primary',
                    'type' => 'submit',
                ],
            ],
        ];

        return $instance;
    }

    /**
     * Set the HTTP method for the form.
     */
    public function method(string $method): self
    {
        $this->method = strtoupper($method);
        return $this;
    }

    /**
     * Set the schema (fields) for the form.
     */
    public function schema(array $fields): self
    {
        $this->fields = $fields;

        foreach ($fields as $field) {
            $this->assignFieldToState($field);
        }

        return $this;
    }

    /**
     * Set the action URL for the form.
     */
    public function action(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Dynamically set a state value.
     */
    public function state(string $path, $value): self
    {
        $keys = explode('.', $path);
        $array = &$this->state;

        foreach ($keys as $key) {
            if (!isset($array[$key])) {
                $array[$key] = [];
            }
            $array = &$array[$key];
        }

        $array = $value;
        return $this;
    }

    /**
     * Dynamically initialize fields in the state.
     */
    protected function assignFieldToState($field): void
    {
        $fieldName = $this->resolveFieldName($field);

        if ($field instanceof Group) {
            foreach ($field->getSchema() as $nestedField) {
                $this->assignFieldToState($nestedField);
            }
        } elseif (strpos($fieldName, '.') !== false) {
            $this->state($fieldName, null);
        } else {
            $this->state[$fieldName] = null;
        }
    }

    /**
     * Resolve field name dynamically.
     */
    protected function resolveFieldName($field): string
    {

        if (is_object($field) && method_exists($field, 'getProperty')) {
            return $field->getProperty('name');
        }

        if (is_array($field) && isset($field['name'])) {
            return $field['name'];
        }

        throw new \InvalidArgumentException('Invalid field format.');
    }

    /**
     * Retrieve a value from the state.
     */
    public function getState(string $path)
    {
        $keys = explode('.', $path);
        $array = $this->state;

        foreach ($keys as $key) {
            if (!isset($array[$key])) {
                return null;
            }
            $array = $array[$key];
        }

        return $array;
    }

    /**
     * Set the number of columns for the form layout.
     */
    public function cols(int $cols): self
    {
        $this->columns = $cols;
        return $this;
    }

    /**
     * Serialize the form to JSON.
     */
    public function jsonSerialize(): array
    {
        return [
            'props' => [
                'action' => $this->action,
                'method' => $this->method,
            ],
            'columns' => $this->columns,
            'fields' => $this->fields,
            'state' => $this->state,
            'state_name' => $this->stateName,
            'action_location' => $this->actionLocation,
            'action_buttons' => $this->actionButtons,
        ];
    }

    /**
     * Get the current state array.
     */
    public function getStateArray(): array
    {
        return $this->state;
    }

    /**
     * Get the form state name.
     */
    public function getStateName(): string
    {
        return $this->stateName;
    }
}
