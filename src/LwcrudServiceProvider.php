<?php

namespace Sitesurfer\Lwcrud;

use App\View\Components\DeleteButton;
use App\View\Components\EditButton;
use App\View\Components\SearchTop;
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
            ->hasViewComponents('lwcrud',[SearchTop::class,DeleteButton::class,EditButton::class])
            ->hasMigration('create_lwcrud_table')
            ->hasCommand(LwcrudCommand::class);
    }

}
