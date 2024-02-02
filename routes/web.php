<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MicrohubController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
Route::get('reset-cache', static function(){
    Artisan::call('cache:clear');
    dd('Reset Cache');
});

Route::get('config-clear', static function(){
    Artisan::call('config:clear');
    dd('Config Clear');
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


//forget password routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
// Route::get('/', function () {
//     return view('index');
// });

//get home page
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/beta',[HomeController::class,'index2'])->name('home');
//get joey
Route::get('/joey',[HomeController::class,'joey'])->name('joey');
//Clients
Route::get('/client',[HomeController::class,'clientIndex'])->name('clientIndex');
Route::get('/microhub-manager',[MicrohubController::class,'index'])->name('microhub-manager.page');
Route::post('/microhub-manager',[MicrohubController::class,'insert'])->name('microhub-manager.post');

//get mid mile
Route::get('/mid-mile',[MicrohubController::class,'midmile_index'])->name('mid-mile');
// Activate joey account after signup
Route::get('/account/active/{email}/{token}/{lat}/{lng}/{postal}', [MicrohubController::class,'accountActive'])->name('account.active');
Route::get('account/active/success',[MicrohubController::class,'accountActiveSuccess'])->name('account.active.success');

//get login page
// Route::get('/login',[HomeController::class,'login'])->name('login');
//get signup page
// Route::get('/signup',[HomeController::class,'signup'])->name('signup');
//get privacy policy page
Route::get('/privacy',[HomeController::class,'privacy'])->name('privacy');
//get become a joey page
// Route::get('/become-joey',[HomeController::class,'become_joey'])->name('become-joey');
//get become joey success page page
Route::get('/become-joey-success',[HomeController::class,'become_joey_success'])->name('become-joey-success');
//get terms and condition page
Route::get('/terms',[HomeController::class,'terms'])->name('terms');
//get about page
Route::get('/about',[HomeController::class,'about'])->name('about');
//get careers page
Route::get('/careers',[HomeController::class,'careers'])->name('careers');
//get testimonals page
Route::get('/testimonials',[HomeController::class,'testimonials'])->name('testimonials');
//get announcement page
Route::get('/announcements',[HomeController::class,'announcements'])->name('announcements');
//get industry page
Route::get('/industries',[HomeController::class,'industries'])->name('industries');
//get service detail page
Route::get('/service-detail',[HomeController::class,'service_detail'])->name('serviceDetail');
// Route::get('/track-order',[HomeController::class,'track_order'])->name('trackOrder');
//Clients
Route::get('/client',[HomeController::class,'clientIndex'])->name('clientIndex');
//post tracking id and get track orders page
Route::get('/track-order/{id}',[HomeController::class,'track_order'])->name('track-Order-get');
Route::get('/track-order-get',[HomeController::class,'track_order_get'])->name('track-Order');
Route::post('/track-order-ajax',[HomeController::class,'track_order_ajax'])->name('track-Order-ajax');

// Tracking Page
Route::post('/new-track-order-ajax',[HomeController::class,'new_track_order_ajax'])->name('new-track-Order-ajax');
Route::get('/track-package/{id}',[HomeController::class,'new_track_order'])->name('new_track-Order-get');

//get about page
Route::get('/mid-mile',[MicrohubController::class,'micro_hub_index'])->name('mid-mile');

Route::post('/book-demo',[HomeController::class,'book_demo'])->name('bookADemo');
Route::get('/book-demo/success',[HomeController::class,'book_demo_success'])->name('bookADemoSuccess');
Route::get('/book-demo',[HomeController::class,'book_demo_success'])->name('bookADemoSuccess');


Route::get('/job-detail',[HomeController::class,'job_detail'])->name('jobDetail');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/faqs',[HomeController::class,'faqs'])->name('faqs');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('dashboard');

Route::get('/{any}',[HomeController::class,'index'])->name('home');
Route::get('/{any}/{id}',[HomeController::class,'index'])->name('home');

Route::post('/jobs-apply',[HomeController::class,'jobs_apply'])->name('jobs.apply');
Route::get('/jobs-apply/success',[HomeController::class,'jobs_apply_success'])->name('jobs.apply_success');

Route::put('/new-track-order-add-info',[HomeController::class,'add_info'])->name('new_track-Order_add.info');
