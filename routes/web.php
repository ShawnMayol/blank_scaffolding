<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    session_start();
    if(isset($_SESSION["account"])){
        return redirect('/home');
    } else {
        return view('Login');
    }
});

Route::get('/images/{filename}', function($filename){
    // return view;
    // $path = resource_path().'/views/images/'.$filename;
    // if(!File::exists($path)) {
    //     return abort(404);
    // }
    // $file = File::get($path);
    // $type = File::mimeType($path);
    // $response = Response::make($file, 200);
    // $response->header("Content-Type", $type);
    // return $response;
});

Route::post('/login/authentication', [LoginController::class, 'authentication']);
Route::post('/register/registration', [RegistrationController::class, 'registration']);
Route::get('/get_accounts', [LoginController::class, 'get_accounts']);

// Checkout process
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('/checkout/success', function () {
    return view('checkout.success');
})->name('checkout.success');

