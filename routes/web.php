<?php

use App\Http\Controllers\PlatformAcademicDirection\SponsorshipController;
use App\Http\Controllers\PlatformAcademicDirection\StudentController as PlatformAcademicDirectionStudentController;
use App\Http\Controllers\PlatformAcademicDirection\SubjectController as PlatformAcademicDirectionSubjectController;
use App\Http\Controllers\PlatformAdmin\CampusController;
use App\Http\Controllers\PlatformAdmin\UserController;
use App\Http\Controllers\PlatformAdmin\PromotionController;
use App\Http\Controllers\PlatformAdmin\ProfessorController;
use App\Http\Controllers\PlatformAdmin\SubjectController as PlatformAdminSubjectController;
use App\Http\Controllers\PlatformPedagogy\ProfessorController as PlatformPedagogyProfessorController;
use App\Http\Controllers\PlatformPedagogy\StudentController;
use App\Http\Controllers\PlatformStudent\ExamHistoryController;
use App\Http\Controllers\PlatformStudent\ExamQuestionController;
use App\Http\Controllers\PlatformStudent\GradebookController;
use App\Http\Controllers\PlatformStudent\SubjectController;
use App\Http\Controllers\SearchController;
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

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('search_students', [SearchController::class, 'searchStudents'])->name('search.students');
    Route::get('search_subjects', [SearchController::class, 'searchSubjects'])->name('search.subjects');

    Route::prefix('platform_administrator')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('campuses', CampusController::class)->except('destroy');
        Route::resource('promotions', PromotionController::class)->except('destroy');
        Route::resource('professors', ProfessorController::class)->except('destroy');
        Route::resource('admin_subjects', PlatformAdminSubjectController::class)->except('destroy');
    });

    Route::prefix('platform_student')->group(function () {
        Route::resource('subjects', SubjectController::class)->except('destroy');
        Route::get('gradebooks', [GradebookController::class, 'show'])->name('gradebooks.show');
        Route::get('exams/{exam_id}/exam_questions/{exam_question}', [ExamQuestionController::class, 'show'])->name('questions.show');
        Route::get('exams/{exam_id}/exam_historic', [ExamHistoryController::class, 'show'])->name('exam_history.show');
        Route::post('exams/{exam_id}/exam_questions/{exam_question}/answers', [ExamHistoryController::class, 'store'])->name('exam_history.store');

    });

    Route::prefix('platform_pedagogy')->group(function () {
        Route::resource('students', StudentController::class)->except('destroy');
        Route::resource('professors_campus', PlatformPedagogyProfessorController::class)->except('destroy');
    });

    Route::prefix('platform_academic_direction')->group(function () {
        Route::resource('academic_students', PlatformAcademicDirectionStudentController::class)->except('destroy');
        Route::resource('academic_subjects', PlatformAcademicDirectionSubjectController::class)->except('destroy');
        Route::resource('sponsorships', SponsorshipController::class)->except('destroy');
    });
});
