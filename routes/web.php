<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentMarksController;
use App\Http\Controllers\SubjectTeacherForEachSectionsController;
use App\Http\Controllers\StudentSubjectAttendanceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\dailyTeacherAllocationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

////Assign teachers of subjects to various classes
Route::post('/createTeacherForSubject', [SubjectTeacherForEachSectionsController::class, 'store'])->name('createTeacherForSubject');
Route::post('/editTeacherForSubject', [SubjectTeacherForEachSectionsController::class, 'update'])->name('editTeacherForSubject');

//////Role creation////////
Route::post('/statusAddAdmin', [StatusController::class, 'create'])->name('statusAddAdmin');
Route::post('/updateStatusDetails', [StatusController::class, 'update'])->name('updateStatusDetails');
Route::post('/deleteStatusDetails', [StatusController::class, 'destroy'])->name('deleteStatusDetails');

////Create Batches
Route::post('/updateBatches', [BatchController::class, 'update'])->name('updateBatches');
Route::post('/createBatches', [BatchController::class, 'create'])->name('createBatches');
Route::post('/deleteBatches', [BatchController::class, 'destroy'])->name('deleteBatches');
Route::post('/currentBatch', [BatchController::class, 'currentBatch'])->name('currentBatch');
////Generate daily teacher enabled attendance
Route::post('/createDailyAttendance', [dailyTeacherAllocationController::class, 'createDailyAttendanceForAllTeachers'])->name('createDailyAttendance');

////Generate daily teacher enabled attendance for students
Route::post('/createStudentsDailyAttendance', [StudentSubjectAttendanceController::class, 'store'])->name('createStudentsDailyAttendance');

////Hour creation and updation/////
Route::post('/createHour', [AdminController::class, 'updateHourName'])->name('createHour');
Route::post('/deleteHour', [AdminController::class, 'deleteHour'])->name('deleteHour');
Route::post('/updateHourDetails', [AdminController::class, 'addHourName'])->name('updateHourDetails');

////Day creation and updation/////
Route::post('/createDay', [AdminController::class, 'addDayName'])->name('createDay');
Route::post('/updateDayDetails', [AdminController::class, 'updateDayName'])->name('updateDayDetails');
Route::post('/deleteDay', [AdminController::class, 'deleteDay'])->name('deleteDay');

Route::post('/createTeacherTimetableForTheParticularHour', [StudentSubjectAttendanceController::class, 'store'])->name('createTeacherTimetableForTheParticularHour');
Route::post('/submitClasswiseAttendence', [StudentSubjectAttendanceController::class, 'update'])->name('submitClasswiseAttendence');

Route::post('/createAttendance', [AttendenceController::class, 'adminCreateAttendance'])->name('createAttendance');
Route::post('/submitTodaysAttendance', [AttendenceController::class, 'adminSubmitTodaysAttendance'])->name('submitTodaysAttendance');
/////Attendance/////////

Route::post('/todaysAbsentees', [AttendenceController::class, 'showTodaysAbsentees'])->name('showTodaysAbsentees');
Route::post('/daysAbsentees', [AttendenceController::class, 'showDaysAbsentees'])->name('showAbsenteesOn');
Route::post('/absenteesBetweenDays', [AttendenceController::class, 'showAbsenteesBetweenDays'])->name('showAbsenteesBetween');

Route::post('/todaysAbsentees', [AttendenceController::class, 'showTodaysAbsentees'])->name('showTodaysAbsentees');
Route::post('/todaysAbsentees', [AttendenceController::class, 'showTodaysAbsentees'])->name('showTodaysAbsentees');
Route::post('/markAttendance', [AttendenceController::class, 'markTodaysAttendance'])->name('markAttendance');
Route::post('/resetTodaysAttendance', [AttendenceController::class, 'resetTodaysAttendance'])->name('resetTodaysAttendance');
////ClassRoom///////////

Route::get('/getClassRoom', [ClassRoomController::class, 'gatherClassRoomCreateData'])->name('getAdminClassRoomDetails');
Route::post('/createClassRoom', [ClassRoomController::class, 'create'])->name('createClassRoom');
Route::post('/updateClassRoom', [ClassRoomController::class, 'update'])->name('updateClassRoom');
Route::post('/deleteClassRoom', [ClassRoomController::class, 'destroy'])->name('deleteClassRoom');
///Details/////

