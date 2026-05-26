<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/test', function () {
    return response()->json(['message' => 'API works!']);
});

Route::apiResource('students', StudentController::class);

Route::post('/login', function() {
    return response()->json(['token' => 'fake-token-for-test', 'user' => ['name' => 'Admin']]);
});
Route::post('/register', function() {
    return response()->json([
        'token' => 'fake-token-for-test', 
        'user' => ['name' => 'New User']
    ]);
});Route::get('/genders', [StudentController::class, 'getGenders']);