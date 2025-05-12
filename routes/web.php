<?php

use App\Models\People;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\GroupAssignController;
use App\Http\Controllers\OtherIncomeController;
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\EnrolledStudentController;
use App\Http\Controllers\TeacherSettingsController;
use App\Http\Controllers\AcademicPlanningController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentEnrollmentController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();


Route::middleware(['atlantis_menu', 'setSessionData'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /**Administration*/

    //Users
    Route::resource('administration/users', UserController::class);
    Route::get('administration/get-users', [UserController::class, 'getUserData']);


    //Roles
    Route::resource('administration/roles', RoleController::class);

    //Group User
    Route::resource('administration/group_users', GroupUserController::class);
    Route::get('administration/get-groups', [GroupUserController::class, 'getGroupUserData']);


    //People
    Route::resource('administration/people', PeopleController::class);
    Route::get('administration/get-people', [PeopleController::class, 'getPeopleData']);


    //Group Assign
    Route::resource('administration/group_assign', GroupAssignController::class);

    /**Registration */

    // Teachers
    Route::resource('registration/teachers', TeacherController::class);
    Route::get('registration/get-teachers', [TeacherController::class, 'getTeachersData']);

    //Degrees
    Route::resource('registration/degrees', DegreeController::class);
    Route::get('registration/get-degrees', [DegreeController::class, 'getDegreesData']);

    //Subjets
    Route::resource('registration/subjects', SubjectController::class);
    Route::get('registration/get-subjects', [SubjectController::class, 'getSubjectsData']);

    //Classrooms
    Route::resource('registration/classrooms', ClassroomController::class);
    Route::get('registration/get-classrooms', [ClassroomController::class, 'getClassroomsData']);

    //Teacher Settings
    Route::resource('registration/teacher_settings', TeacherSettingsController::class);

    //Academic Planning
    Route::resource('registration/academic_planning', AcademicPlanningController::class);

    //Student Enrollments
    Route::resource('registration/student_enrollments', StudentEnrollmentController::class);

    //Other Income
    Route::resource('registration/other_income', OtherIncomeController::class);

    //Administrative
    Route::resource('registration/administrative', AdministrativeController::class);

    //Enrolled Students
    Route::resource('registration/enrolled_students', EnrolledStudentController::class);

    /**Reports */


    /**Settings System */
    Route::get('settings-system', [SettingController::class, 'index'])->name('settings');
});