Route::get('/getAdminAllDetails', [DetailController::class, 'getDetails'])->name('getAdminAllDetails');
Route::post('/addDetailsToNewUser', [DetailController::class, 'store'])->name('addDetailsToNewUser');
Route::post('/updateAdminDetails', [DetailController::class, 'updateAdminDetails'])->name('createOrUpdateAdminDetails');
Route::post('/updateTeacherDetails', [DetailController::class, 'updateTeacherDetails'])->name('createOrUpdateTeacherDetails');
Route::post('/updateStudentDetails', [DetailController::class, 'updateStudentDetails'])->name('createOrUpdateStudentDetails');
Route::post('/addTeacherAdmin', [DetailController::class, 'createTeacher'])->name('addTeacherAdmin');
Route::post('/addStudentAdmin', [DetailController::class, 'createStudentAdmin'])->name('addStudentAdmin');
Route::post('/addStudentTeacher', [DetailController::class, 'createStudentTeacher'])->name('addStudentTeacher');
Route::post('/addAdminAdmin', [DetailController::class, 'createAdmin'])->name('addAdminAdmin');

///////Role////
Route::post('/createRole', [RoleController::class, 'create'])->name('createRoleByAdmin');
Route::post('/updateRole', [RoleController::class, 'update'])->name('updateRoleByAdmin');
// Route::post('/destroyRole', [RoleController::class, 'destroy'])->name('deleteRoleByAdmin');
///////Section/////

Route::post('/createSection', [SectionController::class, 'create'])->name('createSectionByAdmin');
Route::post('/updateSection', [SectionController::class, 'update'])->name('updateSectionByAdmin');
Route::post('/destroySection', [SectionController::class, 'destroy'])->name('deleteSectionByAdmin');
/////Grade////////

Route::post('/createGrade', [gradeController::class, 'create'])->name('createGradeByAdmin');
Route::post('/updateGrade', [gradeController::class, 'update'])->name('updateGradeByAdmin');
Route::post('/destroyGrade', [gradeController::class, 'destroy'])->name('deleteGradeByAdmin');
////Department//////

Route::post('/addDepartment', [DepartmentController::class, 'store'])->name('createDepartment');
Route::post('/editDepartment', [DepartmentController::class, 'edit'])->name('updateDepartment');
Route::post('/deleteDepartment', [DepartmentController::class, 'destroy'])->name('deleteDepartment');
////Subject//////

Route::post('/selectedSubjectDetails', [SubjectController::class, 'getDepartmentFromGradeForSubject'])->name('selectedSubjectDetails');
Route::post('/addSubject', [SubjectController::class, 'store'])->name('createSubject');
Route::post('/updateSubject', [SubjectController::class, 'update'])->name('updateSubject');
Route::post('/deleteSubject', [SubjectController::class, 'destroy'])->name('deleteSubject');
////Semester//////

Route::post('/addSemester', [SemesterController::class, 'store'])->name('createSemester');
Route::post('/editSemester', [SemesterController::class, 'update'])->name('updateSemester');
//////StudentMarks//////////

Route::post('/updateMarksTeacher', [StudentMarksController::class, 'updateMarksTeacher'])->name('updateMarksTeacher');
Route::post('/createStudentSubjectMarks', [StudentMarksController::class, 'update'])->name('createStudentSubjectMarks');
Route::post('/createMarkEntry', [StudentMarksController::class, 'index'])->name('createMarkEntry');
// Route::post('/createStudentMarks', [StudentMarksController::class, 'create'])->name('createStudentMarks');
// Route::post('/updateStudentMarks', [StudentMarksController::class, 'update'])->name('updateStudentMarks');
Route::post('/destroyStudentMarks', [StudentMarksController::class, 'destroy'])->name('deleteStudentMarks');
Route::post('/assignClassRoomToStudents', [ClassRoomController::class, 'updateClassroomStudent'])->name('assignClassRoomToStudents');
Route::post('/updateClassRoomForStudent', [ClassRoomController::class, 'assignClassroomStudent'])->name('updateClassRoomForStudent');
/////SubjectTeacherForEachSectionsController////

