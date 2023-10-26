<?php

use App\Http\Controllers\Dashboard\WordController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CarrerController;
use App\Http\Controllers\Front\FeedbackController;
use App\Http\Controllers\Front\GalleryController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\ProjectController;
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

Route::get('/', [\App\Http\Controllers\Front\BaseController::class, 'index'])->name('main');

Route::get('/languages/{loc}', function ($loc) {
        if (in_array($loc, ['ru', 'uz'])) {
                session()->put('locale', $loc);
        }
        return redirect()->back();
})->name('languages');

Route::group(['prefix' => 'dashboard'], function () {
        Route::name('dashboard.')->group(function () {
                //        Dashboard main
                Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');

                //        Project
                Route::resource('/projects', \App\Http\Controllers\Dashboard\ProjectController::class)->except(['show']);

                //        Project Buildings
                Route::get('/project/{id}/buildings', [\App\Http\Controllers\Dashboard\ProjectController::class, 'buildings'])->name('project.buildings');

                //        Project Sliders
                Route::get('/project/{project_id}/slider', [\App\Http\Controllers\Dashboard\SliderController::class, 'crud'])->name('project.sliders');

                //        Project Advantage
                Route::get('/project/{project_id}/advantages', [\App\Http\Controllers\Dashboard\AdvatageController::class, 'index'])->name('project.advantages');
                Route::get('/project/{project_id}/gallery', [\App\Http\Controllers\Dashboard\GalleryController::class, 'index'])->name('project.gallery');

                //        Project PlacesNearby
                Route::get('/project/{project_id}/places_nearby', [\App\Http\Controllers\Dashboard\PlacesNearbyController::class, 'crud'])->name('project.places_nearby');

                //        PlacesNearby
                Route::resource('/places_nearby', \App\Http\Controllers\Dashboard\PlacesNearbyController::class);

                //        Advantages
                Route::get('/project/{project_id}/advantages/create', [\App\Http\Controllers\Dashboard\AdvatageController::class, 'create'])->name('advantages.create');
                Route::resource('/advantages', \App\Http\Controllers\Dashboard\AdvatageController::class)->except('create', 'show', 'index');
                Route::resource('/gallery', \App\Http\Controllers\Dashboard\GalleryController::class)->except('create', 'show', 'index');

                //        Sliders
                Route::resource('/sliders', \App\Http\Controllers\Dashboard\SliderController::class);

                //        Buildings

                Route::resource('/buildings', \App\Http\Controllers\Dashboard\BuildingController::class);

                //        Building plans
                Route::get('/building/{id}/plans', [\App\Http\Controllers\Dashboard\BuildingController::class, 'plans'])->name('building.plans');

                //        Plans
                Route::resource('/plans', \App\Http\Controllers\Dashboard\PlanController::class)->except(['index', 'create']);
                Route::get('/building/{id}/plans/create', [\App\Http\Controllers\Dashboard\PlanController::class, 'create'])->name('plans.create');

                //        Partner
                Route::resource('/partners', \App\Http\Controllers\Dashboard\PartnerController::class)->except(['show', 'create', 'edit']);

                //        Vacancy
                Route::resource('/vacancies', \App\Http\Controllers\Dashboard\VacancyController::class)->except(['show']);

                //       Category Vacancy
                Route::resource('/category_vacancy', \App\Http\Controllers\Dashboard\CategoryVacancyController::class)->only(['store', 'update', 'destroy']);

                //        New Promotion
                Route::resource('/new_promotion', \App\Http\Controllers\Dashboard\NewPromotionController::class)->except(['show']);
                Route::resource('/about', \App\Http\Controllers\Dashboard\AboutController::class)->except(['show','store','destroy']);
                //        Words
                Route::get('dashboard/words', [WordController::class, 'index'])->name('words.index');
        });
});

Route::resource('/projects', \App\Http\Controllers\Front\ProjectController::class)->only(['index', 'show']);
Route::post('/filter', [\App\Http\Controllers\Front\FilterController::class, 'filter']);

Route::view('contacts', 'front.contacts');

Route::resource('/report', NewsController::class);
Route::resource('/projects', ProjectController::class);
Route::resource('/gallery', GalleryController::class);
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/career', [CarrerController::class, 'index'])->name('career.index');
Route::get('/career/{id}/show', [CarrerController::class, 'show'])->name('career.show');
Route::post('/feedback', [FeedbackController::class, 'store']);
// Route::view('about', 'front.about');
// Route::view('gallery', 'front.gallery');
// Route::view('report', 'front.report.data');
// Route::view('report-single', 'front.report.data-single');
// Route::view('career', 'front.career');


require __DIR__ . '/auth.php';
