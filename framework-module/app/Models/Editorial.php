<?php
// framework-module/app/Models/Editorial.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model {
    protected $table = 'editoriales';
    protected $primaryKey = 'id_editorial';
    public $timestamps = false;
}