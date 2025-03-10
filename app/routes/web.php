<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\AdspositionController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamSetController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SetRequestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuccessStoryController;
use App\Http\Controllers\TeamMemberController;

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


// FRONTEND SECTION
Route::get('/', [FrontendController::class, 'homepage'])->name('home');
Route::get('/home', [FrontendController::class, 'homepage'])->name('homepage');
Route::get( '/course-search', [FrontendController::class, 'courseSearch'])->name('pages.course-search');
Route::get('/course-list/{slug}', [FrontendController::class, 'courseList'])->name( 'pages.course-list');
Route::get('/course-detail/{slug}', [FrontendController::class, 'courseDetail'])->name('pages.course-detail');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('pages.contact-us');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('pages.about-us');
Route::get('/welcome-message', [FrontendController::class, 'welcomeMessage'])->name('pages.welcome-message');
Route::get( '/mission-vision', [FrontendController::class, 'missionVission'])->name('pages.mission-vision');
Route::get('/our-facilities', [FrontendController::class, 'ourFacilities'])->name('pages.our-facilities');
Route::get('/our-team', [FrontendController::class, 'ourTeam'])->name('pages.our-team');
Route::get('/send-enquiry', [FrontendController::class, 'sendEnquiry'])->name('pages.send-enquiry');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('pages.gallery');
Route::get('/testimonial', [FrontendController::class, 'testimonial'])->name('pages.testimonial');
Route::get('/testimonial/detail', [FrontendController::class, 'testimonialDetail'])->name('pages.testimonial.detail');
Route::get('/upcoming-classes', [FrontendController::class, 'upcomingClasses'])->name('pages.classes');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('pages.blog');
Route::get('/blogs/blog-detail', [FrontendController::class, 'blogsDetail'])->name('pages.blog-detail');
Route::get('/career', [FrontendController::class, 'career'])->name('pages.career');
Route::get('/online-admission', [FrontendController::class, 'onlineAdmission'])->name('pages.online-admission');
Route::post('/feedback-store', [FeedbackController::class, 'store'])->name('front.feedback.store');

//message
// Route::get('/admin/message', [MessageController::class,'index']);
Route::get('/student/message-add', [MessageController::class, 'create']);
Route::post('/student/message-store', [MessageController::class, 'store'])->name('student.store');
// Route::get('/admin/message-delet/{id}', [MessageController::class,'deletemessage'])->name('message.delet');
// Route::get('/admin/message-edit/{id}', [MessageController::class,'showmessage'])->name('message.edit');
// Route::post('/admin/message-update/{id}', [MessageController::class,'update'])->name('message.update');
// Route::get('/admin/message/status/{id}', [MessageController::class,'messagestatus'])->name('message.status');

// BACKEND SECTION

