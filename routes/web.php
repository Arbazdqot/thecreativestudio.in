<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UploadUserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\TeamController;





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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/user',[AdminController::class,'user']);
    Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
    Route::post('admin',[AdminController::class,'store'])->name('admin.store');

    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN',true);
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Succefully');
        return redirect('admin');
    });
    // For user
    Route::get('admin/user',[UserController::class,'index']);
    Route::get('admin/user/delete/{id}',[UserController::class,'delete']);


    // For Category
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/category/managecategory',[CategoryController::class,'managecategory']);
    Route::post('admin/category',[CategoryController::class,'insert'])->name('category.insert');
    Route::get('admin/category/categoryedit/{id}',[CategoryController::class,'categoryedit']);
    Route::post('admin/category/update',[CategoryController::class,'update'])->name('category.update');

    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);

    // Story 
    Route::get('admin/story',[StoryController::class,'index']);
    Route::get('admin/story/managestory',[StoryController::class,'managestory']);
    Route::post('admin/story',[StoryController::class,'insert'])->name('story.insert');
    Route::get('admin/story/delete/{id}', [StoryController::class, 'delete']);
    Route::get('admin/story/status/{status}/{id}', [StoryController::class, 'status']);
    Route::get('admin/story/storyedit/{id}', [StoryController::class, 'storyedit']);
    Route::post('admin/story/update', [StoryController::class, 'update'])->name('story.update');
    Route::get('admin/story/gallery/{id}', [StoryController::class, 'gallery']);
    Route::post('admin/story/galleryinsert', [StoryController::class, 'galleryinsert'])->name('story.galleryinsert');
    

    // Blog
    Route::get('admin/blog',[BlogController::class,'index']);
    Route::get('admin/blog/manageblog',[BlogController::class,'manageblog']);
    Route::post('admin/blog/insert',[BlogController::class,'insert'])->name('blog.insert');
    Route::get('admin/blog/blogedit/{id}',[BlogController::class,'blogedit']);
    Route::post('admin/blog/update',[BlogController::class,'update'])->name('blog.update');
    Route::get('admin/blog/delete/{id}',[BlogController::class,'delete']);
    Route::get('admin/blog/status/{status}/{id}',[BlogController::class,'status']);

    // video
    Route::get('admin/video',[VideoController::class,'index']);
    Route::get('admin/video/managevideo',[VideoController::class,'managevideo']);
    Route::post('admin/video/insert',[VideoController::class,'insert'])->name('video.insert');
    Route::get('admin/video/videoedit/{id}',[VideoController::class,'videoedit']);
    Route::post('admin/video/update',[VideoController::class,'update'])->name('video.update');
    Route::get('admin/video/delete/{id}',[VideoController::class,'delete']);
    Route::get('admin/video/status/{status}/{id}',[VideoController::class,'status']);


    // Upload File

    Route::get('admin/uploaduser',[UploadUserController::class,'index']);
    Route::get('admin/uploaduser/manageuploaduser',[UploadUserController::class,'manageuploaduser']);
    Route::post('admin/uploaduser',[UploadUserController::class,'insert'])->name('uploaduser.insert');
    Route::get('admin/uploaduser/delete/{id}',[UploadUserController::class,'delete']);
    Route::get('admin/uploaduser/download/{filename}', [UploadUserController::class, 'download'])->name('uploaduser.download');
    // Route::get('admin/uploaduser',[UploadUserController::class,'index']);
    // Route::get('admin/uploaduser',[UploadUserController::class,'index']);


    // Banner

    Route::get('admin/banner',             [BannerController::class,'index']);
    Route::get('admin/banner/managebanner',[BannerController::class,'managebanner']);
    Route::post('admin/banner',            [BannerController::class,'insert'])->name('banner.insert');
    Route::get('admin/banner/banneredit/{id}',[BannerController::class,'index']);
    Route::post('admin/banner',             [BannerController::class,'update'])->name('banner.update');
    Route::get('admin/banner/delete/{id}', [BannerController::class,'delete']);

    // Team
    Route::get('admin/team',            [TeamController::class,'index']);
    Route::get('admin/team/manageteam', [TeamController::class,'manageteam']);
    Route::post('admin/team/insert',           [TeamController::class,'insert'])->name('team.insert');
    Route::get('admin/team/delete/{id}',[TeamController::class,'delete']);
    Route::get('admin/team/teamedit/{id}',[TeamController::class,'teamedit']);
    Route::post('admin/team',            [TeamController::class,'update'])->name('team.update');
});



