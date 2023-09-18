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

Route::get('/', function () {
    return view('admin.master');
});
// All admin route start
//admin route start from here
Route::group(['prefix' => 'admin'], function (){
    Route::get('/sign-in', [App\Http\Controllers\Admin\AdminLoginController::class, 'index'])->name('login');;
    Route::post('/login',[App\Http\Controllers\Admin\AdminLoginController::class, 'adminLoginCheck'])->name('admin.login');

    Route::middleware('auth:admin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogOut'])->name('admin.logout');
    });

});
// All patient route start here

Route::group(['prefix' => 'patient'], function (){
    Route::get('/sign-in', [App\Http\Controllers\Patient\PatientLoginController::class, 'index'])->name('patient.sign-in');;
    Route::post('/login', [App\Http\Controllers\Patient\PatientLoginController::class, 'patientLoginCheck'])->name('patient.login');
    Route::get('/register', [App\Http\Controllers\Patient\RegisterController::class, 'patientRegistration'])->name('patient.register');
    Route::post('/save', [App\Http\Controllers\Patient\RegisterController::class, 'patientSave'])->name('patient.save');
    Route::middleware('auth:patient')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Patient\PatientController::class, 'index'])->name('patient.dashboard');
//        Route::get('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'patientLogOut'])->name('patient.logout');
    });

});
Route::get('/registration/patient','PatientController@registrationPatient')->name('registration.patient');
Route::post('/save/out-door/patient','PatientController@SaveOutdoorPatient')->name('save.out-door-patient');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
