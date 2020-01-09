<?php


Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
Route::get('/contact', 'HomeController@contactUs')->name('contact-us');
Route::get('/packages','PackageController@index')->name('packages');


Auth::routes();

Route::get('clear', 'HomeController@clearCache')->name('clear_cache');

Route::group(['middleware' => 'auth'], function(){

Route::get('/user-profile', 'HomeController@userProfile')->name('user-profile'); 
Route::post('/user-profile-update', 'UserController@updateUserProfile')->name('user-profile-update');       
Route::get('/home', 'HomeController@home')->name('home');

//User Appointments
Route::get('/user-appointments', 'HomeController@userAppointments')->name('user-appointments');
Route::post('/reschedule-appointment','BookingController@rescheduleAppointment')->name('reschedule-appointment');

//User Payments
Route::get('/user-payments', 'PaymentController@index')->name('user-payments');

//User Locations
Route::get('/user-locations', 'HomeController@userLocations')->name('user-locations');
Route::post('/edit-location','LocationController@editLocation')->name('edit-location');
Route::post('/add-location','LocationController@addLocation')->name('add-location');
Route::post('/delete-location','LocationController@deleteController')->name('delete-location');
Route::get('/get-location/{id}','LocationController@getLocation')->name('get-location');


//Admin Cleaners
Route::get('/cleaners', 'CleanerController@index')->name('cleaners');
Route::post('/edit-cleaner','CleanerController@editLocation')->name('edit-cleaner');
Route::post('/add-cleaner','CleanerController@create')->name('add-cleaner');
Route::post('/delete-cleaner','CleanerController@delete')->name('delete-cleaner');
Route::get('/view-cleaner-profile/{id}','CleanerController@viewCleanerProfile')->name('view-cleaner-profile');
Route::get('/get-cleaner/{id}','CleanerController@getLocation')->name('get-cleaner');

//Admin Appointments
Route::get('/appointments', 'AppointmentController@index')->name('appointments');
Route::post('/edit-appointment','AppointmentController@editAppointment')->name('edit-appointment');
Route::post('/add-appointment','AppointmentController@addAppointment')->name('add-appointment');
Route::post('/delete-appointment','AppointmentController@deleteAppointment')->name('delete-appointment');
Route::get('/get-appointment/{id}','AppointmentController@getAppointment')->name('get-appointment');

//Admin Services
Route::get('/services', 'ServiceController@index')->name('services');
Route::post('/edit-service','ServiceController@editService')->name('edit-service');
Route::post('/add-service','ServiceController@addService')->name('add-service');
Route::post('/delete-service','ServiceController@deleteService')->name('delete-service');
Route::get('/get-service/{id}','ServiceController@getService')->name('get-service');

//Admin Service Packages
Route::get('/service-packages', 'PackageController@servicePackage')->name('service-packages');
Route::post('/edit-service-package','PackageController@editServicePackage')->name('edit-service-package');
Route::post('/add-service-package','PackageController@addServicePackage')->name('add-service-package');
Route::post('/delete-service-package','PackageController@deleteServicePackage')->name('delete-service-package');
Route::get('/get-service-package/{id}','PackageController@getServicePackage')->name('get-service-package');

//Admin Service Locations
Route::get('/service-locations', 'LocationController@serviceLocation')->name('service-locations');
Route::post('/edit-service-location','LocationController@editServiceLocation')->name('edit-service-location');
Route::post('/add-service-location','LocationController@addServiceLocation')->name('add-service-location');
Route::post('/delete-service-location','LocationController@deleteServiceLocation')->name('delete-service-location');
Route::get('/get-service-location/{id}','LocationController@getServiceLocation')->name('get-service-location');

//Admin Payments
Route::get('/payments', 'HomeController@userLocations')->name('payments');
Route::post('/edit-payment','LocationController@editLocation')->name('edit-payment');
Route::post('/add-payment','LocationController@addLocation')->name('add-payment');
Route::post('/delete-payment','LocationController@deleteController')->name('delete-payment');
Route::get('/get-payment/{id}','LocationController@getLocation')->name('get-payment');





});




Route::get('installation', ['as' => 'installation', 'uses'=>'HomeController@installation']);
Route::post('installation', [ 'uses'=>'HomeController@installationPost']);

//Route::get('/', ['as' => 'home', 'uses'=>'HomeController@index']);
Route::get('LanguageSwitch/{lang}', ['as' => 'switch_language', 'uses'=>'HomeController@switchLang']);

