<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Auth\StudentLoginController;
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


require __DIR__.'/auth.php';

/*STUDENT AUTH*/

//Login Routes
Route::get('{slug}/home','StoreController@studentHome')->name('student.home')->middleware('studentAuth');
Route::get('{slug}/student-login','Student\Auth\StudentLoginController@showLoginForm')->name('student.loginform');
Route::post('{slug}/student-login/{cart?}','Student\Auth\StudentLoginController@login')->name('student.login');
Route::post('{slug}/student-logout','Student\Auth\StudentLoginController@logout')->name('student.logout');
//Forgot Password Routes
Route::get('{slug}/student-password','Student\Auth\StudentForgotPasswordController@showLinkRequestForm')->name('student.password.request');
Route::post('{slug}/student-password/email','Student\Auth\StudentForgotPasswordController@postStudentEmail')->name('student.password.email');
/*Reset Password Routes*/
Route::get('{slug}/student-password/reset/{token}','Student\Auth\StudentForgotPasswordController@getStudentPassword')->name('student.password.reset');
Route::post('{slug}/student-password/reset','Student\Auth\StudentForgotPasswordController@updateStudentPassword')->name('student.password.update');
/*Profile*/
Route::get('{slug}/profile','Student\Auth\StudentLoginController@profile')->name('student.profile')->middleware('studentAuth');
Route::put('{slug}/profile/{id}','Student\Auth\StudentLoginController@profileUpdate')->name('student.profile.update')->middleware('studentAuth');
Route::put('{slug}/profile-password/{id}','Student\Auth\StudentLoginController@updatePassword')->name('student.profile.password')->middleware('studentAuth');


Route::get('/make_pw/{pw}', function ($pw) {
    \Illuminate\Support\Facades\Hash::make($pw);
});

# Login via RocketPanel
Route::any('/rocketpanel/checkout/register', 'RocketPanelController@checkout_register');
Route::any('/rocketpanel/checkout/update', 'RocketPanelController@checkout_update');
Route::any('/rocketpanel/register', 'RocketPanelController@register');
Route::any('/rocketpanel/login', 'RocketPanelController@login');
Route::any('/rocketpanel/auth', 'RocketPanelController@auth')->name('rocketpanel.auth');
Route::any('/rocketpanel/cancel', 'RocketPanelController@cancel');
Route::any('/rocketpanel/activate', 'RocketPanelController@activate');

Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index',])->middleware(['XSS']);
Route::get('/dashboard', ['as' => 'dashboard','uses' => 'DashboardController@index'])->middleware(['XSS','auth'])->name('dashboard');
Route::group(['middleware' => ['auth'],], function (){
    Route::resource('stores', 'StoreController');
    Route::post('store-setting/{id}', 'StoreController@savestoresetting')->name('settings.store');
});

Route::group(['middleware' => ['auth', 'XSS']], function (){
    Route::get('change-language/{lang}', 'LanguageController@changeLanquage')->name('change.language')->middleware(['auth','XSS']);
    Route::get('manage-language/{lang}', 'LanguageController@manageLanguage')->name('manage.language')->middleware(['auth','XSS']);
    Route::post('store-language-data/{lang}', 'LanguageController@storeLanguageData')->name('store.language.data')->middleware(['auth','XSS']);
    Route::get('create-language', 'LanguageController@createLanguage')->name('create.language')->middleware(['auth','XSS']);
    Route::post('store-language', 'LanguageController@storeLanguage')->name('store.language')->middleware(['auth','XSS']);
    Route::delete('/lang/{lang}', 'LanguageController@destroyLang')->name('lang.destroy')->middleware(['auth','XSS']);
});

