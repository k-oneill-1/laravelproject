<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;


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

Route::inertia("/", "Register");

// get
Route::inertia("/login", "Login");



// Route::get('/login', function(){
// return Inertia::render("Login");
// });


Route::post("/login", [TestController::class, 'login']);

Route::post("/register", [TestController::class, 'register']);

Route::get('/about', [TestController::class, 'index']);

Route::post("/newsletter", [TestController::class, 'subscribe']);




Route::middleware('checksuser')->group(function(){
    Route::get("/dashboard", [DashboardController::class, 'index']);
    //Route::get('/dashboard', [DashboardController::class, 'createBlog']); unused from Adi prject

    Route::get("/dashboard", [FoodController::class, 'CreateFood']);
    Route::inertia('/create-food', 'CreateFood');
    //need one to post to databse (daily_records)
    

    //Route::inertia('/create-blog', 'CreateBlog'); UNUSED FROM Adi Project.
    //Route::post('/create-blog', [DashboardController::class, 'createBlog']); unused from Adi projec,t I need one like it
    

    Route::get('/dashboard/blog/{slug}', [DashboardController::class, 'showBlog']);

    Route::get("/blog/edit/{id}", [DashboardController::class, 'editBlog']);
    Route::get("/blog/delete/{id}", [DashboardController::class, 'deleteBlog']);

    
 
});







