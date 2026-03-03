<?php

namespace Ekosuprianto96\VisualMigrator\Tests\Feature;

use Orchestra\Testbench\TestCase;
use Ekosuprianto96\VisualMigrator\VisualMigratorServiceProvider;
use Illuminate\Support\Facades\File;

class DashboardTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [VisualMigratorServiceProvider::class];
    }

    protected function defineEnvironment($app)
    {
        // Force environment to local so routes are loaded
        $app['env'] = 'local';
    }

    /** @test */
    public function it_can_access_the_schema_api()
    {
        // Ensure migrations directory exists
        if (!File::isDirectory(database_path('migrations'))) {
            File::makeDirectory(database_path('migrations'), 0755, true);
        }

        $response = $this->get('visual-migrator/api/schema');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'databases',
            'activeDatabaseId',
            'collections',
            'edges'
        ]);
    }

    /** @test */
    public function it_can_access_the_dashboard_index()
    {
        $response = $this->get('visual-migrator');

        $response->assertStatus(200);
        $response->assertSee('Visual Migrator');
    }
}
