<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home', 301);
Route::middleware(['auth'])->group(function () {

    Route::get('home', [\App\Http\Controllers\UserController::class, 'home'])->name('user.home');
    Route::get('my-profile', [\App\Http\Controllers\UserController::class, 'myProfile'] )->name('user.my-profile');
    Route::get('profile/{slug}', [\App\Http\Controllers\UserController::class, 'profile'] )->name('user.profile');
    Route::get('settings', [App\Http\Controllers\SettingsController::class, 'companySettings'])->name('settings');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('users-list', [\App\Http\Controllers\UserController::class, 'userList'])->name('user.users-list');

    Route::get('promotion',[\App\Http\Controllers\UserController::class, 'promotion'])->name('user.promotion');

    Route::get('attendance',[\App\Http\Controllers\UserController::class, 'attendance'])->name('user.attendance');

  //  Route::get('salary',[\App\Http\Controllers\UserController::class, 'salary'])->name('user.salary');

    Route::get('trainers', [\App\Http\Controllers\Training::class, 'trainers'])->name('trainers');
    Route::get('trainings', [\App\Http\Controllers\Training::class, 'index'])->name('training.index');
    Route::get('training-type', [\App\Http\Controllers\Training::class, 'trainingType'])->name('training-type');
    Route::get('resignations', [\App\Http\Controllers\ResignationController::class, 'index'] )->name('resignation.index');
    Route::get('promotions', [\App\Http\Controllers\PromotionController::class, 'index'] )->name('promotion.index');
    Route::get('departments', [\App\Http\Controllers\DepartmentController::class, 'index'] )->name('department.index');

    Route::get('holidays', [\App\Http\Controllers\HolidayController::class, 'index'] )->name('holiday.index');

    Route::get('leaves', [\App\Http\Controllers\LeaveController::class, 'index'] )->name('leave.index');
    Route::get('leave/create', [\App\Http\Controllers\LeaveController::class, 'create'] )->name('leave.create');
    Route::get('leave/send-request', [\App\Http\Controllers\LeaveController::class, 'Sendrequest'] )->name('leave.send-request');
    Route::get('leaves/settings', [\App\Http\Controllers\LeaveController::class, 'settings'] )->name('leave.settings');
    Route::get('leaves/show-requests/{user_slug}/{leave_slug}', [\App\Http\Controllers\LeaveController::class, 'show'] )->name('leave.show-request');

    Route::get('accounting/revenues', [\App\Http\Controllers\RevenueController::class, 'index'] )->name('revenue');
    Route::get('accounting/expenses', [\App\Http\Controllers\ExpenseController::class, 'index'] )->name('expense');

    Route::get('customer', function(){
         $currencies = CustomCurrency::Latest() ;
        foreach($currencies as $key => $currency){
            echo($key );
        }

        //print_r($currencies);
    });



});

