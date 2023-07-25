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
Route::get('products', 'FrontController@products')->name('products');
Route::get('product/{name}', 'FrontController@Sproduct')->name('product');
Route::get('blog', 'FrontController@blog')->name('blog');
Route::get('single/{id}', 'FrontController@single')->name('single');
Route::get('contact', 'FrontController@contact')->name('contact');
Route::get('about', 'FrontController@about')->name('about');
Route::get('employees', 'FrontController@employees')->name('employees');
Route::get('search', 'FrontController@search')->name('search');
Route::get('team', 'FrontController@team')->name('team');
Route::get('profile/{id}', 'FrontController@profile')->name('profile');
Route::post('comment', 'FrontController@comment')->name('comment');
Route::get('appointment', 'FrontController@appointment')->name('appointment');
Route::get('doctor/{id}', 'FrontController@doctor')->name('doctor');
Route::post('schedu', 'FrontController@schedu')->name('schedu');
Route::post('consul', 'FrontController@CreateConsultant')->name('consul');
Route::get('consultant', 'FrontController@Consultant')->name('consultant');
Route::get('services', 'FrontController@services')->name('services');
Route::get('find', 'FrontController@find')->name('find');
Route::post('pro', 'FrontController@Pro')->name('pro');
Route::get('procedure', 'FrontController@Procedure')->name('procedure');
Route::get('problem', 'FrontController@Problem')->name('problem');
Route::get('khalili', 'FrontController@khalili')->name('khalili');
Route::get('responses', 'FrontController@response')->name('responses');
Route::get('category/{slug}', 'FrontController@category')->name('category');
//par

Route::get('parvandeshow', 'FrontController@ParvandeShow')->name('parvandeshow');




//SITE MAP
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap.xml/articles', 'SitemapController@articles');
Route::get('/sitemap.xml/movies', 'SitemapController@movies');
Route::get('/sitemap.xml/resume', 'SitemapController@resume');
Route::get('/sitemap.xml/categories', 'SitemapController@categories');

