<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ClientAppointmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobOrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OccupancyController;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkCategoryController;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('login');
});


Route::group(['middleware' => ['auth:sanctum', 'verified', 'checkStatus']], function() {

    //    This is for Tenant dashboard
        Route::get('/reset/password', [LoginController::class, 'resetPassword'])->name('reset');
        Route::put('/reset/password', [LoginController::class, 'newPassword'])->name('reset.store');

        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('get-schedule', [ClientAppointmentController::class, 'searchSchedule'])->name('schedule.get');
        Route::put('cancel-appointment/{id}', [ClientAppointmentController::class, 'cancel'])->name('client-appointment.cancel');
        Route::put('update-appointment/{id}', [ClientAppointmentController::class, 'updateAppointment'])->name('update');
        Route::resource('/client-appointments', ClientAppointmentController::class);
        Route::resource('/surveys', SurveyController::class);
        
   
                                // This is for admin dashboard
                    Route::group(['middleware' => ['admin']], function () {

                        Route::get('/emergency-appointment', [AppointmentController::class, 'emergencyCreate']);
                        Route::get('appointment-details/{id}', [AppointmentController::class, 'showAppointment'])->name('appointment.view');
                        Route::put('appointment-closed/{id}', [AppointmentController::class, 'closedAppointment'])->name('appointment.closed');
                        Route::get('/calendar', [AppointmentController::class, 'calendar']);
                        Route::get('closed-appointments', [AppointmentController::class, 'closed']);
                        Route::get('open-appointments', [AppointmentController::class, 'open']);
                        Route::get('cancelled-appointments', [AppointmentController::class, 'cancelled']);
                        Route::get('occupant-info/{badge}', [AppointmentController::class, 'info'])->name('client.info');
                        Route::post('emergency/appointment', [AppointmentController::class, 'emergencyStore'])->name('emergency.store');
                        Route::resource('/appointments', AppointmentController::class);

                
                        Route::post('search-occupants', [OccupantController::class, 'search'])->name('occupants.search');
                        Route::get('/occupants-import', [OccupantController::class, 'importIndex']);
                        Route::post('/occupants-import', [OccupantController::class, 'import'])->name('import.occupants');
                        Route::get('tenants-checkout', [OccupantController::class, 'checkout']);
                        Route::get('tenants-checkin', [OccupantController::class, 'checkin']);
                        Route::get('tenants-checkin/{id}', [OccupantController::class, 'checkinTenant'])->name('tenant.checkin');
                        Route::post('checkin/store', [OccupantController::class, 'checkinStore'])->name('checkin.store');
                        Route::resource('/occupants', OccupantController::class);
                        
                        Route::post('search-buildings', [BuildingController::class, 'search'])->name('buildings.search');
                        Route::get('/building-job-orders/{id}', [BuildingController::class, 'jobOrders'])->name('job-orders');
                        Route::get('/buildings-import', [BuildingController::class, 'importIndex']);
                        Route::post('/buildings-import', [BuildingController::class, 'import'])->name('import.buildings');
                        Route::resource('/facilities', BuildingController::class);


                        Route::get('/schedules-import', [ScheduleController::class, 'importIndex']);
                        Route::post('/schedules-import', [ScheduleController::class, 'import'])->name('import.schedules');
                        Route::resource('/schedules', ScheduleController::class);

                        Route::post('tenant/create', [UserController::class, 'tenantStore'])->name('tenant.create');
                        Route::get('/users-import', [UserController::class, 'importIndex']);
                        Route::post('/users-import', [UserController::class, 'import'])->name('import.users');
                        Route::resource('/users', UserController::class);


                        Route::get('/employees-import', [EmployeeController::class, 'importIndex']);
                        Route::post('/employees-import', [EmployeeController::class, 'import'])->name('import.employees');
                        Route::resource('/employees', EmployeeController::class);
                
                        Route::get('occupancies-details/{id}', [OccupancyController::class, 'details'])->name('occupancies.view');
                        Route::resource('/occupancies', OccupancyController::class);


                        Route::get('checkout/{id}', [CheckoutController::class, 'checkoutView'])->name('checkout.view');
                        Route::post('checkout/submit', [CheckoutController::class, 'checkOut'])->name('checkout.submit');
                        
                    
                        Route::resource('/job-orders', JobOrderController::class);
                        Route::resource('/work-categories', WorkCategoryController::class);
                    
                    });


});

