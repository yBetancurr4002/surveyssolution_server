<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyTypeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\HealthCheckController;

Route::prefix('v1')->group(function () {
    Route::get('/health', [HealthCheckController::class, 'ping']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::apiResource('/surveys', SurveyController::class);
        Route::apiResource('/survey-types', SurveyTypeController::class);
        Route::apiResource('/questions', QuestionController::class);
        Route::post('/surveys/{survey}/responses', [ResponseController::class, 'store']);
        Route::get('/surveys/{survey}/results', [SurveyController::class, 'results']);
    });
});
