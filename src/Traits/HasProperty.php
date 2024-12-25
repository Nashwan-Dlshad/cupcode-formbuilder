<?php

namespace CupCode\FormBuilder\Traits;

use CupCode\FormBuilder\Components\BaseComponent;

trait HasProperty
{
    /**
     * Retrieve a property value or resolve it dynamically.
     *
     * @param string $property
     * @return mixed|null
     */
    public function getProperty(string $property)
    {
        // Check if the property exists in this object
        if (property_exists($this, $property)) {
            return $this->{$property};
        }

        // Check if the property exists in the parent BaseComponent class
        if (is_subclass_of($this, BaseComponent::class)) {
            $baseProps = get_class_vars(BaseComponent::class);
            if (array_key_exists($property, $baseProps)) {
                return $baseProps[$property];
            }
        }

        // Check if the property is accessible through a method
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        // Fallback to null if no match is found
        return null;
    }
}
