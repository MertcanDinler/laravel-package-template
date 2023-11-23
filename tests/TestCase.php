<?php

declare(strict_types=1);

namespace Wezzomart\Core\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Wezzomart\Core\SkeletonServiceProvider;

use function class_basename;
use function config;

final class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Wezzomart\\Core\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            SkeletonServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_core_table.php.stub';
        $migration->up();
        */
    }
}
