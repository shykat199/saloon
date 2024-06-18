<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\UserLeadController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\VisitorController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'logInPage')->name('admin.auth.login');
    Route::post('/login', 'login')->name('admin.login');
    Route::get('/register', 'registerPage')->name('admin.auth.register');
    Route::post('/register', 'register')->name('admin.register');
});

Route::middleware('auth')->prefix('admin')->group(function (){
    Route::controller(DashboardController::class)->group(function (){
        Route::get('/dashboard','index')->name('admin.dashboard');
    });

    Route::controller(UserController::class)->prefix('employee')->group(function (){
        Route::get('/list','index')->name('employee.list');
        Route::get('/add-new','addNewEmp')->name('employee.add-page');
        Route::get('/remove-employee/{id}','deleteEmp')->name('employee.delete');
        Route::get('/edit-emp/{id}','editEmp')->name('employee.edit-page');
        Route::post('/add-new','storeEmp')->name('employee.store');
        Route::post('/update-emp/{id}','updateEmp')->name('employee.update');
    });

    Route::controller(UserLeadController::class)->prefix('lead')->group(function (){
        Route::get('/list','index')->name('lead.list');
        Route::get('/add-new','addNewLead')->name('lead.add-page');
        Route::get('/remove-lead/{id}','deleteLead')->name('lead.delete');
        Route::get('/edit-lead/{id}','editLead')->name('lead.edit-page');
        Route::post('/add-new','storeLead')->name('lead.store');
        Route::post('/update-lead/{id}','updateLead')->name('lead.update');
    });

    Route::controller(ServiceController::class)->prefix('service')->group(function (){
        Route::get('/list','index')->name('service.list');
        Route::get('/visitor-service','visitorService')->name('service.visitor.page');
        Route::post('/store-visitor-service','storeVisitorService')->name('service.visitor.store');
        Route::get('/add-new','addNewService')->name('service.add-page');
        Route::get('/remove-service/{id}','deleteService')->name('service.delete');
        Route::get('/edit-service/{id}','editService')->name('service.edit-page');
        Route::post('/add-new','storeService')->name('service.store');
        Route::post('/update-service/{id}','updateService')->name('service.update');
    });

    Route::controller(VisitorController::class)->prefix('visitor')->group(function (){
        Route::get('/list','index')->name('visitor.list');
        Route::get('/add-new','addNewVisitor')->name('visitor.add-page');
        Route::get('/remove-visitor/{id}','deleteVisitor')->name('visitor.delete');
        Route::get('/edit-visitor/{id}','editVisitor')->name('visitor.edit-page');
        Route::post('/add-new','storeVisitor')->name('visitor.store');
        Route::post('/update-visitor/{id}','updateVisitor')->name('visitor.update');
    });
});