Route::post('/SubjectTeacherForEachSectionsController', [SubjectTeacherForEachSectionsController::class, 'store'])->name('SubjectTeacherForEachSectionsController');
// Route::post('/deleteSemester', [SemesterController::class, 'destroy'])->name('deleteSemester');

Route::get('/logout', [DashboardController::class,'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'chooseDashboard'])->name('selectDashboard');
Route::get('/guestDashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/Admindashboard',function () {
    return view('/Admin/dashboard');
})->middleware(['auth', 'verified'])->name('Admindashboard');
Route::get('/Teacherdashboard', function () {
    return view('/Teacher/dashboard');
})->middleware(['auth', 'verified'])->name('Teacherdashboard');
Route::get('/Studentdashboard', function () {
    return view('/Student/dashboard');
})->middleware(['auth', 'verified'])->name('Studentdashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/////Admin Pages/////////////////////////////////////

Route::get('/Admin', function () {
    return view('/Admin/admin');
})->middleware(['auth', 'verified'])->name('Admin');
Route::get('/AdminAttendance', function () {
    return view('/Admin/attendance');
})->middleware(['auth', 'verified'])->name('AdminAttendance');
Route::get('/AdminClassRoom', function () {
    return view('/Admin/classRoom');
})->middleware(['auth', 'verified'])->name('AdminClassRoom');
Route::get('/AdminDetails', function () {
    return view('/Admin/details');
})->middleware(['auth', 'verified'])->name('AdminDetails');
Route::get('/AdminGrade', function () {
    return view('/Admin/grade');
})->middleware(['auth', 'verified'])->name('AdminGrade');
Route::get('/AdminRole', function () {
    return view('/Admin/role');
})->middleware(['auth', 'verified'])->name('AdminRole');
Route::get('/AdminSection', function () {
    return view('/Admin/section');
})->middleware(['auth', 'verified'])->name('AdminSection');
Route::get('/AdminStudent', function () {
    return view('/Admin/student');
})->middleware(['auth', 'verified'])->name('AdminStudent');
Route::get('/AdminSubject',function () {
    return view('/Admin/subject');
})->middleware(['auth', 'verified'])->name('AdminSubject');
Route::get('/AdminTeacher', function () {
    return view('/Admin/teacher');
})->middleware(['auth', 'verified'])->name('AdminTeacher');
Route::get('/subjectTeachersForEachSection', function () {
    return view('/Admin/subjectTeachersForEachSection');
})->middleware(['auth', 'verified'])->name('AdminSubjectTeachersForEachSection');

////Teacher Pages ///////////


// Route::get('/Teacher', function () {
//     return view('/Teacher/admin');
// })->middleware(['auth', 'verified'])->name('Teacher');
Route::get('/TeacherAttendance', function () {
    return view('/Teacher/attendance');
})->middleware(['auth', 'verified'])->name('TeacherAttendance');
Route::get('/TeacherClassRoom', function () {
    return view('/Teacher/classRoom');
})->middleware(['auth', 'verified'])->name('TeacherClassRoom');
Route::get('/TeacherDetails', function () {
    return view('/Teacher/details');
})->middleware(['auth', 'verified'])->name('TeacherDetails');
Route::get('/TeacherStudent', function () {
    return view('/Teacher/student');
})->middleware(['auth', 'verified'])->name('TeacherStudent');
Route::get('/TeacherSubject', function () {
    return view('/Teacher/subject');
})->middleware(['auth', 'verified'])->name('TeacherSubject');

////Student Pages///////////

Route::get('/StudentDashboard', function () {
    return view('/Student/dashboard');
})->middleware(['auth', 'verified'])->name('StudentDashboard');
Route::get('/teachersDetails', function () {
    return view('/Student/teachersDetails');
})->middleware(['auth', 'verified'])->name('StudentTeachersDetails');
Route::get('/StudentAttendance', function () {
    return view('/Student/attendance');
})->middleware(['auth', 'verified'])->name('StudentAttendance');
Route::get('/StudentMarks', function () {
    return view('/Student/mark');
})->middleware(['auth', 'verified'])->name('StudentMarks');
Route::get('/StudentDetails', function () {
    return view('/Student/details');
})->middleware(['auth', 'verified'])->name('StudentDetails');
////////////Logout/////////////

require __DIR__.'/auth.php';
