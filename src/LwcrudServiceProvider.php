<?php

namespace Sitesurfer\Lwcrud;

use Sitesurfer\Lwcrud\Commands\LwcrudCommand;
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
}
