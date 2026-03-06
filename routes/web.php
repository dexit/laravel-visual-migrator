<?php

use Illuminate\Support\Facades\Route;
use Ekosuprianto96\VisualMigrator\Http\Controllers\MigratorController;

Route::get('/', function() {
    return redirect('/visual-migrator');
});

Route::group(['prefix' => 'visual-migrator'], function () {
    Route::get('/', [MigratorController::class, 'index'])->name('visual-migrator.index');
    Route::get('/schema', [MigratorController::class, 'getSchema']);
    Route::post('/sync', [MigratorController::class, 'syncSchema']);
    Route::post('/save-layout', [MigratorController::class, 'saveLayout']);
    Route::get('/live-db/{databaseId}', [MigratorController::class, 'getLiveDbSchema']);
});
