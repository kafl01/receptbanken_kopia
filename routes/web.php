<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\FrontpageController;

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
//     return view('frontpage');
// });

Auth::routes();

Route::resource('/', FrontpageController::class);
Route::resource('/recipes', RecipeController::class);
// Route::resource('/recipes/', RecipeController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/ingredients', IngredientController::class);

Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware('auth')->group(function () {
    Route::get('/home', [FrontPageController::class, 'index'])->name('home');
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('create');
    Route::get('/recipes/edit', [RecipeController::class, 'edit'])->name('edit');
});
