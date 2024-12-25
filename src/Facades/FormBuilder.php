<?php

namespace CupCode\FormBuilder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CupCode\FormBuilder\FormBuilder
 */
class FormBuilder extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CupCode\FormBuilder\FormBuilder::class;
    }
}