Auth::routes();

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group(function() {
        Route::get('', 'IndexController@get')->name('index');
        Route::get('profile',  'ProfileController@edit')->name('profile.edit');
        Route::put('profile',  'ProfileController@update')->name('profile.update');
        Route::prefix('admin')
            ->name('admin.')
            ->middleware('user_type:admin')
            ->namespace('Admin')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');

                Route::resource('slider-items', 'SliderItemController')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
          
                Route::post('news/create', ['uses' => 'PostController@CreatePost','as' => 'news.create' ]);
                Route::get('news/create', ['uses' => 'PostController@GetCreatePost','as' => 'news.create']); 
                
                Route::get('news/manage', 'PostController@GetManagePost')->name('news.manage');
                Route::get('deletepost/{id}','PostController@DeletePost')->name('news.deletepost');  
                Route::get('updatepost/{id}','PostController@GetEditPost')->name('news.updatepost');
                Route::post('updatepost/{id}','PostController@UpdatePost')->name('news.updatepost');

                Route::post('product/create', ['uses' => 'ProductController@CreatePost','as' => 'product.create' ]);
                Route::get('product/create', ['uses' => 'ProductController@GetCreatePost','as' => 'product.create']); 
                Route::get('product/manage', 'ProductController@GetManagePost')->name('product.manage');
                Route::get('deleteproduct/{id}','ProductController@DeletePost')->name('product.deleteproduct');  
                Route::get('updateproduct/{id}','ProductController@GetEditPost')->name('product.updateproduct');
                Route::post('updateproduct/{id}','ProductController@UpdatePost')->name('product.updateproduct');      
                Route::get('/run-migrations', function () {
                    return Artisan::call('migrate', ["--force" => true ]);
                });
                //Category Controller 
                Route::resource("categories", "CategoryController");

                //Post Category Controller 
                Route::resource("postcategories", "PostCategoryController");

                //Consultant Controller
                Route::get('consultant/manage', 'ConsultantController@GetManagePost')->name('consultant.manage');
                Route::get('consultant/show/{id}','ConsultantController@ShowPost')->name('consultant.show'); 
                Route::post('consultant/answer/{id}','ConsultantController@AnswerPost')->name('consultant.answer'); 
                Route::get('deleteconsultant/{id}','ConsultantController@DeletePost')->name('consultant.deleteconsultant'); 

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

                //PARVANDE ELECTRONIC
                Route::post('users/par', 'UserController@Createpar')->name('users.par');
                Route::get('users/parvande/{id}', 'UserController@Parvande')->name('users.parvande');


                //COMMENT CONTROLLER
                Route::get('comment/manage', 'CommentController@GetManagePost')->name('comment.manage');
                Route::get('deletecomment/{id}','CommentController@DeletePost')->name('comment.deletecomment');  
                Route::get('updatecomment/{id}','CommentController@GetEditPost')->name('comment.updatecomment');
                Route::post('updatecomment/{id}','CommentController@UpdatePost')->name('comment.updatecomment');

                //RESPONSE CONTROLLER
                Route::get('response/manage', 'ResponseController@GetManagePost')->name('response.manage');
                Route::get('deleteresponse/{id}','ResponseController@DeletePost')->name('response.deleteresponse');  
                Route::get('updateresponse/{id}','ResponseController@GetEditPost')->name('response.updateresponse');
                Route::post('updateresponse/{id}','ResponseController@UpdatePost')->name('response.updateresponse');
           
                //UPLOAD CENTER
                Route::post('uploader/create', ['uses' => 'UploadController@CreatePost','as' => 'uploader.create' ]);
                Route::get('uploader/create', ['uses' => 'UploadController@GetCreatePost','as' => 'uploader.create']); 
                Route::get('uploader/manage', 'UploadController@GetManagePost')->name('uploader.manage');
                Route::get('deleteupload/{id}','UploadController@DeletePost')->name('uploader.deleteupload'); 
                
                
                //SETTING CENTER
                Route::get('setting/manage', 'SettingController@index')->name('setting.manage');
                Route::post('setting/manage', 'SettingController@post')->name('setting.manage');

                //DATE MANAGMENT
                Route::post('date/create', ['uses' => 'DateController@CreatePost','as' => 'date.create']);
                Route::get('date/create', ['uses' => 'DateController@GetCreatePost','as' => 'date.create']);
                Route::get('date/manage', 'DateController@GetDate')->name('date.manage');
                Route::get('deletedate/{id}','DateController@DeletePost')->name('date.deletedate');

                Route::get('schedule/manage', 'DateController@GetSchedule')->name('schedule.manage');
                Route::get('deletesche/{id}','DateController@DeleteSche')->name('schedule.deletesche');

                //Consultant Controller
                Route::get('procedure/manage', 'ProcedureController@GetManagePost')->name('procedure.manage');
                Route::get('procedure/show/{id}','ProcedureController@ShowPost')->name('procedure.show'); 
                Route::get('deleteprocedure/{id}','ProcedureController@DeletePost')->name('procedure.deleteprocedure');

            });

        Route::prefix('customer')
            ->name('customer.')
            ->middleware('user_type:buyer')
            ->namespace('Customer')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');
                Route::get('visit/show/{id}','IndexController@ShowPost')->name('visit.show'); 

                Route::post('consultant/create', ['uses' => 'ConsultantController@CreatePost','as' => 'consultant.create' ]);
                Route::get('consultant/create', ['uses' => 'ConsultantController@GetCreatePost','as' => 'consultant.create']); 
                Route::get('consultant/manage', 'ConsultantController@GetManagePost')->name('consultant.manage');
                Route::get('consultant/show/{id}','ConsultantController@ShowPost')->name('consultant.show'); 

                //RESPONSE MANAGMENT
                Route::post('response/create', ['uses' => 'ResponseController@CreatePost','as' => 'response.create']);
                Route::get('response/create', ['uses' => 'ResponseController@GetCreatePost','as' => 'response.create']);
                Route::get('response/manage', 'ResponseController@GetManagePost')->name('response.manage');

                //PROFILE
                Route::get('notification/{id}', 'IndexController@notification')->name('notification');
                Route::get('profile', 'IndexController@profile')->name('profile');
                Route::post('profile/edit', 'IndexController@Editprofile')->name('profile.edit');
            });
            
        Route::prefix('owner')
            ->name('owner.')
            ->middleware('user_type:operator')
            ->namespace('Owner')
            ->group(function() {
                Route::get('', 'IndexController@get')->name('index');
                
                //USER CONTROLLER
                Route::get('users', 'UserController@getprofile')->name('users.index');
                Route::post('users/par', 'UserController@Createpar')->name('users.par');
                Route::get('users/parvande/{id}', 'UserController@Parvande')->name('users.parvande');
                
                //POST CONTROLLER
                Route::post('news/create', ['uses' => 'PostController@CreatePost','as' => 'news.create' ]);
                Route::get('news/create', ['uses' => 'PostController@GetCreatePost','as' => 'news.create']); 
                Route::get('news/manage', 'PostController@GetManagePost')->name('news.manage');


            });

    });
