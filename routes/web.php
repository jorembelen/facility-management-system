<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ClientAppointmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobOrderController;
use App\Http\Controllers\OccupancyController;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkCategoryController;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Auth;
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
    return redirect('login');
});

// Auth::routes(['verify' => true]);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');

Route::middleware(['auth:sanctum', 'verified', 'middleware', 'checkStatus'])->group(function(){
    
    //
        Route::get('/dashboard', [HomeController::class, 'index']);
        Route::resource('/users', UserController::class);
        Route::resource('/surveys', SurveyController::class);
        Route::resource('/employees', EmployeeController::class);
        Route::resource('/schedules', ScheduleController::class);
        Route::resource('/appointments', AppointmentController::class);
        Route::get('/emergency-appointment', [AppointmentController::class, 'emergencyCreate']);
    
        Route::resource('/job-orders', JobOrderController::class);
        Route::resource('/work-categories', WorkCategoryController::class);
        Route::resource('/occupants', OccupantController::class);
        Route::post('search-occupants', [OccupantController::class, 'search'])->name('occupants.search');
        Route::post('search-buildings', [BuildingController::class, 'search'])->name('buildings.search');

        Route::resource('/facilities', BuildingController::class);
        Route::get('/building-job-orders/{id}', [BuildingController::class, 'jobOrders'])->name('job-orders');

        Route::get('/occupants-import', [OccupantController::class, 'importIndex']);
        Route::post('/occupants-import', [OccupantController::class, 'import'])->name('import.occupants');
        Route::get('/buildings-import', [BuildingController::class, 'importIndex']);
        Route::post('/buildings-import', [BuildingController::class, 'import'])->name('import.buildings');
        Route::get('/schedules-import', [ScheduleController::class, 'importIndex']);
        Route::post('/schedules-import', [ScheduleController::class, 'import'])->name('import.schedules');
        Route::get('/users-import', [UserController::class, 'importIndex']);
        Route::post('/users-import', [UserController::class, 'import'])->name('import.users');
        Route::get('/employees-import', [EmployeeController::class, 'importIndex']);
        Route::post('/employees-import', [EmployeeController::class, 'import'])->name('import.employees');

        Route::resource('/occupancies', OccupancyController::class);
        Route::get('/occupancies-import', [OccupancyController::class, 'importIndex']);
        Route::post('/occupancies-import', [OccupancyController::class, 'import'])->name('import.occupancies');
        Route::post('search-occupancies', [OccupancyController::class, 'search'])->name('occupancies.search');
        Route::get('occupancies-details/{id}', [OccupancyController::class, 'details'])->name('occupancies.view');
        Route::get('appointment-details/{id}', [AppointmentController::class, 'showAppointment'])->name('appointment.view');
        Route::put('appointment-closed/{id}', [AppointmentController::class, 'closedAppointment'])->name('appointment.closed');
        Route::get('/calendar', [AppointmentController::class, 'calendar']);

        

        Route::get('closed-appointments', [AppointmentController::class, 'closed']);
        Route::get('open-appointments', [AppointmentController::class, 'open']);
        Route::get('cancelled-appointments', [AppointmentController::class, 'cancelled']);
        Route::get('occupant-info/{badge}', [AppointmentController::class, 'info'])->name('client.info');
        Route::put('cancel-appointment/{id}', [ClientAppointmentController::class, 'cancel'])->name('client-appointment.cancel');
        Route::put('update-appointment/{id}', [ClientAppointmentController::class, 'updateAppointment'])->name('update');

        Route::get('checkout/{id}', [CheckoutController::class, 'checkoutView'])->name('checkout.view');
        Route::post('checkout/submit', [CheckoutController::class, 'checkOut'])->name('checkout.submit');
        
        Route::get('tenants-checkout', [OccupantController::class, 'checkout']);
        Route::get('tenants-checkin', [OccupantController::class, 'checkin']);
        Route::get('tenants-checkin/{id}', [OccupantController::class, 'checkinTenant'])->name('tenant.checkin');
        Route::post('tenant/create', [UserController::class, 'tenantStore'])->name('tenant.create');
        Route::post('checkin/store', [OccupantController::class, 'checkinStore'])->name('checkin.store');

       
            Route::resource('/client-appointments', ClientAppointmentController::class);
            Route::get('get-schedule', [ClientAppointmentController::class, 'searchSchedule'])->name('schedule.get');
        
    });
 