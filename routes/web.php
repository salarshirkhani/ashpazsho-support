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

Route::get('/', 'FrontController@index')->name('/');
Route::get('mxc-account-info', 'FrontController@getAccountInfo')->name('mxc-account-info');
Auth::routes();

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group(function() {
        Route::get('', 'IndexController@get')->name('index');
        Route::prefix('admin')
            ->name('admin.')
            ->middleware('user_type:admin')
            ->namespace('Admin')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');

                //CONTACT CONTROLLER
                Route::get('contact/manage', 'ContactController@GetManagePost')->name('contact.manage');
                Route::get('deletecontact/{id}','ContactController@DeletePost')->name('contact.deletecontact');  
                
                //USER CONTROLLER
                Route::get('users', 'UserController@getprofile')->name('users.index');
                Route::post('users/create', ['uses' => 'UserController@CreatePost','as' => 'users.create' ]);
                Route::get('users/create', ['uses' => 'UserController@GetCreatePost','as' => 'users.create']); 
                Route::get('users/edit/{id}', 'UserController@getEditprofile')->name('users.edit');
                Route::post('users/ediit', 'UserController@Editprofile')->name('users.ediit');
                Route::get('users/show/{id}', 'UserController@getuser')->name('users.show');
                Route::get('deleteuser/{id}','UserController@DeletePost')->name('users.deleteuser');
                Route::post('users/changerole', 'UserController@Role')->name('users.changerole');
                Route::get('deleteorder/{id}','UserController@DeleteOrder')->name('users.deleteorder');
                Route::post('users/addorder', 'UserController@AddOrder')->name('users.addorder');
                
                //SUBSCRIPTION CONTROLLER
                Route::post('subscription/create', ['uses' => 'SubscriptionController@CreatePost','as' => 'subscription.create' ]);
                Route::get('subscription/create', ['uses' => 'SubscriptionController@GetCreatePost','as' => 'subscription.create']); 
                Route::get('subscription/manage', 'SubscriptionController@GetManagePost')->name('subscription.manage');
                Route::get('subscription/delete/{id}','SubscriptionController@DeletePost')->name('subscription.delete');  
                Route::get('subscription/update/{id}','SubscriptionController@GetEditPost')->name('subscription.update');
                Route::post('subscription/update/{id}','SubscriptionController@UpdatePost')->name('subscription.update');     

                //NOTIFICATION CONTROLLER
                Route::post('notification/create', ['uses' => 'NotificationController@CreatePost','as' => 'notification.create' ]);
                Route::get('notification/create', ['uses' => 'NotificationController@GetCreatePost','as' => 'notification.create']); 
                Route::get('notification/manage', 'NotificationController@GetManagePost')->name('notification.manage');
                Route::get('deletenotification/{id}','NotificationController@DeletePost')->name('notification.deletenotification');  
                Route::get('updatenotification/{id}','NotificationController@GetEditPost')->name('notification.updatenotification');
                Route::post('updatenotification/{id}','NotificationController@UpdatePost')->name('notification.updatenotification');
                
                //SUPPORT MANAGMENT
                Route::post('support/create', ['uses' => 'SupportController@Sendsupport','as' => 'support.create' ]);
                Route::get('support/create', ['uses' => 'SupportController@GetCreateSupport','as' => 'support.create']); 
                Route::get('support/manage', 'SupportController@GetManagePost')->name('support.manage');
                Route::get('support/deletepost/{id}','SupportController@DeletePost')->name('support.deletepost');  
                Route::get('support/show/{id}','SupportController@ShowPost')->name('support.show');
                Route::post('support/update','SupportController@UpdatePost')->name('support.update');
                Route::get('support/updatepost/{id}','SupportController@GetEditPost')->name('support.updatepost');
                Route::post('send','SupportController@Message')->name('support.send'); 
                Route::post('closechat','SupportController@close')->name('support.closechat'); 

                //USERS IN SUPPORT MANAGMENT
                Route::post('support/adduser','SupportController@AddUser')->name('support.adduser'); 
                Route::get('changerole/{id}','SupportController@changerole')->name('support.changerole');
                Route::get('deleteuser/{id}','SupportController@deleteuser')->name('support.deleteuser');



                //UPLOAD CENTER
                Route::post('uploader/create', ['uses' => 'UploadController@CreatePost','as' => 'uploader.create' ]);
                Route::get('uploader/create', ['uses' => 'UploadController@GetCreatePost','as' => 'uploader.create']); 
                Route::get('uploader/manage', 'UploadController@GetManagePost')->name('uploader.manage');
                Route::get('deleteupload/{id}','UploadController@DeletePost')->name('uploader.deleteupload'); 

                //Transaction And Orders CONTROLLER
                Route::get('transaction/manage', 'TransactionController@GetManagePost')->name('transaction.manage');
                Route::get('deletetransaction/{id}','TransactionController@DeletePost')->name('transaction.deleteproduct');  
                Route::get('orders/manage', 'TransactionController@GetOrders')->name('orders.manage');

                //REFERAL CONTROLLER
                Route::post('referal/create', ['uses' => 'ReferalController@CreatePost','as' => 'referal.create' ]);
                Route::get('referal/create', ['uses' => 'ReferalController@GetCreatePost','as' => 'referal.create']); 
                Route::get('referal/manage', 'ReferalController@GetManagePost')->name('referal.manage');
                Route::get('referal/delete/{id}','ReferalController@DeletePost')->name('referal.delete');  
                Route::get('referal/update/{id}','ReferalController@GetEditPost')->name('referal.update');
                Route::post('referal/update/{id}','ReferalController@UpdatePost')->name('referal.update');


                // Clear application cache
                Route::get('/clear-cache', function () {
                    Artisan::call('cache:clear');
                    Artisan::call('route:clear');
                    Artisan::call('config:cache');
                    Artisan::call('view:clear');
                    Artisan::call('optimize:clear');
                    return "Cache cleared successfully";
                })->name('clear-cache');

            });



        Route::prefix('customer')
            ->name('customer.')
            ->middleware('user_type:buyer')
            ->namespace('Customer')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');
                Route::get('likes', 'IndexController@likes')->name('likes');
                Route::get('notification/{id}', 'IndexController@notification')->name('notification');
                
                //PROFILE AND VERIFY
				Route::get('profile', 'ProfileController@profile')->name('profile');
				Route::get('verify', 'ProfileController@verify')->name('verify');
                Route::post('verify/edit', 'ProfileController@Editverify')->name('verify.edit');
                Route::post('profile/edit', 'ProfileController@Editprofile')->name('profile.edit');
                Route::post('profile/pass', 'ProfileController@Editpass')->name('profile.pass');
                
                //SUBSCRIPTION SYSTEM 
                Route::get('subscription', 'IndexController@subscription')->name('subscription');
                Route::post('subs','IndexController@subs')->name('subs');

                //SUPPORT
                Route::get('tickets','SupportController@tickets')->name('tickets');
                Route::get('support','SupportController@support')->name('support');
                Route::post('support','SupportController@Sendsupport')->name('support');
                Route::get('chat/{id}','SupportController@Chats')->name('chat');  
                Route::post('send','SupportController@Message')->name('send'); 
                Route::post('closechat','SupportController@close')->name('closechat');

                //VARIZ
                Route::get('payment','PaymentController@payment')->name('payment');
                Route::get('payment/generate','PaymentController@generate')->name('payment.generate');
                Route::post('payment/grnt','PaymentController@grnt')->name('payment.grnt');
                Route::post('payment/create','PaymentController@create')->name('payment.create');
                
                //REFERAL
                Route::get('referal','IndexController@Referal')->name('referal');
                Route::get('referal/create','IndexController@ReferalCreate')->name('referal.create');

        });


        Route::prefix('buyer')
            ->name('buyer.')
            ->middleware('user_type:seller')
            ->namespace('Buyer')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');
                Route::get('cart', 'IndexController@cart')->name('cart');
                Route::get('likes', 'IndexController@likes')->name('likes');
                Route::get('profile', 'IndexController@profile')->name('profile');
                Route::get('notification/{id}', 'IndexController@notification')->name('notification');

            });

    });
