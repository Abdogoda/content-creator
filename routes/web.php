<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\CounterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PrevideoController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\AllServiceController;
use App\Http\Controllers\Frontend\ContactPageController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\PortfolioPageController;
use App\Http\Controllers\Frontend\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ------------------------
// ----- User Routes -----
// ------------------------

Route::get('/', [HomePageController::class, 'index']);
Route::get('/about', [AboutPageController::class, 'index']);
Route::post('/add-review', [AboutPageController::class, 'addReview']);
Route::get('/contact', [ContactPageController::class, 'index']);
Route::post('/send-message', [ContactPageController::class, 'store']);
Route::get('/services', [AllServiceController::class, 'index']);
Route::get('/services/{slug}', [AllServiceController::class, 'show']);
Route::get('/portfolio', [PortfolioPageController::class, 'index']);
Route::get('/team', [TeamController::class, 'index']);

Route::get('/401', function(){return view('errors.401');});
Route::get('/403', function(){return view('errors.403');});
Route::get('/404', function(){return view('errors.404');});
Route::get('/500', function(){return view('errors.500');});


// ------------------------
// ----- Admin Routes -----
// ------------------------
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function (){

    // dashboard routes
    Route::get('/', [DashboardController::class,'index']);

    // admins routes
    Route::get('/admins', [AdminController::class, 'index']);
    Route::get('/profile/{id}', [AdminController::class, 'show']);
    Route::get('/admins/new', [AdminController::class, 'create']);
    Route::post('/admins', [AdminController::class, 'store']);
    Route::put('/admins/{id}', [AdminController::class, 'update']);
    Route::put('/admins/update-password/{id}', [AdminController::class, 'updatePassword']);
    Route::delete('/admins/delete/{id}', [AdminController::class, 'delete']);

    // hero routes
    Route::get('/heros', [HeroController::class, 'index']);
    Route::get('/heros/create', [HeroController::class, 'create']);
    Route::post('/heros', [HeroController::class, 'store']);
    Route::get('/heros/edit/{id}', [HeroController::class, 'edit']);
    Route::put('/heros/{id}', [HeroController::class, 'update']);
    Route::get('/heros/delete/{id}', [HeroController::class, 'destroy']);

    // prevideo routes
    Route::get('/prevideo', [PrevideoController::class, 'index']);
    Route::post('/prevideo', [PrevideoController::class, 'update']);

    // counter routes
    Route::get('/counters', [CounterController::class, 'index']);
    Route::post('/counters', [CounterController::class, 'store']);
    Route::put('/counters/{id}', [CounterController::class, 'update']);
    Route::get('/counters/delete/{id}', [CounterController::class, 'delete']);

    // pages routes
    Route::get('/pages/{slug}', [PageController::class, 'show']);
    Route::put('/pages/{slug}', [PageController::class, 'update']);
    
    // contact us routes
    Route::get('/contact-us', [ContactUsController::class, 'index']);
    Route::post('/contact-us', [ContactUsController::class, 'update']);
    Route::post('/contact-links', [ContactUsController::class, 'updateLinks']);

    // messages routes
    Route::get('/messages', [MessageController::class, 'index']);
    Route::get('/message/delete/{id}', [MessageController::class, 'delete']);
    Route::get('/message/mark-read/{id}', [MessageController::class, 'mark_read']);
    Route::get('/message/mark-all-read', [MessageController::class, 'mark_all_read']);

    // reviews routes
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::get('/reviews/delete/{id}', [ReviewController::class, 'delete']);

    // services routes
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/create', [ServiceController::class, 'create']);
    Route::get('/services/{id}', [ServiceController::class, 'show']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::put('/services/{id}', [ServiceController::class, 'update']);
    Route::get('/services/delete/{id}', [ServiceController::class, 'delete']);
    Route::get('/services/delete-image/{id}', [ServiceController::class, 'delete_image']);

     // services features routes
    Route::post('/services/add-feature', [ServiceController::class, 'addFeature']);
    Route::post('/services/update-feature', [ServiceController::class, 'updateFeature']);
    Route::get('/services/features/delete/{id}', [ServiceController::class, 'deleteFeature']);

     // services work routes
    Route::post('/services/add-work/upload', [ServiceController::class, 'upload']);
    Route::post('/services/add-work', [ServiceController::class, 'addWork']);
    Route::put('/services/edit-work/{id}', [ServiceController::class, 'updateWork']);
    Route::get('/services/delete-work/{id}', [ServiceController::class, 'deleteWork']);

});
Auth::routes([
    'register' => false, 
    'reset' => false, 
    'verify' => false,]
);