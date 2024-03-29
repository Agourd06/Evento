<?php

namespace App\Models;

use App\Models\traits\OnetoOneTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
{
    use HasFactory;
    use OnetoOneTrait;


    protected $fillable = [
        'user_id',
    ];
}
