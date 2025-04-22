<?php

use App\Http\Controllers\Api\PizzaController;
use Illuminate\Support\Facades\Route;

// Route untuk mendapatkan semua tim
Route::get('api/pizzas', [
    PizzaController::class,
    'getAllPizzas'
]);

Route::get('/', function () {
    return view('welcome');
});