Route::group(['middleware' => ['auth','XSS'],], function (){
    Route::get('store-grid/grid', 'StoreController@grid')->name('store.grid');
    Route::get('store-customDomain/customDomain', 'StoreController@customDomain')->name('store.customDomain');
    Route::get('store-subDomain/subDomain', 'StoreController@subDomain')->name('store.subDomain');
    Route::get('store-plan/{id}/plan', 'StoreController@upgradePlan')->name('plan.upgrade');
    Route::get('store-plan-active/{id}/plan/{pid}', 'StoreController@activePlan')->name('plan.active');
    Route::DELETE('store-delete/{id}', 'StoreController@storedestroy')->name('user.destroy');
    Route::DELETE('ownerstore-delete/{id}', 'StoreController@ownerstoredestroy')->name('ownerstore.destroy');
    Route::get('store-edit/{id}', 'StoreController@storedit')->name('user.edit');
    Route::Put('store-update/{id}', 'StoreController@storeupdate')->name('user.update');
});

Route::get('/store-change/{id}', 'StoreController@changeCurrantStore')->name('change_store')->middleware(['auth','XSS']);

Route::get('/change/mode', ['as' => 'change.mode','uses' => 'DashboardController@changeMode']);

Route::get('profile', 'DashboardController@profile')->name('profile')->middleware(['auth','XSS']);
Route::put('change-password', 'DashboardController@updatePassword')->name('update.password');
Route::put('edit-profile', 'DashboardController@editprofile')->name('update.account')->middleware(['auth','XSS']);
Route::get('storeanalytic', 'StoreAnalytic@index')->middleware('auth')->name('storeanalytic')->middleware(['XSS']);

Route::group(['middleware' => ['auth','XSS',]], function (){
    Route::post('business-setting', 'SettingController@saveBusinessSettings')->name('business.setting');
    Route::post('company-setting', 'SettingController@saveCompanySettings')->name('company.setting');
    Route::post('email-setting', 'SettingController@saveEmailSettings')->name('email.setting');
    Route::post('system-setting', 'SettingController@saveSystemSettings')->name('system.setting');
    Route::post('pusher-setting', 'SettingController@savePusherSettings')->name('pusher.setting');
    Route::get('test-mail', 'SettingController@testMail')->name('test.mail');
    Route::post('test-mail', 'SettingController@testSendMail')->name('test.send.mail');
    Route::get('settings', 'SettingController@index')->name('settings');
    Route::post('payment-setting', 'SettingController@savePaymentSettings')->name('payment.setting');
    Route::post('owner-payment-setting/{slug?}', 'SettingController@saveOwnerPaymentSettings')->name('owner.payment.setting');
    Route::post('owner-email-setting/{slug?}', 'SettingController@saveOwneremailSettings')->name('owner.email.setting');
});

// certificate
Route::get('/certificate/preview/{template}/{color}/{gradiant?}',['as' => 'certificate.preview','uses' => 'SettingController@previewCertificate']);
Route::post('/certificate/template/setting', ['as' => 'certificate.template.setting','uses' => 'SettingController@saveCertificateSettings',]);
Route::resource('location', 'LocationController')->middleware(['auth','XSS']);
Route::resource('custom-page', 'PageOptionController')->middleware(['auth','XSS']);

