<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departmeny;

class Kacheri extends Model
{
    use HasFactory;
    protected $fillable = [
        'kacheri_name',
    ];

}
