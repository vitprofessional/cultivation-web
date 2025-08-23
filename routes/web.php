<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\MarksheetController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PlacementCellController;

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
    AcademicController::class ,
    'newSyllabus'
])->name('newSyllabus');

Route::get('/class/schedule',[
    AcademicController::class ,
    'newClassSchedule'
])->name('newClassSchedule');

Route::get('/exam/schedule',[
    AcademicController::class,
    'newExamSchedule'
])->name('newExamSchedule');

Route::get('/semister/plan',[
    AcademicController::class,
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

Route::get('/exPrincipal',[
    FrontController::class,
    'exprincipalPage'
    ])->name('exprincipalPage');

Route::get('/our-teacher',[
    FrontController::class,
    'teacherPage'
    ])->name('teacherPage');

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

Route::post('admin/placement/placementCell/save',[
    PlacementCellController::class ,
    'savePlacementCell'
])->name('savePlacementCell');


Route::post('admin/placement/needyStudentPanel/save',[
    PlacementCellController::class ,
    'saveNeedyStdPanel'
])->name('saveNeedyStdPanel');


    //web font end






