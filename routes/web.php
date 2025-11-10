<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

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

Route::get('/',[
    FrontController::class,
    'homePage'
])->name('homePage');

Route::get('/syllabus',[
    FrontController::class ,
    'newSyllabus'
])->name('newSyllabus');

Route::get('/class/schedule',[
    FrontController::class ,
    'newClassSchedule'
])->name('newClassSchedule');

Route::get('/exam/schedule',[
    FrontController::class,
    'newExamSchedule'
])->name('newExamSchedule');

Route::get('/semister/plan',[
    FrontController::class,
    'newSemister'
])->name('newSemister');
//academic end

//MarksheetController str
Route::get('/internal/result',[
    FrontController::class,
    'internalResult'
])->name('internalResult');

Route::get('/individual/result',[
    FrontController::class,
    'individualResult'
])->name('individualResult');
//MarksheetController end

//PlacementCellController str
Route::get('/job/placement-cell',[
    FrontController::class,
    'placementCellView'
])->name('placementCellView');

Route::get('/job/needy-student',[
    FrontController::class,
    'jobNeedyStudentView'
])->name('jobNeedyStudentView');
//PlacementCellController end

//GalleryController str
Route::get('/video/gallary',[
    FrontController::class,
    'videoPage'
])->name('videoPage');

Route::get('/image/gallary',[
    FrontController::class,
    'imagePage'
])->name('imagePage');
//GalleryController end

//InstituteController str
Route::get('/about-us',[
    FrontController::class,
    'institutePage'
])->name('institutePage');

Route::get('/principal-speech',[
    FrontController::class,
    'principalSpeechPage'
    ])->name('principalSpeechPage');

     Route::get('/student',[
    FrontController::class,
    'student'
    ])->name('student');

    // student profile detail
    Route::get('/student/{id}', [
        FrontController::class,
        'studentShow'
    ])->whereNumber('id')->name('student.show');

Route::get('/exPrincipal',[
    FrontController::class,
    'exprincipalPage'
    ])->name('exprincipalPage');

Route::get('/our-teacher',[
    FrontController::class,
    'teacherPage'
    ])->name('teacherPage');

// Teacher profile detail
Route::get('/our-teacher/{id}', [
    FrontController::class,
    'teacherShow'
])->whereNumber('id')->name('teacher.show');

Route::get('/our-staff',[
    FrontController::class,
    'staffPage'
    ])->name('staffPage');

Route::get('/our-comittee',[
    FrontController::class,
    'comitteePage'
    ])->name('comitteePage');
    

Route::get('/contact-us',[
    FrontController::class,
    'supportPage'
])->name('supportPage');

// All Notices page
Route::get('/notices', [
    FrontController::class,
    'allNotices'
])->name('allNotices');

Route::post('placementCell/save',[
    FrontController::class ,
    'savePlacementCell'
])->name('savePlacementCell');


Route::post('jobNeedyStudentPanel/save',[
    FrontController::class ,
    'saveNeedyStdPanel'
])->middleware('throttle:10,1')->name('saveNeedyStdPanel');


    //web font end






