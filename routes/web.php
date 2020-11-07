<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
	

// Admin routes
Route::prefix('admin')->group(function(){

    Route::get('/login', 'Auth\Admin\AdminLoginController@login')->name('admin.login');
    Route::post('/login', 'Auth\Admin\AdminLoginController@loginsubmit')->name('admin.login.submit');
	Route::get('/', 'Auth\Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\Admin\AdminRegisterController@register')->name('admin.register.submit');
	Route::get('/logout', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');
	
	Route::get('view-attandance', 'Auth\Admin\AdminController@TotalAttandance')->name('admin.view-attandance');
	Route::delete('/delete-attandance/{id}', 'Auth\Admin\AdminController@deleteAttandance')->name('delete-attandance');
	
	
	Route::delete('time-entries/destroy', 'Auth\Admin\AdminController@massDestroy')->name('time-entries.massDestroy');
	Route::get('view-attandance-location', 'Auth\Admin\AdminController@Attandancelocation')->name('admin.view-attandance-location');
	Route::delete('/delete-location/{id}', 'Auth\Admin\AdminController@deletelocation')->name('delete-location');
	
	Route::get('/change-Password', 'Auth\Admin\AdminController@changePassword')->name('admin.change.password');
	Route::post('/change-Password', 'Auth\Admin\AdminController@UpdatePassword')->name('admin.change.password.submit');
	
	Route::get('forget-password', 'Auth\Admin\AdminForgotPasswordController@forgetPassword')->name('admin.forget-password');
    
	
	//Forgot Password Routes
    Route::get('/password/reset','Auth\Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','Auth\Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','Auth\Admin\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset','Auth\Admin\AdminResetPasswordController@reset');
  //-----------------------Employee Crud-----------------------------------------------------------------------//
	Route::get('/EmpRegister', 'Auth\Admin\AdminController@EmpReg')->name('employee.register');
	Route::post('/EmpRegister', 'Auth\Admin\AdminController@Empregister')->name('employee.register.submit');
	Route::get('/emplist', 'Auth\Admin\AdminController@emplist')->name('employee.list');
	Route::delete('/delete-emp/{id}', 'Auth\Admin\AdminController@deleteEmployee')->name('delete-employee');
	Route::get('/edit-emp/{id}', 'Auth\Admin\AdminController@editEmployee')->name('edit-employee');
	Route::put('/edit-emp/{id}', 'Auth\Admin\AdminController@updateEmployee')->name('edit-employee-submit');
	
});
	

//-----------------------------Employee------------------------------------------------------------------------------------------------>
   		
   Route::get('/dashboard', 'Auth\Employee\EmployeeController@index')->name('employee.dashboard');
	//Route::post('/dashboard', 'Auth\LoginController@dashboard')->name('employee.dashboard');
   // Route::get('/', 'Auth\Employee\EmployeeController@index')->name('employee.dashboard');
	Route::get('/attandances', 'Auth\Employee\EmployeeController@makeAttandance')->name('employee.make-attandance');
	Route::get('view-attandance', 'Auth\Employee\EmployeeController@TotalAttandance')->name('employee.view-attandance');
	//Route::get('view-attandance', 'Auth\Employee\HomeController@Total')->name('employee.view-attandance');
	
	Route::post('view-location','Auth\Employee\EmployeeController@location')->name('employee.location.submit');
	Route::get('view-location','Auth\Employee\EmployeeController@showlocation')->name('employee.location');
	
	Route::get('/change-Password', 'Auth\Employee\EmployeeController@changePassword')->name('employee.change.password');
	Route::post('/change-Password', 'Auth\Employee\EmployeeController@UpdatePassword')->name('employee.change.password.submit');
	
   	// <!-------------------------------------------- Time Entries--------------------------------------------------------->
    Route::get('time-entries/show-current', 'Auth\Employee\TimeEntriesController@showCurrent')->name('times-entries.showCurrent');
    Route::post('time-entries/update-current', 'Auth\Employee\TimeEntriesController@updateCurrent')->name('times-entries.updateCurrent');

   //<!--------------------------------------location-------------------------------------------------------------------------->
    Route::get('location-entries/show-location', 'Auth\Employee\TimeEntriesController@showlocation')->name('location-entries.showCurrent');
    Route::post('location-entries/update-location', 'Auth\Employee\TimeEntriesController@updatelocation')->name('location-entries.updateCurrent');

    // -----------------------------------Forget Password-----------------------------------------------
	
	Route::get('forget-password', 'Auth\Employee\ForgotPasswordController@forgetPassword')->name('forget-password');
    
	
	//Forgot Password Routes
    Route::get('/password/reset','Auth\Employee\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('/password/email','Auth\Employee\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','Auth\Employee\ResetPasswordController@showResetForm')->name('user.password.reset');
    Route::post('/password/reset','Auth\Employee\ResetPasswordController@reset');
	
	//------------------------------------End------------------------------------------------------------
   
		