//Account activating
Route::get('account/activating/{activation_code}', ['as' => 'email_activation_link', 'uses'=>'UserController@activatingAccount']);

//Listing page
Route::get('contact-us', ['as' => 'contact_us_page', 'uses'=>'HomeController@contactUs']);
Route::post('contact-us', ['uses'=>'HomeController@contactUsPost']);
Route::get('page/{slug}', ['as' => 'single_page', 'uses'=>'PostController@showPage']);
Route::get('category/{cat_id?}', ['uses'=>'CategoriesController@show'])->name('category');
// Password reset routes...
Route::post('send-password-reset-link', ['as' => 'send_reset_link', 'uses'=>'Auth\PasswordController@postEmail']);


Route::get('/booking','BookingController@index')->name('booking');

Route::get('/get-suburbs/{id}/{select}','BookingController@getSuburbs')->name('get-suburbs');
Route::get('/get-neighbourhoods/{id}/{select}','BookingController@getNeighbourhoods')->name('get-neighbourhoods');
Route::get('/get-cities/{id}/{select}','BookingController@getCities')->name('get-cities');
Route::get('/get-states/{id}/{select}','BookingController@getStates')->name('get-states');
Route::get('/get-countries/{id}/{select}','BookingController@getCountries')->name('get-countries');


//Checkout payment
Route::post('/make-booking','BookingController@makeBooking')->name('make-booking');
Route::get('checkout/{transaction_id}', ['as'=>'payment_checkout', 'uses' => 'PaymentController@checkout']);
Route::post('checkout/{transaction_id}', ['uses' => 'PaymentController@chargePayment']);
//Payment success url
Route::any('checkout/{transaction_id}/payment-success', ['as'=>'payment_success_url','uses' => 'PaymentController@paymentSuccess']);
Route::any('checkout/{transaction_id}/paypal-notify', ['as'=>'paypal_notify_url','uses' => 'PaymentController@paypalNotify']);


Route::group(['prefix'=>'login'], function(){
    //Social login route

    Route::get('facebook', ['as' => 'facebook_redirect', 'uses'=>'SocialLogin@redirectFacebook']);
    Route::get('facebook-callback', ['as' => 'facebook_callback', 'uses'=>'SocialLogin@callbackFacebook']);

    Route::get('google', ['as' => 'google_redirect', 'uses'=>'SocialLogin@redirectGoogle']);
    Route::get('google-callback', ['as' => 'google_callback', 'uses'=>'SocialLogin@callbackGoogle']);

    Route::get('twitter', ['as' => 'twitter_redirect', 'uses'=>'SocialLogin@redirectTwitter']);
    Route::get('twitter-callback', ['as' => 'twitter_callback', 'uses'=>'SocialLogin@callbackTwitter']);
});

Route::resource('user', 'UserController');

