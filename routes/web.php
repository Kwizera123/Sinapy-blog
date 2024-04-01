<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $homeservice = DB::table('home_services')->first();
    $services = DB::table('home_services')->get();
    $images = Multipic::all();
    return view('home', compact('brands', 'abouts', 'services', 'homeservice', 'images'));
});

Route::get('/home', function () {
    echo "<h2>Welcome! This is Home Page</h2>";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contactvcx-acnn-fbsh', [ContactController::class, 'index'])->name('kwizera');

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
//Edit Category
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
//Update Category
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
//Soft Delete Category
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
//Soft Restore Category
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
//Perment Delete Category
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

//Brand Controller
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
//Store Brand
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
//Edit Brand
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
//Update Brand
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
//Delete
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//Multi Image Route
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
// Store images
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

//Admin All Rourer
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'Update']);
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);

//Admin Home About all router
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');

Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);
Route::post('/service/update/{id}', [AboutController::class, 'Update']);

//Admin Home Service all router
Route::get('/home/service', [ServiceController::class, 'HomeService'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'AddService'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'Edit']);
Route::post('/service/update/{id}', [ServiceController::class, 'Update']);
Route::get('/service/delete/{id}', [ServiceController::class, 'Delete']);

//Portfolio Page Route
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

//Admin Contact Page Route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::post('/update/contact/{id}', [ContactController::class, 'UpdateContact']);
Route::get('/contact/delete/{id}', [ContactController::class, 'DeleteContact']);
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');

//Home Contact Page Route
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //$users = User::all();
        //$users = DB::table('users')->get();

        return view('admin.index');
    })->name('dashboard');
});

//Multi Image Route
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');




//Change Password and user Profile Route
Route::get('/user/password', [ChangePass::class, 'ChangePassword'])->name('change.password');
Route::post('/password/update', [ChangePass::class, 'UpdatePassword'])->name('password.update');

//User Profile
Route::get('/user/profile', [ChangePass::class, 'ProfileUpdate'])->name('profile.update');
Route::post('/user/profile/update', [ChangePass::class, 'UpdateProfile'])->name('update.user.profile');
