<?php
// framework-module/app/Http/Controllers/ReporteController.php
namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class ReporteController extends Controller {
    public function index() {
        $editoriales = Editorial::all();
        return response()->json([
            'status' => 'success',
            'data'   => $editoriales
        ], 200);
    }
}