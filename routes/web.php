<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\RazorPaymentController;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('payment', [RazorPaymentController::class, 'index']);
Route::post('payment', [RazorPaymentController::class, 'store']);