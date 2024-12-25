<?php

namespace CupCode\FormBuilder;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use CupCode\FormBuilder\Commands\FormBuilderCommand;

class FormBuilderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('formbuilder')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_formbuilder_table')
            ->hasCommand(FormBuilderCommand::class);
    }
}
