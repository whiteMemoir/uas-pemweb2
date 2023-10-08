<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNasabah extends Model
{
    use HasFactory;
    protected $table = 'datanasabah';
    protected $guarded = ['id'];
    protected $hidden = [
        'password',
    ];
}
