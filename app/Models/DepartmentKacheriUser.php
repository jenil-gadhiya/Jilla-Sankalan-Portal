<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentKacheriUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'department_kacheri_id',
    ];
}
