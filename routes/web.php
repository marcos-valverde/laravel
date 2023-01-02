<?php

use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->group(function(){

    /**
     * Routes Detail Plan
     */
    Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('plans.details.destroy');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('plans.details.create');
    Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('plans.details.show');
    Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('plans.details.update');
    Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('plans.details.edit');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('plans.details.store');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('plans.details.index');

    /**
     * Routes Plans
     */
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('/plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::any('/plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('/plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{url}', [PlanController::class, 'update'])->name('plans.update');

    /**
     *  Home Dashboard
    */
    Route::get('/', [Plancontroller::class, 'index'])->name('admin.index');
});

Route::get('/', function ()
{
    return view('welcome');
});