Route::get('/plans', ['as' => 'plans.index','uses' => 'PlanController@index',])->middleware(['auth','XSS',]);
Route::get('/plans/create', ['as' => 'plans.create','uses' => 'PlanController@create',])->middleware(['auth','XSS']);
Route::post(
    '/plans', [
    'as' => 'plans.store',
    'uses' => 'PlanController@store',
]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get(
    '/plans/edit/{id}', [
    'as' => 'plans.edit',
    'uses' => 'PlanController@edit',
]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::put(
    '/plans/{id}', [
    'as' => 'plans.update',
    'uses' => 'PlanController@update',
]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post(
    '/user-plans/', [
    'as' => 'update.user.plan',
    'uses' => 'PlanController@userPlan',
]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::group(
    [
        'middleware' => [
            'XSS',
        ],
    ], function (){
    Route::resource('rating', 'RattingController');
    Route::post('rating_view', 'RattingController@rating_view')->name('rating.rating_view');
    Route::get('rating/{slug?}/product/{id}', 'RattingController@rating')->name('rating');
    Route::post('store_rating/{slug?}/product/{course_id}/{tutor_id}', 'RattingController@store_rating')->name('store_rating');
    Route::post('edit_rating/product/{id}', 'RattingController@edit_rating')->name('edit_rating');

}
);
Route::group(
    [
        'middleware' => [
            'XSS',
        ],
    ], function (){
    Route::resource('subscriptions', 'SubscriptionController');
    Route::POST('subscriptions/{id}', 'SubscriptionController@store_email')->name('subscriptions.store_email');
}
);
Route::resource('store-resource', 'StoreController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('page/{slug?}', 'StoreController@pageOptionSlug')->name('pageoption.slug');

Route::get('store/{slug?}', 'StoreController@storeSlug')->name('store.slug');
Route::get('user-cart-item/{slug?}/cart', 'StoreController@StoreCart')->name('store.cart');
Route::post('store/{slug?}', 'StoreController@changeTheme')->name('store.changetheme');
/*LMS STORE*/
Route::get('{slug?}/view-course/{id}', 'StoreController@ViewCourse')->name('store.viewcourse');
Route::get('{slug?}/tutor/{id}', 'StoreController@tutor')->name('store.tutor');
Route::get('{slug?}/search-data/{search}', 'StoreController@searchData')->name('store.searchData');
Route::post('{slug?}/filter', 'StoreController@filter')->name('store.filter');
Route::get('{slug?}/search/{search?}/{category?}', 'StoreController@search')->name('store.search');
Route::get('{slug}/checkout/{id}/{total}', 'StoreController@checkout')->name('store.checkout');
Route::get('{slug}/user-create', 'StoreController@userCreate')->name('store.usercreate');
Route::post('{slug}/user-create', 'StoreController@userStore')->name('store.userstore');
Route::get('{slug}/fullscreen/{course}/{id?}/{header_id?}/{type?}', 'StoreController@fullscreen')->name('store.fullscreen')->middleware('studentAuth');
Route::get('{slug}/activity/fullscreen/{course_id}/{header_id?}/{chapter_id?}/{completed?}', 'StoreController@nextFullscreen')->name('store.nextFullscreen')->middleware(['studentAuth']);
Route::get('{slug}/community/{space?}', 'StoreController@community')->name('store.community');
Route::post('{slug}/community/{space?}', 'StoreController@communityStorePost')->name('store.community.post.create');
Route::get('{slug}/aulas-salvas','StoreController@chapterSaved')->name('student.saved')->middleware('studentAuth');
Route::get('{slug}/save-chapter/{course_id}/{header_id}/{chapter_id}','StoreController@chapterBookmark')->name('student.chapterBookmark')->middleware('studentAuth');
Route::get('{slug}/annotations','StoreController@chapterNotes')->name('student.notes')->middleware('studentAuth');
Route::delete('{slug}/annotations/{id}','StoreController@deleteChapterNotes')->name('student.notes.destroy')->middleware('studentAuth');
Route::get('{slug}/live','StoreController@live')->name('student.live')->middleware('studentAuth');
Route::get('{slug}/ranking','StoreController@ranking')->name('student.ranking')->middleware('studentAuth');
//Student SIDE
Route::get('{slug}/student-home', 'StoreController@studentHome')->name('student.home.2')->middleware('studentAuth');
Route::get('{slug}/student-wishlist', 'StoreController@wishlistpage')->name('student.wishlist')->middleware('studentAuth');
/*WISHLIST*/
Route::post('{slug}/student-addtowishlist/{id}', 'StoreController@wishlist')->name('student.addToWishlist');
Route::post('{slug}/student-removefromwishlist/{id}', 'StoreController@removeWishlist')->name('student.removeFromWishlist')->middleware('studentAuth');
/*Chapter Activity*/
Route::post('student-watched/{header_id}/{chapter_id}/{course_id}/{slug?}', 'StoreController@chapterMarker')->name('student.chaptermarker');
Route::post('student-ratting/{chapter_id}/{value}/{slug?}', 'StoreController@chapterRatting')->name('student.chapterratting');
Route::get('student-activity/{slug}/{course_id}/{chapter_id}/{current_time?}/{total_time?}/{like?}', 'StoreController@chapterActivityStore')->name('student.chapterActivity');
Route::post('student-notes/{slug}/{course_id}/{header_id}/{chapter_id}/{current_time?}', 'StoreController@createChapterNotes')->name('student.createChapterNotes');

Route::get('{slug?}/edit-products/{theme?}', 'StoreController@Editproducts')->name('store.editproducts')->middleware(['auth','XSS']);
Route::post('{slug?}/store-edit-products/{theme?}', 'StoreController@StoreEditProduct')->name('store.storeeditproducts')->middleware(['auth']);

/**/
Route::get('user-address/{slug?}/useraddress', 'StoreController@userAddress')->name('user-address.useraddress');
Route::get('store-payment/{slug?}/userpayment', 'StoreController@userPayment')->name('store-payment.payment');
Route::get('store/{slug?}/product/{id}', 'StoreController@productView')->name('store.product.product_view');
Route::resource('store-resource', 'StoreController')->middleware(['auth','XSS',]);
Route::post('user-product_qty/{slug?}/product/{id}/{variant_id?}', 'StoreController@productqty')->name('user-product_qty.product_qty');
Route::post('customer/{slug?}', 'StoreController@customer')->name('store.customer');
Route::post('user-location/{slug}/location/{id}', 'StoreController@UserLocation')->name('user.location');
Route::post('user-shipping/{slug}/shipping/{id}', 'StoreController@UserShipping')->name('user.shipping');
Route::post('save-rating/{slug?}', 'StoreController@saverating')->name('store.saverating');
Route::delete('delete_cart_item/{slug?}/product/{id}/{variant_id?}', 'StoreController@delete_cart_item')->name('delete.cart_item');

Route::get('store-complete/{slug?}/{id}', 'StoreController@complete')->name('store-complete.complete');

Route::get('{slug?}/order/{id}', 'StoreController@userorder')->name('user.order');

Route::post('{slug?}/whatsapp', 'StoreController@whatsapp')->name('user.whatsapp');

Route::post(
    'prepare-payment', [
        'as' => 'prepare.payment',
        'uses' => 'PlanController@preparePayment',
    ]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){
    Route::resource('plan_request', 'PlanRequestController');
}
);
Route::get('{id}/get-store-payment-status', 'PaypalController@storeGetPaymentStatus')->name('get.store.payment.status')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get(
    'qr-code', function (){
    return QrCode::generate();
}
);
Route::get('change-language-store/{slug?}/{lang}', 'LanguageController@changeLanquageStore')->name('change.languagestore')->middleware(['XSS']);

/*STORE EDIT*/
Route::post('{slug?}/store-edit', 'StoreController@StoreEdit')->name('store.storeedit')->middleware(['auth']);
Route::delete('{slug?}/brand/{id}/delete/', 'StoreController@brandfileDelete')->name('brand.file.delete')->middleware(['auth']);

//Course
Route::resource('course', 'CourseController')->middleware(['auth']);
Route::post('course/getsubcategory', 'CourseController@getsubcategory')->name('course.getsubcategory')->middleware(['auth']);
Route::post('course/{id}/updatetheme', 'CourseController@updateTheme')->name('course.updatetheme')->middleware(['auth']);
Route::put('course/general/{course}', 'CourseController@updateGeneral')->name('course.general')->middleware(['auth']);
Route::put('course/discussion/{course}', 'CourseController@updateDiscussion')->name('course.discussion')->middleware(['auth']);
Route::post('course/{course_id}/create-banners', 'CourseController@storeBanners')->name('course.createbanners')->middleware(['auth']);
Route::delete('course/banners/{type}/{course_id}/destroy', 'CourseController@destroyBanners')->name('course.destroybanners')->middleware(['auth']);

/*Practices*/
Route::post('course/practices-files/{id}', 'CourseController@practicesFiles')->name('course.practicesfiles')->middleware(['auth']);
Route::delete('course/practices-files/{id}/delete', 'CourseController@fileDelete')->name('practices.file.delete')->middleware(['auth']);
Route::get('course/practices-files-name/{id}/file-name', 'CourseController@editFileName')->name('practices.filename.edit')->middleware(['auth']);
Route::put('course/practices-files-update/{id}/file-name', 'CourseController@updateFileName')->name('practices.filename.update')->middleware(['auth']);


//Category
Route::resource('category', 'CategoryController')->middleware(['auth']);
Route::post('categories/order/update', 'CategoryController@orderUpdate')->name('categories.order');

//Subcategory
Route::resource('subcategory', 'SubcategoryController')->middleware(['auth']);
Route::get('content/{id}', 'SubcategoryController@viewcontent')->name('subcategory.viewcontent')->middleware(['auth']);

//Quiz
Route::resource('setquiz', 'QuizSettingsController')->middleware(['auth']);

Route::resource('quizbank', 'QuizBankController')->middleware(['auth']);
Route::get('content/{id}', 'QuizBankController@viewcontent')->name('quizbank.viewcontent')->middleware(['auth']);

//Sub content
Route::resource('subcontent', 'SubContentController')->middleware(['auth']);
Route::get('contents/{id}', 'SubContentController@viewcontent')->name('subcontent.viewcontent')->middleware(['auth']);
Route::delete('contents/{id}/delete', 'SubContentController@fileDelete')->name('subcontent.file.delete')->middleware(['auth']);
Route::post('contents/{id}/update', 'SubContentController@ContentsUpdate')->name('subcontent.update.2')->middleware(['auth']);

//Headers
Route::resource('{id}/headers', 'HeaderController')->middleware(['auth']);
Route::get('header/{id}', 'HeaderController@viewpage')->name('headers.viewpage')->middleware(['auth']);

//Chapters
Route::resource('{course_id}/{id}/chapters', 'ChaptersController')->middleware(['auth']);
Route::delete('chapters/{id}/delete', 'ChaptersController@fileDelete')->name('chapters.file.delete')->middleware(['auth']);
Route::delete('chapters/attachment/{type}/{id}/delete', 'ChaptersController@attachmentDelete')->name('chapters.attachment.destroy')->middleware(['auth']);
Route::post('chapters/{id}/update', 'ChaptersController@ContentsUpdate')->name('chapters.update.2')->middleware(['auth']);
Route::post('chapters/comment/{chapter_id}/{user_id}/create', 'ChapterComments@create')->name('chapters.createcomment');
Route::delete('chapters/comment/{id}/destroy', 'ChapterComments@delete')->name('chapters.deletecomment');
Route::put('chapters/comment/{id}/update', 'ChapterComments@update')->name('chapters.updatecomment');
Route::put('chapters/comment/{student_id}/{comment_id}/like', 'ChapterComments@commentLike')->name('chapters.commentLike');
Route::post('chapters/comment/{student_id}/{comment_id}/reply', 'ChapterComments@commentReply')->name('chapters.commentreply');
Route::post('chapter/order/update', 'ChaptersController@orderUpdate')->name('chapters.order');

//==================================== Custom Landing Page ====================================//
Route::get('/landingpage', 'LandingPageSectionsController@index')->name('custom_landing_page.index')->middleware(
    [
        'auth',
        'XSS',
    ]
);

// Plan Request Module
Route::get('plan_request', 'PlanRequestController@index')->name('plan_request.index')->middleware(['auth','XSS',]);
Route::get('request_frequency/{id}', 'PlanRequestController@requestView')->name('request.view')->middleware(['auth','XSS',]);
Route::get('request_send/{id}', 'PlanRequestController@userRequest')->name('send.request')->middleware(['auth','XSS',]);
Route::get('request_response/{id}/{response}', 'PlanRequestController@acceptRequest')->name('response.request')->middleware(['auth','XSS',]);
Route::get('request_cancel/{id}', 'PlanRequestController@cancelRequest')->name('request.cancel')->middleware(['auth','XSS',]);
// End Plan Request Module

//==================================== Import/Export Data Route====================================//
Route::get('export/course','CourseController@export')->name('course.export');

Route::get('export/order','OrderController@export')->name('order.export');

Route::get('export/product-coupon', 'ProductCouponController@export')->name('product-coupon.export');
Route::get('import/product-coupon/file', 'ProductCouponController@importFile')->name('product-coupon.file.import');
Route::post('import/product-coupon', 'ProductCouponController@import')->name('product-coupon.import');

Route::get('get-students/{course_id}', 'ZoomMeetingController@courseByStudentId')->name('course.by.student.id')->middleware(['auth','XSS']);

//==================================== Slack ====================================//
Route::post('setting/slack','SettingController@slack')->name('slack.setting');

//==================================== Telegram ====================================//
Route::post('setting/telegram','SettingController@telegram')->name('telegram.setting');

//==================================== Recaptcha ====================================//
Route::post('/recaptcha-settings',['as' => 'recaptcha.settings.store','uses' =>'SettingController@recaptchaSettingStore'])->middleware(['auth','XSS']);

//==================================== Download button ====================================//
Route::get('certificate/pdf/{id}', 'StoreController@certificatedl')->name('certificate.pdf')->middleware(['XSS']);

//==================================== Reset-password for store ====================================//
Route::any('store-reset-password/{id}', 'StoreController@ownerPassword')->name('store.reset');
Route::post('store-reset-password/{id}', 'StoreController@ownerPasswordReset')->name('store.password.update');

Route::get('/users', 'UsersController@index')->name('users.index')->middleware(['auth']);
Route::get('/users/create', 'UsersController@create')->name('users.create')->middleware(['auth']);
Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit')->middleware(['auth']);
Route::post('/users', 'UsersController@store')->name('users.store')->middleware(['auth']);
Route::put('/users/{id}', 'UsersController@update')->name('users.update')->middleware(['auth']);
Route::DELETE('/users/{student}', 'UsersController@destroy')->name('users.destroy')->middleware(['auth']);
Route::post('/users/courses/{id}', 'UsersController@coursesupdate')->name('users.coursesupdate')->middleware(['auth']);
Route::put('/users-password/{id}/update', 'UsersController@updatePassword')->name('users.passwordupdate')->middleware(['auth']);
Route::get('/users/import', 'UsersController@import')->name('users.import')->middleware(['auth']);
Route::post('/users/storeImport', 'UsersController@storeImport')->name('users.storeImport')->middleware(['auth']);
Route::get('/users/search-user', 'UsersController@searchUser')->name('users.search')->middleware(['auth']);
Route::post('/users/action', 'UsersController@actionUser')->name('users.action')->middleware(['auth']);
Route::get('export/users','UsersController@export')->name('users.export');
Route::post('/users/student-resend', 'UsersController@resendStudent')->name('users.resend')->middleware(['auth']);

Route::get('integrations', 'IntegrationController@index')->name('integrations.index')->middleware(['auth']);
Route::get('integrations/{slug}', 'IntegrationController@platform_integrations')->name('integrations.platform')->middleware(['auth']);
Route::get('integrations/{platform_id}/create', 'IntegrationController@create')->name('integrations.create')->middleware(['auth']);
Route::get('integrations/{slug}/{integration_id}/edit', 'IntegrationController@edit')->name('integrations.edit')->middleware(['auth']);
Route::delete('integrations/{integration_id}/destroy', 'IntegrationController@destroyIntegration')->name('integrations.destroy')->middleware(['auth']);
Route::get('integrations/{integration_id}/products/create', 'IntegrationController@createProduct')->name('integrations.product.create')->middleware(['auth']);
Route::get('integrations/platform/products/{product_id}/edit', 'IntegrationController@editProduct')->name('integrations.product.edit')->middleware(['auth']);
Route::put('integrations/platform/products/{product_id}/update', 'IntegrationController@updateProduct')->name('integrations.product.update')->middleware(['auth']);
Route::delete('integrations/platform/products/{product_id}/delete', 'IntegrationController@destroyProduct')->name('integrations.product.destroy')->middleware(['auth']);

Route::post('integrations/{platform_id}', 'IntegrationController@store')->name('integrations.store')->middleware(['auth']);
Route::post('integrations/{integration_id}/products', 'IntegrationController@storeProduct')->name('integrations.product')->middleware(['auth']);

Route::get('customization', 'StoreSettingController@index')->name('customization.index')->middleware(['auth']);
Route::post('customization', 'StoreSettingController@store')->name('customization.setting')->middleware(['auth']);
Route::post('customization/create-banners', 'StoreSettingController@storeBanners')->name('customization.createbanners')->middleware(['auth']);
Route::post('customization/create-links', 'StoreSettingController@storeLinks')->name('customization.createlinks')->middleware(['auth']);
Route::delete('customization/banners/{type}/{id}/destroy', 'StoreSettingController@destroyBanners')->name('customization.destroybanners')->middleware(['auth']);
Route::delete('customization/links/{id}/destroy', 'StoreSettingController@destroyLinks')->name('customization.destroylinks')->middleware(['auth']);

Route::get('community/categories', 'CommunityController@showCategories')->name('community.categories')->middleware(['auth']);
Route::get('community/create-category', 'CommunityController@createCategory')->name('community.category.create')->middleware(['auth']);
Route::post('community/create-category', 'CommunityController@storeCategory')->name('community.category.store')->middleware(['auth']);
Route::get('community/spaces', 'CommunityController@showSpaces')->name('community.spaces')->middleware(['auth']);
Route::get('community/create-spaces', 'CommunityController@createSpaces')->name('community.space.create')->middleware(['auth']);
Route::post('community/spaces', 'CommunityController@storeSpace')->name('community.space.store')->middleware(['auth']);
Route::get('community/edit', 'CommunityController@edit')->name('community.edit')->middleware(['auth']);

Route::get('domains', 'DomainController@index')->name('domain.index')->middleware(['auth']);
Route::post('domains/add', 'DomainController@add')->name('domain.add')->middleware(['auth']);
Route::get('domains/destroy/{domain}', 'DomainController@destroy')->name('domain.destroy')->middleware(['auth']);

Route::get('meeting/{platform}', 'MeetingController@index')->name('meeting.index')->middleware(['auth']);
Route::get('meeting/{platform}/create', 'MeetingController@create')->name('meeting.create')->middleware(['auth']);
Route::post('meeting/{platform}', 'MeetingController@store')->name('meeting.store')->middleware(['auth']);
Route::post('meeting/{platform}/create', 'MeetingController@storeMeeting')->name('meeting.storeMeeting')->middleware(['auth']);

Route::get('comments', 'CommentsController@index')->name('comment.index')->middleware(['auth']);
Route::post('comments/{comment}', 'CommentsController@action')->name('comment.action')->middleware(['auth']);
Route::post('comment/reply', 'CommentsController@reply')->name('comment.reply')->middleware(['auth']);
Route::post('comment/search', 'CommentsController@search')->name('comment.reply.2')->middleware(['auth']);
Route::post('comment/settings', 'CommentsController@settings')->name('comment.settings')->middleware(['auth']);

// webhooks
Route::post('webhook', 'WHookController@webhk');
Route::post('whook/{hash}', 'WHookController@PlatformWebhook');

Route::get('users/resender', 'UsersController@resend')->middleware(['auth']);
