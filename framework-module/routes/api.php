<?php
// framework-module/routes/api.php
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

Route::get('/editoriales', [ReporteController::class, 'index']);