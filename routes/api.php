<?php

use App\Http\Controllers\FiliereController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
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
