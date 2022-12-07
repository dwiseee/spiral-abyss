<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chara extends Model
{
    use HasFactory;

    protected $table = 'charas';
    protected $guarded = ['id'];
}
