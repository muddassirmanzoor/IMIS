<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IMISController;
use App\Http\Controllers\ASPController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComponentOneController;
use App\Http\Controllers\ComponentTwoController;
use App\Http\Controllers\ComponentFourController;
use App\Http\Controllers\ComponentFiveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PEFController;
use App\Http\Controllers\LNFBDController;
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
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'checkLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

//API End point for testing
Route::get('/getSchools', [\App\Http\Controllers\api\LiteracyController::class, 'getSchoolData']);
//Route::get('/getUpdatedSchoolData', [\App\Http\Controllers\api\LiteracyController::class, 'getUpdatedSchoolData']);
Route::get('/getSuccessFlagLearnerData', [\App\Http\Controllers\api\LiteracyController::class, 'getSuccessFlagLearnerData']);
Route::get('/getSuccessFlagSchoolData', [\App\Http\Controllers\api\LiteracyController::class, 'getSuccessFlagSchoolData']);
//Route::get('/getLearnersData/{id}', [\App\Http\Controllers\api\LiteracyController::class, 'getLearnersData']);
Route::get('/getUpdatedLearnersData', [\App\Http\Controllers\api\LiteracyController::class, 'getUpdatedLearnersData']);
//Route::get('/getTeachersData', [\App\Http\Controllers\api\LiteracyController::class, 'getTeachersData']);
Route::get('/getUpdatedTeachersData', [\App\Http\Controllers\api\LiteracyController::class, 'getUpdatedTeachersData']);

//Route::get('getPEFSchools', [\App\Http\Controllers\api\FoundationController::class, 'getSchoolData']);
//Route::get('getStudentsData/{district}', [\App\Http\Controllers\api\FoundationController::class, 'getStudentsData']);
//Route::get('getTeachersData', [\App\Http\Controllers\api\FoundationController::class, 'getTeachersData']);


Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'],'schools', [IMISController::class, 'schools']);
    Route::match(['get', 'post'], 'students',[IMISController::class, 'students']);
    Route::match(['get', 'post'], 'teachers',[IMISController::class, 'teachers']);

    Route::match(['get', 'post'],'dashboard', [DashboardController::class, 'imis']);
    Route::get('about-school', [IMISController::class, 'aboutSchool']);
    Route::get('class-list/{schoolId}', [IMISController::class, 'classList']);
    Route::get('about-class/{schoolId}/{classId}', [IMISController::class, 'aboutClass']);
    Route::get('about-student/{studentId}', [IMISController::class, 'aboutStudent']);
    Route::get('pdf-student/{studentId}', [IMISController::class, 'pdfStudent']);


    Route::post('schools-listing', [IMISController::class, 'schoolsListing']);
    Route::post('teachers-listing', [IMISController::class, 'teachersListing']);
    Route::post('students-listing', [IMISController::class, 'studentsListing']);
    Route::post('search-sed-student', [IMISController::class, 'searchSEDStudent']);

    Route::prefix('pef')->group(function () {
        Route::get('district/teacher-list/{district_id}', [PEFController::class, 'districtTeacherList']);
    });

    Route::prefix('lnfbd')->group(function () {
        Route::get('{level}/student-list/{district_id}', [LNFBDController::class, 'districtStudentList']);
    });

	/************User pages Start***********/
	Route::get('user', function () {
        return view('user/add-user');
    });
	Route::get('user-list', function () {
        return view('user/user-list');
    });
	Route::get('edit-user', function () {
        return view('user/edit-user');
    });

	/************User pages End***********/
	/************User Role pages Start***********/
	Route::get('add-role', function () {
        return view('role/add-role');
    });
	Route::get('edit-role', function () {
        return view('role/edit-role');
    });

	/************User pages End***********/
    Route::prefix('census')->group(function () {
        Route::get('/', function () {
            return view('census.census');
        });
        Route::get('teacher-census', function () {
            return view('census.teacher-census');
        });
        Route::get('student-census', function () {
            return view('census.student-census');
        });
        Route::get('school-census', function () {
            return view('census.school-census');
        });
    });

    Route::prefix('asp')->group(function () {
        Route::get('schools', [ASPController::class, 'schools']);
        Route::get('students', [ASPController::class, 'students']);
        Route::get('teachers', [ASPController::class, 'teachers']);
    });

    Route::prefix('component1')->group(function () {
        Route::get('CPDP', [ComponentOneController::class, 'cpdp']);
        Route::get('OOSC', [ComponentOneController::class, 'oosc']);
        Route::get('NFEI', [ComponentOneController::class, 'nfei']);
        Route::get('OOSC_2024/{district?}/{tehsil?}/{markaz?}', [ComponentOneController::class, 'oosc_2024'])->name('OOSC_2024');
    });
    Route::get('OOSC_2024/{district?}/{tehsil?}/{markaz?}', [ComponentOneController::class, 'oosc_2024'])->name('OOSC_2024');

    Route::prefix('fln')->group(function () {
        Route::get('camps-attendance/{district?}/{tehsil?}/{markaz?}', [ComponentOneController::class, 'campsAttendance'])->name('camps-attendance');
        Route::get('camps-complaints/{district?}/{tehsil?}/{markaz?}', [ComponentOneController::class, 'campsComplaints'])->name('camps-complaints');
        Route::post('resolve-complaint', [ComponentOneController::class, 'resolveComplaint'])->name('resolve-complaint');
        Route::post('camps-listing', [ComponentOneController::class, 'campsListing'])->name('camps-listing');
        Route::post('district-wise-enrollment', [ComponentOneController::class, 'districtWiseEnrollment'])->name('district-wise-enrollment');
        Route::get('district-enrollment-list/{district}/{tehsil?}/{markaz?}', [ComponentOneController::class, 'districtEnrollmentList'])
            ->name('district-enrollment-list');
        Route::get('oosc-enrollment-list/{district}/{tehsil?}/{markaz?}', [ComponentOneController::class, 'ooscEnrollmentList'])
            ->name('oosc-enrollment-list');
    });

    Route::prefix('component2')->group(function () {
        Route::get('IEI', [ComponentTwoController::class, 'iei']);
        Route::get('SPED', [ComponentTwoController::class, 'sped']);
    });
    Route::prefix('component4')->group(function () {
        Route::get('ASP', [ComponentFourController::class, 'asp']);
    });
    Route::prefix('component5')->group(function () {
        Route::get('COMMS', [ComponentFiveController::class, 'comms']);
		Route::get('back-to-school', [ComponentFiveController::class, 'backtoSchool']);
		Route::get('resource-material', [ComponentFiveController::class, 'resourceMaterial']);
		Route::get('policy-dialogue', [ComponentFiveController::class, 'policyDialogue']);
		Route::get('community-mobilization', [ComponentFiveController::class, 'communityMobilization']);
		Route::get('school-council-campaign', [ComponentFiveController::class, 'schoolCouncilCampaign']);
    });
    Route::middleware(['role:Super Admin|Admin'])->group(function () {
        Route::get('users', [UserController::class, 'index']);
    });
});
