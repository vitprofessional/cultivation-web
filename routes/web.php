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
    MarksheetController::class,
    'internalResult'
])->name('internalResult');

Route::get('/individual/result',[
    MarksheetController::class,
    'individualResult'
])->name('individualResult');
//MarksheetController end

//PlacementCellController str
Route::get('/job/placement-cell',[
    PlacementCellController::class,
    'placementCellView'
])->name('placementCellView');

Route::get('/job/needy-student',[
    PlacementCellController::class,
    'jobNeedyStudentView'
])->name('jobNeedyStudentView');
//PlacementCellController end

//GalleryController str
Route::get('/video/gallary',[
    GalleryController::class,
    'videoPage'
])->name('videoPage');

Route::get('/image/gallary',[
    GalleryController::class,
    'imagePage'
])->name('imagePage');
//GalleryController end

//InstituteController str
Route::get('/about-us',[
    InstituteController::class,
    'institutePage'
])->name('institutePage');

Route::get('/principal-speech',[
    InstituteController::class,
    'principalSpeechPage'
    ])->name('principalSpeechPage');

     Route::get('/student',[
    InstituteController::class,
    'student'
    ])->name('student');

Route::get('/exPrincipal',[
    InstituteController::class,
    'exprincipalPage'
    ])->name('exprincipalPage');

Route::get('/our-teacher',[
    InstituteController::class,
    'teacherPage'
    ])->name('teacherPage');

Route::get('/our-staff',[
    InstituteController::class,
    'staffPage'
    ])->name('staffPage');

Route::get('/our-comittee',[
    InstituteController::class,
    'comitteePage'
    ])->name('comitteePage');
    

Route::get('/contact-us',[
    InstituteController::class,
    'supportPage'
])->name('supportPage');

Route::post('/admin/placement/placementCell/save',[
    PlacementCellController::class ,
    'savePlacementCell'
])->name('savePlacementCell');


Route::post('/admin/placement/needyStudentPanel/save',[
    PlacementCellController::class ,
    'saveNeedyStdPanel'
])->name('saveNeedyStdPanel');


    //web font end






