<?php

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/sprints', [App\Http\Controllers\Admin\SprintController::class, 'index'])->name('sprints.index');
    Route::get('admin/sprints/api', [App\Http\Controllers\Admin\SprintController::class, 'api'])->name('sprints.api');
    Route::get('admin/sprints/create', [App\Http\Controllers\Admin\SprintController::class, 'create'])->name('sprints.create');
    Route::post('admin/sprints', [App\Http\Controllers\Admin\SprintController::class, 'store'])->name('sprints.store');
    Route::get('admin/sprints/{model}', [App\Http\Controllers\Admin\SprintController::class, 'show'])->name('sprints.show');
    Route::get('admin/sprints/{model}/edit', [App\Http\Controllers\Admin\SprintController::class, 'edit'])->name('sprints.edit');
    Route::post('admin/sprints/{model}', [App\Http\Controllers\Admin\SprintController::class, 'update'])->name('sprints.update');
    Route::delete('admin/sprints/{model}', [App\Http\Controllers\Admin\SprintController::class, 'destroy'])->name('sprints.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/issues', [App\Http\Controllers\Admin\IssueController::class, 'index'])->name('issues.index');
    Route::get('admin/issues/api', [App\Http\Controllers\Admin\IssueController::class, 'api'])->name('issues.api');
    Route::get('admin/issues/create', [App\Http\Controllers\Admin\IssueController::class, 'create'])->name('issues.create');
    Route::post('admin/issues', [App\Http\Controllers\Admin\IssueController::class, 'store'])->name('issues.store');
    Route::get('admin/issues/{model}', [App\Http\Controllers\Admin\IssueController::class, 'show'])->name('issues.show');
    Route::get('admin/issues/{model}/edit', [App\Http\Controllers\Admin\IssueController::class, 'edit'])->name('issues.edit');
    Route::post('admin/issues/{model}', [App\Http\Controllers\Admin\IssueController::class, 'update'])->name('issues.update');
    Route::delete('admin/issues/{model}', [App\Http\Controllers\Admin\IssueController::class, 'destroy'])->name('issues.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/issues-user-logs', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'index'])->name('issues-user-logs.index');
    Route::get('admin/issues-user-logs/api', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'api'])->name('issues-user-logs.api');
    Route::get('admin/issues-user-logs/create', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'create'])->name('issues-user-logs.create');
    Route::post('admin/issues-user-logs', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'store'])->name('issues-user-logs.store');
    Route::get('admin/issues-user-logs/{model}', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'show'])->name('issues-user-logs.show');
    Route::get('admin/issues-user-logs/{model}/edit', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'edit'])->name('issues-user-logs.edit');
    Route::post('admin/issues-user-logs/{model}', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'update'])->name('issues-user-logs.update');
    Route::delete('admin/issues-user-logs/{model}', [App\Http\Controllers\Admin\IssuesUserLogController::class, 'destroy'])->name('issues-user-logs.destroy');
});
