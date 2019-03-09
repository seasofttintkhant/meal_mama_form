<?php

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
Route::get('/pdf','PDFController@index');

Route::post('pre_register','Auth\RegisterController@pre_register');
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.social');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.social_callback');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/provisional','HomeController@provisional')->name('provisional');

//Route Group which allow only active user
Route::group(['middleware'=>'active'],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/get_recommended_jobseekers', 'HomeController@get_recommended_jobseekers');
    Route::get('/facilities/getdata', 'FacilityController@getData');
    Route::get('/facilities/{id}/get_facility_jobs', 'FacilityController@getFacilityJob');
    Route::get('/facilities/get_all_facility_jobs', 'FacilityController@getAllFacilityJobs');
    Route::get('/facilities/{id}/get_facility_service_types', 'FacilityController@getFacilityServiceTypes');
    Route::resource('/facilities', 'FacilityController');
    Route::post('/facilities/preview', 'FacilityController@postPreview');

    

    Route::get('/employers/image/get_all', 'ImageController@getAll');
    Route::get('/image_managers', 'ImageController@index')->name("image_managers.index");


    Route::get('/preview/job_confirmation', 'FacilityController@jobConfirmation')->name('preview.job_confirmation');
    Route::get('/preview/fac_confirmation', 'FacilityController@facConfirmation')->name('preview.fac_confirmation');

    Route::resource('/jobs','JobController');

    Route::get('/get/{prefecture_id}/cities/','CityController@getCitiesbyPrefecture');

    Route::get('/get/{zip_code}/town','CityController@townByPostalCode');

    Route::get('/get/{job_category_id}/features','FeatureController@getFeatures');
    Route::resource('staff_voices', 'StaffVoiceController');
    Route::post('staff_voices/preview', 'StaffVoiceController@post_preview')->name('staff_voices.post_preview');
    Route::get('staff_voices/{id}/preview', 'StaffVoiceController@get_preview');

    Route::get('/searches', 'EmployeeController@index')->name("searches.index");
    Route::get('/test-searches', 'EmployeeController@test_index')->name("searches.test_index");
    Route::get('/searches/get_jobseekers','EmployeeController@get_jobseekers');
    Route::get('/searches/{id}/get_jobseeker_profile','EmployeeController@get_jobseeker_profile');
    Route::get('/searches/get_scouted_jobseekers','EmployeeController@get_scouted_jobseekers');
    Route::get('/searches/get_favorited_jobseekers','EmployeeController@get_favorited_jobseekers');
    Route::get('/searches/get_job_options','EmployeeController@get_job_options');

    Route::get('/selections', 'SelectionController@index')->name("selections.index");
    Route::get('/selections/get_selections', 'SelectionController@getSelectionsByStatus')->name("selections.get_selections");
    Route::get('/selections/get_application_counts', 'SelectionController@getSelectionsCount')->name("selections.get_application_counts");
    Route::post('/selections/{application_id}/change_application_status', 'SelectionController@changeApplicatonStatus')->name("selections.change_application_status");
    Route::post('/selections/{application_id}/memo', 'SelectionController@addMemo')->name("selections.add_memo");
    Route::get('/selections/{employee_id}/get_profile', 'SelectionController@getApplicantProfile')->name("selections.get_profile");

    
    Route::get('/messages', 'MessageController@index')->name("message.index");
    Route::get('/messages/getdata', 'MessageController@getData');
    Route::get('/messages/scout_count/', 'MessageController@scout_count');
    
    Route::get('/messages/{id}/get_message_threads', 'MessageController@getMessageThreads');
    Route::post('/messages/{id}/send_message', 'MessageController@sendMessage');
    Route::post('/messages/send_scout', 'MessageController@sendScout');
    Route::get('/messages/{id}/get_message_template', 'MessageController@getMessageTemplate');
    Route::post('/images-save','ImageController@store')->name('image.save');
    Route::get('/mode_switch', 'ModeSwitchController@index')->name('mode_switch.index');

   
    Route::get('/mode_switch/edit-email', 'EmployerController@emailIndex')->name('email.edit');
    Route::post('/mode_switch/update-email', 'EmployerController@emailUpdate')->name('email.update');

    Route::get('/mode_switch/edit', 'EmployerController@profileEdit')->name('profile.edit');
    Route::post('/mode_switch/update', 'EmployerController@profileUpdate')->name('profile.update');

    Route::get("/mode_switch/edit/password", "EmployerController@editPassword")->name("edit.editpassword");
    Route::post("/update/password", "EmployerController@updatePassword")->name("edit.updatepassword"); 

    Route::resource('/mode_switch/message-templates', 'EmployerMessageTemplateController');
    Route::get('/mode_switch/notification_edit', 'NotificationController@index')->name('mode_switch.notification_edit');

    Route::resource('/analysis','AnalysisController');

    Route::get('/announcement', 'AnnouncementController@index')->name('announcement.index');

    Route::get('/announcement/{id}', 'AnnouncementController@getAnnouncementInfo')->name('announcement.get_announcement');

    Route::get('/api/suggestion', 'APIController@suggestion')->name('api.suggestion');


    Route::post('/api/search-condition/cache', 'SeachConditionController@storeCache')->name('api.search.cache');
    Route::post('/api/search-condition', 'SeachConditionController@store')->name('api.search.store');
    Route::get('/api/get_job_category', 'APIController@getJobCategory')->name('api.get_job_category');
});
Route::get('/faq', 'PageController@faqIndex')->name("faq");
Route::get('/rule', 'PageController@ruleIndex')->name("rule");
Route::get('/api/prefectures', 'APIController@prefectures')->name('api.prefectures');
Route::get('/api/{prefecture_id}/cities', 'APIController@cities')->name('api.cities');
Route::get('/api/town', 'APIController@townByPostalCode')->name('api.town');

Route::get("/reset-password", "ResetPasswordController@index")->name("resetpassword.index"); 
Route::post("/reset-password", "ResetPasswordController@sendMail")->name("resetpassword.sendmail"); 
Route::get("/reset-password/{id}/{reset_token}", "ResetPasswordController@resetPassword"); 
Route::post("/reset-password/password_change", "ResetPasswordController@passwordChange")->name("resetpassword.password_change");


Route::get('/employers/image', 'ImageController@get');
Route::get('/employers/{id}/image', 'ImageController@getOne');
Route::post('/employers/image/description', 'ImageController@updateOne');
Route::post('/employers/image', 'ImageController@store');
Route::patch('/employers/image', 'ImageController@update');
Route::delete('/employers/image/{image}/delete', 'ImageController@delete');


