<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RestrictedAccess;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\FileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleCommentController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Middleware\CheckDownloadPermission;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\UserTicketController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Home\CouponController as ApplyCoupon;
use App\Http\Controllers\Home\ArticleController as ArticleHome;
use App\Http\Controllers\Home\CommentController as SendComment;
use App\Http\Controllers\Home\CategoryController as CategoryHome;
use App\Http\Controllers\Home\CourseController as ShowCoursePage;

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

//Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'] , 'role:admin|writer|support')->group(function(){
    Route::get('/', [AdminController::class , 'index'])->middleware('role:admin|writer|support')->name('admin_index');
    Route::resource('/courses' , CourseController::class)->middleware('role:admin');
    Route::get('/courses/managment/{course}' , [CourseController::class , 'managment'])->middleware('role:admin')->name('managment-course');
    Route::post('/courses/managment/{course}/store' , [CourseController::class , 'managment_store'])->middleware('role:admin')->name('managment-store');
    Route::get('/courses/managment/{course}/edit' , [CourseController::class , 'managment_edit'])->middleware('role:admin')->name('managment-edit');
    Route::get('/courses/managment/edit/video/{video}' , [CourseController::class , 'managment_edit_video'])->middleware('role:admin')->name('managment-edit-video');
    Route::put('/courses/managment/update/video/{video}' , [CourseController::class , 'managment_update_video'])->middleware('role:admin')->name('managment-update-video');
    Route::delete('/courses/managment/{video}/delete' , [CourseController::class , 'managment_delete'])->middleware('role:admin')->name('managment-delete');
    Route::get('/courses/sidebar/{course}/add' , [CourseController::class , 'sidebar'])->middleware('role:admin')->name('sidebar-course');
    Route::post('/courses/sidebar/{course}/create' , [CourseController::class , 'addSidebar'])->middleware('role:admin')->name('add-sidebar-course');
    Route::get('/courses/sidebar/{course}/edit' , [CourseController::class , 'editSidebar'])->middleware('role:admin')->name('edit-sidebar-course');
    Route::put('/courses/sidebar/{course}/update' , [CourseController::class , 'updateSidebar'])->middleware('role:admin')->name('update-sidebar-course');
    Route::any('/courses/sidebar/{course}/delete' , [CourseController::class , 'deleteSidebar'])->middleware('role:admin')->name('delete-sidebar-course');

    Route::resource('/users' , UserController::class)->middleware('role:admin');
    Route::get('/users-courses' , [UserController::class , 'usersCourses'])->middleware('role:admin')->name('users-courses');
    Route::get('/users-courses/edit/{id}' , [UserController::class , 'usersCoursesEdit'])->middleware('role:admin')->name('users-courses-edit');
    Route::put('/users-courses/update/{id}' , [UserController::class , 'usersCoursesUpdate'])->middleware('role:admin')->name('users-courses-update');
    Route::resource('/permissions' , PermissionController::class)->middleware('role:admin');
    Route::resource('/roles' , RoleController::class)->middleware('role:admin');
    Route::resource('/categories' , CategoryController::class)->middleware('role:admin');
    Route::resource('/articles' , ArticleController::class)->middleware('role:admin|writer|support');
    // Route::resource('/ads' , AdController::class)->middleware('role:admin|writer|support');

    Route::resource('/comments' , CommentController::class)->middleware('role:admin|support');
    Route::get('/comments/reply/{comment}' , [CommentController::class , 'reply_comment'])->middleware('role:admin|support')->name('reply-comment');
    Route::put('/comments/reply/{comment}' , [CommentController::class , 'reply_comment_post'])->middleware('role:admin|support')->name('reply-comment-post');
    Route::get('/comments/approve/{comment}' , [CommentController::class , 'approve_status'])->middleware('role:admin|support')->name('approve-status');
    Route::get('/comments/no-approve/{comment}' , [CommentController::class , 'no_approve_status'])->middleware('role:admin|support')->name('no-approve-status');

    Route::get('/article-comments' , [ArticleCommentController::class , 'index'])->middleware('role:admin|support|writer')->name('article.comments');
    Route::get('/article-comments-edit/{comment}' , [ArticleCommentController::class , 'edit'])->middleware('role:admin|support|writer')->name('article.comments.edit');
    Route::put('/article-comments-update/{comment}' , [ArticleCommentController::class , 'update'])->middleware('role:admin|support|writer')->name('article.comments.update');
    Route::get('/article-comments/reply/{comment}' , [ArticleCommentController::class , 'reply_comment'])->middleware('role:admin|support|writer')->name('article-reply-comment');
    Route::put('/article-comments/reply/{comment}' , [ArticleCommentController::class , 'reply_comment_post'])->middleware('role:admin|support|writer')->name('article-reply-comment-post');
    Route::get('/article-comments/approve/{comment}' , [ArticleCommentController::class , 'approve_status'])->middleware('role:admin|support|writer')->name('article-approve-status');
    Route::get('/article-comments/no-approve/{comment}' , [ArticleCommentController::class , 'no_approve_status'])->middleware('role:admin|support|writer')->name('article-no-approve-status');
    Route::any('/article-comments/delete/{comment}' , [ArticleCommentController::class , 'delete'])->middleware('role:admin|support|writer')->name('article.comments.delete');

    Route::resource('/tickets' , TicketController::class)->middleware('role:admin|support');
    Route::get('/tickets/reply/{ticket:slug}' , [TicketController::class , 'get_tickets'])->middleware('role:admin|support')->name('get.reply.ticket');
    Route::post('/tickets/reply/{ticket:slug}' , [TicketController::class , 'reply'])->middleware('role:admin|support')->name('reply.ticket');
    Route::get('/tickets/close/{ticket}' , [TicketController::class , 'change_status'])->middleware('role:admin|support')->name('change.status.ticket');

    Route::resource('/coupons' , CouponController::class)->middleware('role:admin');
    Route::resource('/transactions' , TransactionController::class)->middleware('role:admin');
    Route::resource('/notification-management' , NotificationController::class)->middleware('role:admin');
    Route::resource('/admin-information' , InformationController::class)->middleware('role:admin|writer|support');
    Route::get('/website-setting' , [WebsiteSettingController::class , 'index'])->name('web.setting.index')->middleware('role:admin');
    Route::put('/website-setting' , [WebsiteSettingController::class , 'update'])->name('web.setting.update')->middleware('role:admin');

    //statement
    Route::get('/statement/edit' , [AdminController::class , 'statement_edit'])->middleware('role:admin')->name('statement.edit');
    Route::put('/statement/update' , [AdminController::class , 'statement_update'])->middleware('role:admin')->name('statement.update');
});


