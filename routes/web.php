<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\LeadsController;
use Illuminate\Support\Facades\Route;

// Landing
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/contato', [LandingController::class, 'submit'])->name('lead.submit');

// Admin (proteção simples por senha via middleware)
Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::get('/leads', [LeadsController::class, 'index'])->name('admin.leads');
    Route::patch('/leads/{lead}/status', [LeadsController::class, 'updateStatus'])->name('admin.leads.status');
    Route::delete('/leads/{lead}', [LeadsController::class, 'destroy'])->name('admin.leads.destroy');
});

Route::get('/admin', fn() => redirect()->route('admin.leads'));

// Login simples
Route::get('/admin/login', fn() => view('admin.login'))->name('admin.login');
Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $password = env('ADMIN_PASSWORD', 'viaresolve@2026');
    if ($request->password === $password) {
        session(['admin_authenticated' => true]);
        return redirect()->route('admin.leads');
    }
    return back()->withErrors(['password' => 'Senha incorreta.']);
})->name('admin.login.post');

Route::post('/admin/logout', function () {
    session()->forget('admin_authenticated');
    return redirect()->route('admin.login');
})->name('admin.logout');
