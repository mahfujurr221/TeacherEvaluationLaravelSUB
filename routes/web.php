<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollStudentController;
use App\Http\Controllers\OfferedCourseController;
use App\Http\Controllers\McqQuestionController;
use App\Http\Controllers\OpenQuestionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserRole;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', [AdminController::class, 'index'])->name('home');
Route::get('dashboard/supper/admin/profile', [AdminController::class, 'profile']);

Route::get('dashboard/user', [UserController::class, 'index']);
Route::get('dashboard/user/add', [UserController::class, 'add']);
Route::get('dashboard/user/edit/{slug}', [UserController::class, 'edit']);
Route::get('dashboard/user/view/{slug}', [UserController::class, 'view']);
Route::post('dashboard/user/submit', [UserController::class, 'insert']);
Route::post('dashboard/user/update', [UserController::class, 'update']);
Route::post('dashboard/user/delete', [UserController::class, 'delete']);
Route::get('dashboard/user/change_password', [UserController::class, 'changePassword']);
Route::post('dashboard/user/update_password', [UserController::class, 'updatePassword']);


Route::get('dashboard/role', [RoleController::class, 'index']);
Route::get('dashboard/role/add', [RoleController::class, 'add']);
Route::get('dashboard/role/edit/{slug}', [RoleController::class, 'edit']);
Route::get('dashboard/role/view/{slug}', [UserController::class, 'view']);
Route::post('dashboard/role/submit', [RoleController::class, 'insert']);
Route::post('dashboard/role/update', [RoleController::class, 'update']);
Route::post('dashboard/role/delete', [RoleController::class, 'delete']);

Route::get('dashboard/department', [DepartmentController::class, 'index']);
Route::get('dashboard/department/add', [DepartmentController::class, 'add']);
Route::get('dashboard/department/edit/{id}', [DepartmentController::class, 'edit']);
Route::get('dashboard/department/view/{id}', [DepartmentController::class, 'view']);
Route::post('dashboard/department/submit', [DepartmentController::class, 'insert']);
Route::post('dashboard/department/update', [DepartmentController::class,'update']);
Route::post('dashboard/department/excel', [DepartmentController::class,'excel'])->name('dept.import');
Route::post('dashboard/department/delete', [DepartmentController::class, 'delete']);

Route::get('dashboard/semester', [SemesterController::class, 'index']);
Route::get('dashboard/semester/add', [SemesterController::class, 'add']);
Route::get('dashboard/semester/edit/{id}', [SemesterController::class, 'edit']);
Route::get('dashboard/semester/view', [SemesterController::class, 'view']);
Route::post('dashboard/semester/submit', [SemesterController::class, 'insert']);
Route::post('dashboard/semester/update', [SemesterController::class, 'update']);
Route::post('dashboard/semester/softdelete', [SemesterController::class, 'softdelete']);
Route::post('dashboard/semester/restore', [SemesterController::class, 'restore']);
Route::post('dashboard/semester/delete', [SemesterController::class, 'delete']);

Route::get('dashboard/default', [DefaultController::class, 'index']);
Route::post('dashboard/default/update', [DefaultController::class, 'update']);

Route::get('dashboard/teacher', [TeacherController::class, 'index']);
Route::get('dashboard/teacher/add', [TeacherController::class, 'add']);
Route::get('dashboard/teacher/edit/{slug}', [TeacherController::class, 'edit']);
Route::get('dashboard/teacher/view/{slug}', [TeacherController::class, 'view']);
Route::post('dashboard/teacher/submit', [TeacherController::class, 'insert']);
Route::post('dashboard/teacher/update', [TeacherController::class, 'update']);
Route::post('dashboard/teacher/delete', [TeacherController::class, 'delete']);
Route::post('dashboard/teacher/deactive', [TeacherController::class, 'deactive']);
Route::post('dashboard/teacher/excel', [TeacherController::class, 'excel'])->name('teacher.import');

Route::get('dashboard/student', [StudentController::class, 'index'])->name('student.index');
Route::get('dashboard/student/add', [StudentController::class, 'add']);
Route::get('dashboard/student/edit/{slug}', [StudentController::class, 'edit']);
Route::get('dashboard/student/view/{slug}', [StudentController::class, 'view']);
Route::post('dashboard/student/submit', [StudentController::class, 'insert']);
Route::post('dashboard/student/update', [StudentController::class, 'update']);
Route::post('dashboard/student/delete', [StudentController::class, 'delete']);
Route::post('dashboard/student/deactive', [StudentController::class, 'deactive']);
Route::post('dashboard/student/excel', [StudentController::class, 'excel'])->name('student.import');