//Home
Route::get('/', [HomeController::class , 'index'])->name('home.index');
Route::get('/login', [HomeController::class , 'login'])->name('my.login.page');
Route::get('/courses', [ShowCoursePage::class , 'index'])->name('course.index');
Route::get('/course/{course:slug}', [ShowCoursePage::class , 'course_page'])->name('home.course');
Route::post('/send-comment/{course:id}', [SendComment::class , 'send_comment'])->name('home.send.comment');
Route::post('/send-article-comment/{article:id}', [SendComment::class , 'sendArticleComment'])->name('home.send.article.comment');
Route::post('/send-email', [HomeController::class , 'sendEmail'])->name('home.send.email');

Route::get('/article/{article:slug}', [ArticleHome::class , 'article_page'])->name('home.article');
Route::get('/category/{category:slug}', [CategoryHome::class , 'category_page'])->name('home.category');
Route::get('/articles', [ArticleHome::class , 'articles'])->name('home.page.article');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth', 'verified']);
Route::get('/profile/information', [ProfileController::class, 'information'])->name('profile.information')->middleware(['auth', 'verified']);
Route::put('/profile/information', [ProfileController::class, 'information_update'])->name('profile.information.update')->middleware(['auth', 'verified']);
Route::get('/profile/tickets', [UserTicketController::class , 'index'])->name('home.ticket.index')->middleware(['auth', 'verified']);
Route::get('/profile/tickets/create', [UserTicketController::class , 'create'])->name('home.ticket.create')->middleware(['auth', 'verified']);
Route::post('/profile/tickets/store', [UserTicketController::class , 'store'])->name('home.ticket.store')->middleware(['auth', 'verified']);
Route::get('/profile/tickets/show/{ticket:slug}', [UserTicketController::class , 'show'])->name('home.ticket.show')->middleware(['auth', 'verified']);
Route::post('/profile/tickets/reply/{ticket:slug}', [UserTicketController::class , 'reply'])->name('home.ticket.reply')->middleware(['auth', 'verified']);
Route::get('/profile/carts' , [CartController::class , 'index'])->name('carts.index')->middleware(['auth', 'verified']);
Route::post('/profile/paymant/geteway' , [PaymentController::class , 'paymentGateway'])->name('payment.gateway')->middleware(['auth', 'verified']);
Route::any('/profile/paymant/callback' , [PaymentController::class , 'callback'])->name('payment.callback')->middleware(['auth', 'verified']);
Route::get('/profile/my-courses' , [ProfileController::class , 'my_courses'])->name('mycourses')->middleware(['auth', 'verified']);

Route::any('/add/to/carts/{course}' , [CartController::class , 'add'])->name('add.to.cart')->middleware(['auth', 'verified']);
Route::any('/delete/from/carts/{course}' , [CartController::class , 'destroy'])->name('destroy.from.cart')->middleware(['auth', 'verified']);
Route::get('/contact-us' , [ContactController::class , 'index'])->name('contact.index');
Route::post('/apply-coupon' , [ApplyCoupon::class , 'applyCoupon'])->name('apply.coupon');
Route::get('/download/video/{video_url}' , [FileController::class , 'download'])->name('file.download')->middleware([CheckDownloadPermission::class]);
Route::get('/episode/{video_url}' , [FileController::class , 'access'])->name('file.access');
Route::get('/search' , [HomeController::class , 'search'])->name('home.search');
Route::get('/search' , [HomeController::class , 'search'])->name('home.search');
Route::any('/join/to/course/{course}' , [PaymentController::class , 'freeCourse'])->name('join.to.course')->middleware(['auth', 'verified']);


// Route::get('/public/course_video/{url}', function () {
//     return redirect(route('home.index'));
// })->middleware(['auth', CheckDownloadPermission::class]);


//Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
