<?php

declare(strict_types=1);

namespace Parfaitementweb\FilamentPasswordInput\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Parfaitementweb\FilamentPasswordInput\FilamentPasswordInputServiceProvider;

class TestCase extends Orchestra
{
    protected $enablesPackageDiscoveries = true;

    protected function getPackageProviders($app): array
    {
        return [
            FilamentPasswordInputServiceProvider::class,
        ];
    }
}
