<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\WebsiteInformation;
use App\Http\Controllers\Backend\AboutUs;
use App\Http\Controllers\Backend\PhotoUploadController;
use App\Http\Controllers\Backend\Testimonial;
use App\Http\Controllers\Backend\Shopinfo;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\FrontendController;

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

// Route::get('/', function () {
//     return view('Frontend.Layouts.home');
// });

//Localization

Route::any('locale/{locale}', function($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');



Route::get('/',[FrontendController::class,'home']);
Route::get('/aboutUs',[FrontendController::class,'aboutUs']);
Route::get('/service',[FrontendController::class,'service']);
Route::get('/blog',[FrontendController::class,'blog']);
Route::get('/about_faq',[FrontendController::class,'about_faq']);
Route::get('/contact',[FrontendController::class,'contact']);
Route::get('/service_detail/{id}',[FrontendController::class,'service_detail']);
Route::get('/blog_detail/{id}',[FrontendController::class,'blog_detail']);
Route::get('/serviceDetail/{id}',[FrontendController::class,'serviceDetail']);
Route::post('/contactmessagesend',[FrontendController::class,'contactmessagesend']);
Route::post('/sendMail',[FrontendController::class,'sendMail']);
Route::get('/offers',[FrontendController::class,'offers']);
Route::get('/offer_detail/{id}',[FrontendController::class,'offer_detail']);
Route::post('/searchservice/',[FrontendController::class,'searchservice']);
Route::get('/bookinglags',[FrontendController::class,'bookinglags']);
Route::post('/bookingbagsnow',[FrontendController::class,'bookingbagsnow']);



Auth::routes();

Route::get('/dashboard', [BackendController::class, 'index']);

Route::post('adminStatusChange', [AdminController::class, 'adminStatusChange']);
Route::post('updateadmin', [AdminController::class, 'update']);
Route::post('updatewebsite_information', [WebsiteInformation::class, 'update']);
Route::post('updateaboutus', [AboutUs::class, 'update']);
Route::post('sliderStatusChange', [PhotoUploadController::class, 'sliderStatusChange']);
Route::post('galleryStatusChange', [PhotoUploadController::class, 'galleryStatusChange']);
Route::post('updateuploadphoto', [PhotoUploadController::class, 'update']);
Route::post('updatetestimonial', [Testimonial::class, 'update']);
Route::post('shopStatusChange', [Shopinfo::class, 'shopStatusChange']);
Route::post('updateshop_info', [Shopinfo::class, 'update']);
Route::post('offerStatusChange', [OfferController::class, 'offerStatusChange']);
Route::post('updateofferinfo', [OfferController::class, 'update']);
Route::post('serviceStatusChange', [ServiceController::class, 'serviceStatusChange']);
Route::post('updateserviceinfo', [ServiceController::class, 'update']);
Route::post('updatebloginfo', [BlogController::class, 'update']);
Route::post('blogStatusChange', [BlogController::class, 'blogStatusChange']);
Route::post('updatefaq', [FaqController::class, 'update']);
Route::post('faqStatusChange', [FaqController::class, 'faqStatusChange']);
Route::post('testimonialStatusChange', [Testimonial::class, 'testimonialStatusChange']);
Route::post('updatepartnerinfo', [PartnerController::class, 'update']);
Route::post('partnerStatusChange', [PartnerController::class, 'partnerStatusChange']);
Route::get('messagedelete/{id}', [BackendController::class, 'messagedelete']);
Route::get('messages', [BackendController::class, 'messages']);


Route::get('addtime', [BackendController::class, 'addtime']);
Route::post('inserttime', [BackendController::class, 'inserttime']);
Route::get('deletetime/{id}', [BackendController::class, 'deletetime']);


Route::get('managebooking', [BackendController::class, 'managebooking']);
Route::get('deletebooking/{id}', [BackendController::class, 'deletebooking']);




Route::resources([
    'create_user' => AdminController::class,
    'website_information' => WebsiteInformation::class,
    'about_us' => AboutUs::class,
    'upload_photo' => PhotoUploadController::class,
    'testimonial' => Testimonial::class,
    'shop_info' => Shopinfo::class,
    'offer_info' => OfferController::class,
    'service_info' => ServiceController::class,
    'blog_info' => BlogController::class,
    'faq' => FaqController::class,
    'partner_info' => PartnerController::class,
]);
