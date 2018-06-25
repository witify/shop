<?php

/*
|--------------------------------------------------------------------------
| Dev
|--------------------------------------------------------------------------
|
*/

Breadcrumbs::register("dev.index", function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route("dev.index"));
});

Breadcrumbs::register("dev.user", function ($breadcrumbs) {
    $breadcrumbs->parent("dev.index");
    $breadcrumbs->push('Users', route("dev.user"));
});

Breadcrumbs::resource('dev', 'App\Page', 'title');

Breadcrumbs::register("dev.global.edit", function ($breadcrumbs) {
    $breadcrumbs->parent("dev.index");
    $breadcrumbs->push('Globals', route('dev.global.edit', 1));
});

Breadcrumbs::register("dev.account", function ($breadcrumbs) {
    $breadcrumbs->parent("dev.index");
    $breadcrumbs->push('Account', route("dev.account"));
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
*/

Breadcrumbs::register("admin.index", function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route("admin.index"));
});

Breadcrumbs::resource('admin', 'App\Page', 'title');

Breadcrumbs::register("admin.global.edit", function ($breadcrumbs) {
    $breadcrumbs->parent("admin.index");
    $breadcrumbs->push('Globals', route('admin.global.edit', 1));
});

Breadcrumbs::register("admin.account", function ($breadcrumbs) {
    $breadcrumbs->parent("admin.index");
    $breadcrumbs->push('Account', route("admin.account"));
});

/*
|--------------------------------------------------------------------------
| Client
|--------------------------------------------------------------------------
|
*/

Breadcrumbs::register("client.index", function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route("client.index"));
});

Breadcrumbs::register("client.account", function ($breadcrumbs) {
    $breadcrumbs->parent("client.index");
    $breadcrumbs->push('Account', route("client.account"));
});
