<?php

namespace App\Models;

use App\Models\traits\OnetoOneTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class organizer extends Model
{
    use HasFactory , OnetoOneTrait;
    protected $fillable = [
        
        'description',
        'user_id',
    ];
}