Route::get('dashboard/course', [CourseController::class, 'index']);
Route::get('dashboard/course/add', [CourseController::class, 'add']);
Route::get('dashboard/course/edit/{slug}', [CourseController::class, 'edit']);
Route::get('dashboard/course/view/{slug}', [CourseController::class, 'view']);
Route::post('dashboard/course/submit', [CourseController::class, 'insert']);
Route::post('dashboard/course/update', [CourseController::class, 'update']);
Route::post('dashboard/course/delete', [CourseController::class, 'delete']);
Route::post('dashboard/course/excel', [CourseController::class, 'excel'])->name('course.import');
Route::get('dashboard/course/filter/{id}', [CourseController::class, 'filter']);

Route::get('dashboard/offer/course', [OfferedCourseController::class, 'index']);
Route::get('dashboard/offer/course/add', [OfferedCourseController::class, 'add']);
Route::get('dashboard/offer/course/edit/{slug}', [OfferedCourseController::class, 'edit']);
Route::get('dashboard/offer/course/view/{slug}', [OfferedCourseController::class, 'view']);
Route::post('dashboard/offer/course/submit', [OfferedCourseController::class, 'insert']);
Route::post('dashboard/offer/course/update', [OfferedCourseController::class, 'update']);
Route::post('dashboard/offer/course/delete', [OfferedCourseController::class, 'delete']);
Route::post('dashboard/offer/course/deactive', [OfferedCourseController::class, 'deactive']);
Route::post('dashboard/offer/course/enable', [OfferedCourseController::class, 'enable']);
Route::get('dashboard/offer/course/deactivated', [OfferedCourseController::class, 'deativated']);
Route::post('dashboard/offer/course/active', [OfferedCourseController::class, 'active']);

Route::get('dashboard/offer/course/teacher_dropdown/{id}', [OfferedCourseController::class, 'teacherDropdown']);
Route::get('dashboard/offer/course/course_dropdown/{id}', [OfferedCourseController::class, 'courseDropdown']);

Route::get('dashboard/enroll/student', [EnrollStudentController::class, 'index']);
Route::get('dashboard/enroll/student/add', [EnrollStudentController::class, 'add']);
Route::get('dashboard/enroll/student/edit/{slug}', [EnrollStudentController::class, 'edit']);
Route::get('dashboard/enroll/student/view/{slug}', [EnrollStudentController::class, 'view']);
Route::post('dashboard/enroll/student/submit', [EnrollStudentController::class, 'insert']);
Route::post('dashboard/enroll/student/update', [EnrollStudentController::class, 'update']);
Route::post('dashboard/enroll/student/delete', [EnrollStudentController::class, 'delete']);
Route::post('dashboard/enroll/student/deactive', [EnrollStudentController::class, 'deactive']);
Route::get('dashboard/enroll/student/deactivated', [EnrollStudentController::class, 'deactivated']);
Route::post('dashboard/enroll/student/active', [EnrollStudentController::class, 'active']);
Route::get('dashboard/enroll/student/course_dropdown/{id}', [OfferedCourseController::class, 'courseDropdown']);

Route::get('dashboard/mcq/question', [McqQuestionController::class, 'index']);
Route::get('dashboard/mcq/question/add', [McqQuestionController::class, 'add']);
Route::get('dashboard/mcq/question/edit/{slug}', [McqQuestionController::class, 'edit']);
Route::get('dashboard/mcq/question/view/{slug}', [McqQuestionController::class, 'view']);
Route::post('dashboard/mcq/question/submit', [McqQuestionController::class, 'insert']);
Route::post('dashboard/mcq/question/update', [McqQuestionController::class, 'update']);
Route::post('dashboard/mcq/question/delete', [McqQuestionController::class, 'delete']);
Route::post('dashboard/mcq/excel', [McqQuestionController::class, 'excel'])->name('mcq.import');



Route::get('dashboard/open/question', [OpenQuestionController::class, 'index']);
Route::get('dashboard/open/question/add', [OpenQuestionController::class, 'add']);
Route::get('dashboard/open/question/edit/{slug}', [OpenQuestionController::class, 'edit']);
Route::get('dashboard/open/question/view/{slug}', [OpenQuestionController::class, 'view']);
Route::post('dashboard/open/question/submit', [OpenQuestionController::class, 'insert']);
Route::post('dashboard/open/question/update', [OpenQuestionController::class, 'update']);
Route::post('dashboard/open/question/delete', [OpenQuestionController::class, 'delete']);

Route::get('dashboard/report/course', [ReportController::class, 'index']);
Route::get('dashboard/report/course/view/{id}', [ReportController::class, 'courseReport']);
Route::get('dashboard/report/teacher', [ReportController::class, 'teacher']);
Route::get('dashboard/report/teacher/view/{id}', [ReportController::class, 'teacherReport']);


Route::get('student', [StudentPageController::class, 'index']);

Route::get('student/question/{id}', [StudentPageController::class, 'question']);
Route::post('student/evaluate/submit', [StudentPageController::class, 'submit']);
Route::get('student/evaluated/{id}', [StudentPageController::class, 'evaluated']);
Route::post("loginPost",[AuthenticatedSessionController::class,'customLogin'])->name('auth.submitLogin');

require __DIR__.'/auth.php';
