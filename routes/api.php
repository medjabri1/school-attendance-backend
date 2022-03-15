<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- FILIERE REQUESTS ENDPOINTS

// GET ALL FILIERES
Route::get('/filieres', [FiliereController::class, 'index']);

// GET ONE FILIERE BY ID
Route::get('/filieres/{filiere}', [FiliereController::class, 'getFiliereById']);

// POST NEW FILIERE
Route::post('/filieres', [FiliereController::class, 'store']);

// UPDATE FILIERE BY ID
Route::put('/filieres/{filiere}', [FiliereController::class, 'update']);

// DELETE FILEIRE BY ID
Route::delete('/filieres/{filiere}', [FiliereController::class, 'destroy']);

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- LEVEL REQUESTS ENDPOINTS

// GET ALL LEVELS
Route::get('/levels', [LevelController::class, 'index']);

// GET ONE LEVEL BY ID
Route::get('/levels/{level}', [LevelController::class, 'getLevelById']);

// GET ALL LEVELS OF FILIERE
Route::get('/levels/filiere/{filiere_id}', [LevelController::class, 'getFiliereLevels']);

// POST NEW LEVEL
Route::post('/levels', [LevelController::class, 'store']);

// UPDATE LEVEL BY ID
Route::put('/levels/{level}', [LevelController::class, 'update']);

// DELETE LEVEL BY ID
Route::delete('/levels/{level}', [LevelController::class, 'destroy']);

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- SUBJECT REQUESTS ENDPOINTS

// GET ALL SUBJECTS
Route::get('/subjects', [SubjectController::class, 'index']);

// GET ONE SUBJECT BY ID
Route::get('/subjects/{subject}', [SubjectController::class, 'getSubjectById']);

// GET ALL SUBJECTS OF LEVEL
Route::get('/subjects/level/{level_id}', [SubjectController::class, 'getLevelSubjects']);

// POST NEW SUBJECT
Route::post('/subjects', [SubjectController::class, 'store']);

// UPDATE SUBJECT BY ID
Route::put('/subjects/{subject}', [SubjectController::class, 'update']);

// DELETE SUBJECT BY ID
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy']);

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- STUDENT REQUESTS ENDPOINTS

// GET ALL STUDENT
Route::get('/students', [StudentController::class, 'index']);

// GET ONE STUDENT BY ID
Route::get('/students/{student}', [StudentController::class, 'getStudentById']);

// GET ALL STUDENTS OF LEVEL
Route::get('/students/level/{level_id}', [StudentController::class, 'getLevelStudents']);

// POST NEW STUDENT
Route::post('/students', [StudentController::class, 'store']);

// UPDATE STUDENT BY ID
Route::put('/students/{student}', [StudentController::class, 'update']);

// DELETE STUDENT BY ID
Route::delete('/students/{student}', [StudentController::class, 'destroy']);

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- SESSION REQUESTS ENDPOINTS

// GET ALL SESSIONS
Route::get('/sessions', [SessionController::class, 'index']);

// GET ONE SESSION BY ID
Route::get('/sessions/{session}', [SessionController::class, 'getSessionById']);
Route::get('/sessions/{session}/result', [SessionController::class, 'getSessionResult']);

// GET ALL SESSIONS OF LEVEL
Route::get('/sessions/level/{level_id}', [SessionController::class, 'getLevelSessions']);

// GET ALL SESSIONS OF SUBJECT
Route::get('/sessions/subject/{subject_id}', [SessionController::class, 'getSubjectSessions']);

// POST NEW SESSION
Route::post('/sessions', [SessionController::class, 'store']);

// UPDATE SESSION BY ID
Route::put('/sessions/{session}', [SessionController::class, 'update']);

// DELETE SESSION BY ID
Route::delete('/sessions/{session}', [SessionController::class, 'destroy']);

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- PROFESSORS REQUESTS ENDPOINTS

// GET ALL PORFESSORS
Route::get('/professors', [ProfessorController::class, 'index']);

// GET ONE PROFESSOR BY ID
Route::get('/professors/{professor}', [ProfessorController::class, 'getProfessorById']);

// POST NEW PROFESSOR
Route::post('/professors', [ProfessorController::class, 'store']);

// UPDATE PROFESSOR BY ID
Route::put('/professors/{professor}', [ProfessorController::class, 'update']);

// DELETE PROFESSOR BY ID
Route::delete('/professors/{professor}', [ProfessorController::class, 'destroy']);

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- OVERVIEW REQUESTS ENDPOINTS

// GET GLOBAL OVERVIEW
Route::get('/overview', [OverviewController::class, 'overview']);
Route::get('/overview/level/{level}', [OverviewController::class, 'levelOverview']);
Route::get('/overview/subject/{subject}', [OverviewController::class, 'subjectOverview']);
Route::get('/overview/sessions', [OverviewController::class, 'sessionsOverview']);

// -- -- -- -- // -- -- -- -- // -- -- -- -- // -- -- -- -- 
// -- -- -- -- ATTENDANCE REQUESTS ENDPOINTS

Route::get('/attendances', [AttendanceController::class, 'index']);

Route::get('/attendances/{attendance}', [AttendanceController::class, 'getAttendanceById']);
Route::get('/attendances/session/{session_id}', [AttendanceController::class, 'getSessionAttendances']);
Route::get('/attendances/student/{student_id}', [AttendanceController::class, 'getStudentAttendances']);

Route::post('/attendances', [AttendanceController::class, 'store']);
Route::put('/attendances/{attendance}', [AttendanceController::class, 'update']);
Route::delete('/Attendances/{attendance}', [AttendanceController::class, 'destroy']);
