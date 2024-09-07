<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DepartmentKacheri;
use App\Models\Kacheri;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
    ];
}
