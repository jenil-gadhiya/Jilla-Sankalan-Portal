<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingCasesForPensionPatrak extends Model
{
    use HasFactory;

    protected $fillable = ['expire_patrak_id'];

}
