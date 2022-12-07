<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abyss extends Model
{
    use HasFactory;

    protected $table = 'abysses';
    protected $guarded = ['id'];    
}
