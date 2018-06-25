<?php

namespace Tests\Unit\Breadcrumbs;

use Tests\TestCase;
use App\Breadcrumbs\BreadcrumbsGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsManager;

class BreadcrumbsGeneratorTest extends TestCase
{
    public function test_resource()
    {
        BreadcrumbsGenerator::resource('app', 'App\User', 'email');

        $breadcrumbs = app()->make(BreadcrumbsManager::class);

        $this->assertTrue($breadcrumbs->exists('app.user.index'));
        $this->assertTrue($breadcrumbs->exists('app.user.create'));
        $this->assertTrue($breadcrumbs->exists('app.user.edit'));
        $this->assertTrue($breadcrumbs->exists('app.user.show'));
    }
}
