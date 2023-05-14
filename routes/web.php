<?php
use App\Http\Resources\Country;
use App\models\User;
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

Auth::routes();

//Route::get('/',function(){
//    return redirect()->route('login');
//});

Route::group( [ 'prefix' => 'admin',  'middleware' => ['auth'] , 'namespace' => 'admin' , 'as' => 'admin.'], function()
{
    Route::view('/','admin.dashboard')->name('home');
    Route::resource('blood_types', 'BloodTypeController');
    Route::get('dataTableQuery/blood_types', 'BloodTypeController@dataTableQuery')->name('blood_types.dataTableQuery');

    Route::resource('users', 'UserController');
    Route::get('dataTableQuery/users', 'UserController@dataTableQuery')->name('users.dataTableQuery');

    Route::resource('advertisements', 'AdvertisementController');
    Route::get('dataTableQuery/advertisements', 'AdvertisementController@dataTableQuery')->name('advertisements.dataTableQuery');
    Route::get('advertisement/{id}/images', 'AdvertisementController@getImages')->name('advertisements.images');
    Route::post('advertisement/{id}/images/set', 'AdvertisementController@setImages')->name('advertisements.images.set');


    Route::resource('categories', 'CategoryController');
    Route::get('dataTableQuery/categories', 'CategoryController@dataTableQuery')->name('categories.dataTableQuery');

    Route::resource('regions', 'RegionController');
    Route::get('dataTableQuery/regions', 'RegionController@dataTableQuery')->name('regions.dataTableQuery');

    Route::resource('cities', 'CityController');
    Route::get('dataTableQuery/cities', 'CityController@dataTableQuery')->name('cities.dataTableQuery');
    Route::get('get/city/regions', 'CityController@getRegionsByCity')->name('cities.get.regions');

    Route::resource('countries', 'CountryController');
    Route::get('dataTableQuery/countries', 'CountryController@dataTableQuery')->name('countries.dataTableQuery');
    Route::get('get/country/cities', 'CountryController@getCitiesByCountry')->name('countries.get.cities');

    Route::resource('orders', 'OrderController');
    Route::get('dataTableQuery/orders', 'OrderController@dataTableQuery')->name('orders.dataTableQuery');

    Route::resource('products', 'ProductController');
    Route::get('dataTableQuery/products', 'ProductController@dataTableQuery')->name('products.dataTableQuery');
    Route::get('product/{id}/images', 'ProductController@getImages')->name('products.images');
    Route::post('product/{id}/images/set', 'ProductController@setImages')->name('products.images.set');

    Route::resource('promotions', 'PromotionController');
    Route::get('dataTableQuery/promotions', 'PromotionController@dataTableQuery')->name('promotions.dataTableQuery');

    Route::resource('reports', 'ReportController');
    Route::get('dataTableQuery/reports', 'ReportController@dataTableQuery')->name('reports.dataTableQuery');

    Route::resource('settings', 'SettingController');
    Route::get('dataTableQuery/settings', 'SettingController@dataTableQuery')->name('settings.dataTableQuery');
    Route::post('setting/changeLanguage', 'SettingController@changeLanguage')->name('settings.changeLanguage');

    Route::resource('sliders', 'SliderController');
    Route::get('dataTableQuery/sliders', 'SliderController@dataTableQuery')->name('sliders.dataTableQuery');

    Route::resource('plans', 'PlanController');
    Route::get('dataTableQuery/plans', 'PlanController@dataTableQuery')->name('plans.dataTableQuery');

    Route::resource('rates', 'RateController');
    Route::get('dataTableQuery/rates', 'RateController@dataTableQuery')->name('rates.dataTableQuery');

});



Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});


Route::get('/test',function(){

    \Illuminate\Support\Facades\Artisan::call('view:clear');


});




/**
 * Routes for front-end
 */

Route::group(['namespace' => 'front_end'], function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/register', function () {
        return view('frontend.auth.register');
    })->name('register');
//    Route::get('/login', function () {
//        return view('frontend.auth.login');
//    })->name('login');
    Route::get('/forget_password', function () {
        return view('frontend.auth.forget_password');
    })->name('forget_password');

    Route::get('/add_advertisement', function () {
        return view('frontend.advertisement.add_advertisement');
    })->name('add_advertisement');

    Route::get('/added_advertisement', 'AdvertisementController@index')->name('added_advertisement');
    Route::get('/before_advertisement_single', function () {
        return view('frontend.advertisement.before_advertisement_single');
    })->name('before_advertisement_single');
    Route::get('/after_advertisement_single', function () {
        return view('frontend.advertisement.after_advertisement_single');
    })->name('after_advertisement_single');
    Route::get('/after_an_operation_advertisement_single', function () {
        return view('frontend.advertisement.after_an_operation_advertisement_single.blade');
    })->name('after_an_operation_advertisement_single');
    Route::get('/store', function () {
        return view('frontend.store.store');
    })->name('store');
    Route::get('/store_single', function () {
        return view('frontend.store.store_single');
    })->name('store_single');
    Route::get('/profile', function () {
        return view('frontend.profile.profile');
    })->name('profile');
    Route::get('/activate_number', function () {
        return view('frontend.profile.activate_number');
    })->name('activate_number');
    Route::get('/information_change', function () {
        return view('frontend.profile.information_change');
    })->name('information_change');
    Route::get('/complete_payment', function () {
        return view('frontend.payment.complete_payment');
    })->name('complete_payment');
    Route::get('/messages', function () {
        return view('frontend.messages.messages');
    })->name('messages');
});
