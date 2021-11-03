<?php

namespace Sitesurfer\Lwcrud;

use Illuminate\Support\Facades\Blade;
use Sitesurfer\Lwcrud\Commands\LwcrudCommand;
use Sitesurfer\Lwcrud\Components\DeleteButton;
use Sitesurfer\Lwcrud\Components\EditButton;
use Sitesurfer\Lwcrud\Components\LwPager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LwcrudServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lwcrud')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lwcrud_table')
            ->hasCommand(LwcrudCommand::class);
    }

    public function packageBooted()
    {
        Blade::componentNamespace('Sitesurfer\Lwcrud\Components', 'lwcrud');
        ///Blade::component('lw-container',LwContainerComponent::class );
        //Blade::component('lwcrud',DeleteButton::class);
        //Blade::component('lwcrud',EditButton::class);
        //Blade::component('lwcrud',LwPager::class);
        //Blade::component('lwinput-field', 'support-bubble::components.lwinput-field', 'support-bubble');
    }
}
