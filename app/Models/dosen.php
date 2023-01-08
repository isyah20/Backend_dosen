<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dosen extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dosen';
    protected $fillable = [
        'username',
        'address'
    ];
    protected $hidden =[];
}
