<?php

declare(strict_types=1);

namespace Parfaitementweb\FilamentPasswordInput;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class FilamentPasswordInputServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-password-input')
            ->hasTranslations();
    }
}