Route::middleware(['auth', 'Admin'])->group(function () {

    // Route::get('admin', [App\Http\Controllers\BackendController::class, 'index']) -> name('admin');

//feedback
Route::get('/admin/feedback', [FeedbackController::class, 'index']);
Route::get('/admin/feedback-add', [FeedbackController::class, 'create']);
Route::post('/admin/feedback-store', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/admin/feedback-delet/{id}', [FeedbackController::class, 'deletefeedback'])->name('feedback.delet');
Route::get('/admin/feedback-edit/{id}', [FeedbackController::class, 'showfeedback'])->name('feedback.edit');
Route::post('/admin/feedback-update/{id}', [FeedbackController::class, 'update'])->name('feedback.update');
Route::get('/admin/feedback/status/{id}', [FeedbackController::class, 'feedbackstatus'])->name('feedback.status');

//feed
Route::get('/admin/feed', [FeedController::class, 'index']);
Route::get('/admin/feed-add', [FeedController::class, 'create'])->name('feedbackus');
Route::post('/admin/feed-store', [FeedController::class, 'store'])->name('feed.store');
Route::get('/admin/feed-delet/{id}', [FeedController::class, 'deletefeed'])->name('feed.delet');
Route::get('/admin/feed-edit/{id}', [FeedController::class, 'showfeed'])->name('feed.edit');
Route::post('/admin/feed-update/{id}', [FeedController::class, 'update'])->name('feed.update');
Route::get('/admin/feed/status/{id}', [FeedController::class, 'feedstatus'])->name('feed.status');

    Route::prefix('admin/')->as('admin.')->group(function () {
        Route::resource('examset', ExamSetController::class);
        Route::resource('student', StudentController::class);
        Route::resource('setrequest', SetRequestController::class);
        Route::get('/setrequest/{id}/approve/{status}', [SetRequestController::class, 'status'])->name('setrequest.status');
        Route::resource('question', QuestionController::class);
        Route::post('/question/import', [QuestionController::class, 'import'])->name('question.import');
        Route::get('/sets/{id}/review', [ExamSetController::class, 'setsReview'])->name('sets.review');
        Route::get('/sets/questions/{id}', [QuestionController::class, 'setsQuestions'])->name('setsby.questions');
        Route::get('/sets/{id}/review/{reasult_id}', [ExamSetController::class, 'setsReviewDetail'])->name('sets.review.detail');
    });

    Route::get('/admin', [HomeController::class, 'index'])->name('admin');
    // User
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/add-users', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/store-users', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/delete-users/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    Route::get('/admin/edit-users/{id}', [UserController::class, 'show'])->name('admin.user.edit');
    Route::post('/admin/update-users/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::get('/admin/users/status/{id}', [UserController::class, 'userstatus'])->name('users.status');
    Route::get('/admin/users/role/{id}', [UserController::class, 'userrole'])->name('users.role');
    // Profile
    Route::get('/profile', [App\Http\Controllers\BackendController::class, 'profile'])->name('admin.profile.index');
    Route::post('/profile/{id}', [App\Http\Controllers\BackendController::class, 'profileUpdate'])->name('admin.profile.update');

    //Carousel
    Route::get('/admin/carousel', [CarouselController::class, 'index']);
    Route::get('/admin/carousel-add', [CarouselController::class, 'create']);
    Route::post('/admin/carousel-store', [CarouselController::class, 'store'])->name('carousel.store');
    Route::get('/admin/carousel-delet/{id}', [CarouselController::class, 'deleteCarousel'])->name('carousel.delet');
    Route::get('/admin/carousel-edit/{id}', [CarouselController::class, 'showCarousel'])->name('carousel.edit');
    Route::post('/admin/carousel-update/{id}', [CarouselController::class, 'update'])->name('carousel.update');
    Route::get('/admin/carousel/status/{id}', [CarouselController::class, 'carouselstatus'])->name('carousel.status');
    //ads
    Route::get('/admin/ads', [AdsController::class, 'index'])->name('admin.ads.index');
    Route::get('/admin/ads/add', [AdsController::class, 'create']);
    Route::get('/admin/ads/addlist{id}', [AdsController::class, 'adslist'])->name('adslist.list');
    Route::get('/admin/ads/adsdetail{id}', [AdsController::class, 'adsdetail'])->name('adsdetail');
    Route::post('/admin/ads-store', [AdsController::class, 'store'])->name('ads.store');
    Route::get('/admin/ads-delet/{id}', [AdsController::class, 'deleteads'])->name('ads.delet');
    Route::get('/admin/ads-edit/{id}', [AdsController::class, 'showads'])->name('ads.edit');
    Route::post('/admin/ads-update/{id}', [AdsController::class, 'update'])->name('ads.update');
    Route::get('/admin/ads/status/{id}', [AdsController::class, 'adsstatus'])->name('ads.status');
    Route::post('/admin/ads-edit/sn/{ads_id}', [AdsController::class, 'sn_update'])->name('ads.sn.update');
    //adsposition
    Route::get('/admin/adsposition', [adspositionController::class, 'index'])->name('admin.adsposition.index');
    Route::get('/admin/adsposition/add', [adspositionController::class, 'create']);
    Route::post('/admin/adsposition-store', [adspositionController::class, 'store'])->name('adsposition.store');
    Route::get('/admin/adsposition-delet/{id}', [adspositionController::class, 'deleteadsposition'])->name('adsposition.delet');
    Route::get('/admin/adsposition-edit/{id}', [adspositionController::class, 'showadsposition'])->name('adsposition.edit');
    Route::post('/admin/adsposition-update/{id}', [adspositionController::class, 'update'])->name('adsposition.update');
    Route::get('/admin/adsposition/status/{id}', [adspositionController::class, 'adspositionstatus'])->name('adsposition.status');

    //Income
    Route::get('/admin/income', [IncomeController::class,'index']);
    Route::get('/admin/income/fromclient/{id}', [IncomeController::class,'incomefromclient'])->name('income.fromclient');
    Route::get('/admin/income-add', [IncomeController::class,'create']);
    Route::post('/admin/income-store', [IncomeController::class,'store'])->name('income.store');
    Route::get('/admin/income-delet/{id}', [IncomeController::class,'deleteIncome'])->name('income.delet');
    Route::get('/admin/income-edit/{id}', [IncomeController::class,'showIncome'])->name('income.edit');
    Route::post('/admin/income-update/{id}', [IncomeController::class,'update'])->name('income.update');
    Route::get('/admin/income-filter', [IncomeController::class,'filter'])->name('income.filter');
    Route::get('/admin/income/status/{id}', [IncomeController::class,'Incomestatus'])->name('income.status');
    Route::get('/admin/income/payment_status/{id}', [IncomeController::class,'payment_status'])->name('payment_status.status');

    //category
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/category/add', [CategoryController::class, 'create']);
    Route::post('/admin/category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category-delet/{id}', [CategoryController::class, 'deletecategory'])->name('category.delet');
    Route::get('/admin/category-edit/{id}', [CategoryController::class, 'showcategory'])->name('category.edit');
    Route::post('/admin/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/admin/category/status/{id}', [CategoryController::class, 'categorystatus'])->name('category.status');
    Route::get('/admin/category/nav_display/{id}', [CategoryController::class, 'nav_display'])->name('category.nav.display');
    Route::post('/admin/category-edit/sn/{category_id}', [CategoryController::class, 'sn_update'])->name('category.sn.update');

    //subcategory
    Route::get('/admin/subcategory', [SubcategoryController::class, 'index'])->name('admin.subcategory.index');
    Route::get('/admin/subcategory/add', [SubcategoryController::class, 'create']);
    Route::post('/admin/subcategory-store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/admin/subcategory-delet/{id}', [SubcategoryController::class, 'deletesubcategory'])->name('subcategory.delet');
    Route::get('/admin/subcategory-edit/{id}', [SubcategoryController::class, 'showsubcategory'])->name('subcategory.edit');
    Route::post('/admin/subcategory-update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/admin/subcategory/status/{id}', [SubcategoryController::class, 'subcategorystatus'])->name('subcategory.status');

    //country
    Route::get('/admin/country', [CountryController::class, 'index']);
    Route::get('/admin/country-add', [CountryController::class, 'create']);
    Route::post('/admin/country-store', [CountryController::class, 'store'])->name('country.store');
    Route::get('/admin/country-delet/{id}', [CountryController::class, 'deleteCountry'])->name('country.delet');
    Route::get('/admin/country-edit/{id}', [CountryController::class, 'showCountry'])->name('country.edit');
    Route::post('/admin/country-update/{id}', [CountryController::class, 'update'])->name('country.update');
    Route::get('/admin/country/status/{id}', [CountryController::class, 'countrystatus'])->name('country.status');

    //post
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('/admin/post/add', [PostController::class, 'create']);
    Route::post('/admin/post-store', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/post-delet/{id}', [PostController::class, 'deletepost'])->name('post.delet');
    Route::get('/admin/post-edit/{id}', [PostController::class, 'showpost'])->name('post.edit');
    Route::post('/admin/post-update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/admin/post/status/{id}', [PostController::class, 'poststatus'])->name('post.status');
    Route::get('/admin/post/is_featured/{id}', [PostController::class, 'is_featured'])->name('post.is_featured');
    //courses
    Route::get('/admin/courses', [CoursesController::class, 'index']);
    Route::get('/admin/courses-add', [CoursesController::class, 'create']);
    Route::post('/admin/courses-store', [CoursesController::class, 'store'])->name('courses.store');
    Route::get('/admin/courses-delet/{id}', [CoursesController::class, 'deletecourses'])->name('courses.delet');
    Route::get('/admin/courses-edit/{id}', [CoursesController::class, 'showcourses'])->name('courses.edit');
    Route::post('/admin/courses-update/{id}', [CoursesController::class, 'update'])->name('courses.update');
    Route::get('/admin/courses/status/{id}', [CoursesController::class, 'coursesstatus'])->name('courses.status');

    //Setting
    Route::get('/admin/setting', [SettingController::class, 'index']);
    Route::get('/admin/setting-add', [SettingController::class, 'create']);
    Route::post('/admin/setting-store', [SettingController::class, 'store'])->name('setting.store');
    Route::get('/admin/setting-delet/{id}', [SettingController::class, 'deletesetting'])->name('setting.delet');
    Route::get('/admin/setting-edit/{id}', [SettingController::class, 'showsetting'])->name('setting.edit');
    Route::post('/admin/setting-update/{id}', [SettingController::class, 'update'])->name('setting.update');
    Route::get('/admin/setting/status/{id}', [SettingController::class, 'settingstatus'])->name('setting.status');

    //college
    Route::get('/admin/college', [CollegeController::class, 'index']);
    Route::get('/admin/college-add', [CollegeController::class, 'create']);
    Route::post('/admin/college-store', [CollegeController::class, 'store'])->name('college.store');
    Route::get('/admin/college-delet/{id}', [CollegeController::class, 'deletecollege'])->name('college.delet');
    Route::get('/admin/college-edit/{id}', [CollegeController::class, 'showcollege'])->name('college.edit');
    Route::post('/admin/college-update/{id}', [CollegeController::class, 'update'])->name('college.update');
    Route::get('/admin/college/status/{id}', [CollegeController::class, 'collegestatus'])->name('college.status');

    //gallery
    Route::get('/admin/gallery', [GalleryController::class, 'index']);
    Route::get('/admin/gallery-add', [GalleryController::class, 'create']);
    Route::post('/admin/gallery-store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/admin/gallery-delet/{id}', [GalleryController::class, 'deletegallery'])->name('gallery.delet');
    Route::get('/admin/gallery-edit/{id}', [GalleryController::class, 'showgallery'])->name('gallery.edit');
    Route::post('/admin/gallery-update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('/admin/gallery/status/{id}', [GalleryController::class, 'gallerystatus'])->name('gallery.status');

    //links
    Route::get('/admin/links', [LinksController::class, 'index']);
    Route::get('/admin/links-add', [LinksController::class, 'create']);
    Route::post('/admin/links-store', [LinksController::class, 'store'])->name('links.store');
    Route::get('/admin/links-delet/{id}', [LinksController::class, 'deletelinks'])->name('links.delet');
    Route::get('/admin/links-edit/{id}', [LinksController::class, 'showlinks'])->name('links.edit');
    Route::post('/admin/links-update/{id}', [LinksController::class, 'update'])->name('links.update');
    Route::get('/admin/links/status/{id}', [LinksController::class, 'linksstatus'])->name('links.status');

    //video
    Route::get('/admin/video', [VideoController::class, 'index']);
    Route::get('/admin/video-add', [VideoController::class, 'create']);
    Route::post('/admin/video-store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/admin/video-delet/{id}', [VideoController::class, 'deletevideo'])->name('video.delet');
    Route::get('/admin/video-edit/{id}', [VideoController::class, 'showvideo'])->name('video.edit');
    Route::post('/admin/video-update/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::get('/admin/video/status/{id}', [VideoController::class, 'videostatus'])->name('video.status');

    //message
    Route::get('/admin/message', [MessageController::class, 'index']);
    Route::get('/admin/message-add', [MessageController::class, 'create']);
    Route::post('/admin/message-store', [MessageController::class, 'store'])->name('message.store');
    Route::get('/admin/message-delet/{id}', [MessageController::class, 'deletemessage'])->name('message.delet');
    Route::get('/admin/message-edit/{id}', [MessageController::class, 'showmessage'])->name('message.edit');
    Route::post('/admin/message-update/{id}', [MessageController::class, 'update'])->name('message.update');
    Route::get('/admin/message/status/{id}', [MessageController::class, 'messagestatus'])->name('message.status');
    Route::as('admin.')->group(function () {
        Route::resource('success_stories', SuccessStoryController::class);
        Route::resource('team', TeamMemberController::class);
    });
});

Auth::routes();
Route::get('/users/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');


Route::get('/exam/form', [ExamController::class, 'form'])->name('exam.form');
Route::get('/exam/sets', [ExamController::class, 'sets'])->name('exam.sets');
Route::prefix('exam')->as('exam.')->middleware('auth')->group(function () {
    Route::post('/form', [StudentController::class, 'store'])->name('form.store');
    Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
    Route::post('/profile', [FrontendController::class, 'updateProfile'])->name('profile.update');
    // for student
    Route::middleware('is_student')->group(function () {

        Route::get('/request/{id}', [SetRequestController::class, 'store'])->name('setrequest.store');
        Route::get('/sets/{id}/review', [ExamController::class, 'setsReview'])->name('sets.review');
        Route::get('/sets/{id}/review/{reasult_id}', [ExamController::class, 'setsReviewDetail'])->name('sets.review.detail');
        Route::post('/reasult-check', [ExamController::class, 'checkReasult'])->name('checkreasult');
        Route::get('/questions/{set_id}', [ExamController::class, 'questions'])->name('questions');
    });
});

