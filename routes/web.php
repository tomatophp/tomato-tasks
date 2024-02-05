<?php

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/sprints', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'index'])->name('sprints.index');
    Route::get('admin/sprints/api', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'api'])->name('sprints.api');
    Route::get('admin/sprints/create', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'create'])->name('sprints.create');
    Route::post('admin/sprints', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'store'])->name('sprints.store');
    Route::get('admin/sprints/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'show'])->name('sprints.show');
    Route::get('admin/sprints/{model}/edit', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'edit'])->name('sprints.edit');
    Route::post('admin/sprints/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'update'])->name('sprints.update');
    Route::delete('admin/sprints/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\SprintController::class, 'destroy'])->name('sprints.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/issues', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'index'])->name('issues.index');
    Route::get('admin/issues/api', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'api'])->name('issues.api');
    Route::get('admin/issues/create', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'create'])->name('issues.create');
    Route::post('admin/issues', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'store'])->name('issues.store');
    Route::get('admin/issues/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'show'])->name('issues.show');
    Route::get('admin/issues/{model}/edit', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'edit'])->name('issues.edit');
    Route::post('admin/issues/{model}/comment', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'comment'])->name('issues.comment');
    Route::post('admin/issues/{model}/timer', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'timer'])->name('issues.timer');
    Route::post('admin/issues/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'update'])->name('issues.update');
    Route::delete('admin/issues/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\IssueController::class, 'destroy'])->name('issues.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/issues-user-logs', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'index'])->name('issues-user-logs.index');
    Route::get('admin/issues-user-logs/api', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'api'])->name('issues-user-logs.api');
    Route::get('admin/issues-user-logs/create', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'create'])->name('issues-user-logs.create');
    Route::post('admin/issues-user-logs', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'store'])->name('issues-user-logs.store');
    Route::get('admin/issues-user-logs/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'show'])->name('issues-user-logs.show');
    Route::get('admin/issues-user-logs/{model}/edit', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'edit'])->name('issues-user-logs.edit');
    Route::post('admin/issues-user-logs/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'update'])->name('issues-user-logs.update');
    Route::delete('admin/issues-user-logs/{model}', [\TomatoPHP\TomatoTasks\Http\Controllers\IssuesUserLogController::class, 'destroy'])->name('issues-user-logs.destroy');
});