//Dashboard Route
Route::group(['prefix'=>'dashboard', 'middleware' => 'dashboard'], function(){
    Route::get('/', ['as'=>'dashboard', 'uses' => 'DashboardController@dashboard']);

    Route::get('/settings', ['as'=>'settings', 'uses' => 'SettingsController@AccountSettings']);

    Route::group(['middleware'=>'only_admin_access'], function(){
        Route::group(['prefix'=>'settings'], function(){
            Route::get('theme-settings', ['as'=>'theme-settings', 'uses' => 'SettingsController@ThemeSettings']);
            Route::get('modern-theme-settings', ['as'=>'modern-theme-settings', 'uses' => 'SettingsController@modernThemeSettings']);
            Route::get('social-url-settings', ['as'=>'social-url-settings', 'uses' => 'SettingsController@SocialUrlSettings']);
            Route::get('general', ['as'=>'general-settings', 'uses' => 'SettingsController@GeneralSettings']);
            Route::get('payments', ['as'=>'payment-settings', 'uses' => 'SettingsController@PaymentSettings']);
            Route::get('languages', ['as'=>'language-settings', 'uses' => 'LanguageController@index']);
            Route::post('languages', ['uses' => 'LanguageController@store']);
            Route::post('languages-delete', ['as'=>'delete-language', 'uses' => 'LanguageController@destroy']);

            Route::get('storage', ['as'=>'file_storage_settings', 'uses' => 'SettingsController@StorageSettings']);
            Route::get('social', ['as'=>'social_settings', 'uses' => 'SettingsController@SocialSettings']);
            Route::get('blog', ['as'=>'blog-settings', 'uses' => 'SettingsController@BlogSettings']);
            Route::get('other', ['as'=>'other-settings', 'uses' => 'SettingsController@OtherSettings']);
            Route::post('other', ['as'=>'other-settings', 'uses' => 'SettingsController@OtherSettingsPost']);

            Route::get('recaptcha', ['as'=>'re_captcha_settings', 'uses' => 'SettingsController@reCaptchaSettings']);

            //Save settings / options
            Route::post('save-settings', ['as'=>'save_settings', 'uses' => 'SettingsController@update']);
            Route::get('monetization', ['as'=>'monetization', 'uses' => 'SettingsController@monetization']);
        });


        Route::group(['prefix'=>'categories'], function(){
            Route::get('/', ['as'=>'parent_categories', 'uses' => 'CategoriesController@index']);
            Route::post('/', ['uses' => 'CategoriesController@store']);

            Route::get('edit/{id}', ['as'=>'edit_categories', 'uses' => 'CategoriesController@edit']);
            Route::post('edit/{id}', ['uses' => 'CategoriesController@update']);

            Route::post('delete-categories', ['as'=>'delete_categories', 'uses' => 'CategoriesController@destroy']);
        });

        Route::group(['prefix'=>'posts'], function(){
            Route::get('/', ['as'=>'posts', 'uses' => 'PostController@posts']);

            Route::get('create', ['as'=>'create_new_post', 'uses' => 'PostController@createPost']);
            Route::post('create', ['uses' => 'PostController@storePost']);
            Route::post('delete', ['as'=>'delete_post','uses' => 'PostController@destroyPost']);

            Route::get('edit/{slug}', ['as'=>'edit_post', 'uses' => 'PostController@editPost']);
            Route::post('edit/{slug}', ['uses' => 'PostController@updatePost']);
        });

        Route::group(['prefix'=>'pages'], function(){
            Route::get('/', ['as'=>'pages', 'uses' => 'PostController@index']);

            Route::get('create', ['as'=>'create_new_page', 'uses' => 'PostController@create']);
            Route::post('create', ['uses' => 'PostController@store']);
            Route::post('delete', ['as'=>'delete_page','uses' => 'PostController@destroy']);

            Route::get('edit/{slug}', ['as'=>'edit_page', 'uses' => 'PostController@edit']);
            Route::post('edit/{slug}', ['uses' => 'PostController@updatePage']);
        });
        Route::group(['prefix'=>'admin_comments'], function(){
            Route::get('/', ['as'=>'admin_comments', 'uses' => 'CommentController@index']);
            Route::post('action', ['as'=>'comment_action', 'uses' => 'CommentController@commentAction']);
        });

        Route::get('approved', ['as'=>'approved_ads', 'uses' => 'AdsController@index']);
        Route::get('pending', ['as'=>'admin_pending_ads', 'uses' => 'AdsController@adminPendingAds']);
        Route::get('blocked', ['as'=>'admin_blocked_ads', 'uses' => 'AdsController@adminBlockedAds']);
        Route::post('status-change', ['as'=>'ads_status_change', 'uses' => 'AdsController@adStatusChange']);

        Route::get('ad-reports', ['as'=>'ad_reports', 'uses' => 'AdsController@reports']);
        Route::get('users', ['as'=>'users', 'uses' => 'UserController@index']);
        Route::get('users-info/{id}', ['as'=>'user_info', 'uses' => 'UserController@userInfo']);
        Route::post('change-user-status', ['as'=>'change_user_status', 'uses' => 'UserController@changeStatus']);
        Route::post('change-user-feature', ['as'=>'change_user_feature', 'uses' => 'UserController@changeFeature']);
        Route::post('delete-reports', ['as'=>'delete_report', 'uses' => 'AdsController@deleteReports']);

        Route::get('contact-messages', ['as'=>'contact_messages', 'uses' => 'HomeController@contactMessages']);

        Route::group(['prefix'=>'administrators'], function(){
            Route::get('/', ['as'=>'administrators', 'uses' => 'UserController@administrators']);
            Route::get('create', ['as'=>'add_administrator', 'uses' => 'UserController@addAdministrator']);
            Route::post('create', ['uses' => 'UserController@storeAdministrator']);
            Route::post('block-unblock', ['as'=>'administratorBlockUnblock','uses' => 'UserController@administratorBlockUnblock']);

        });


    });

});


