<?php

namespace App\Models;

use App\Models\traits\OnetoOneTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class organizer extends Model
{
    use HasFactory;
    use OnetoOneTrait;

    protected $fillable = [
        
        'description',
        'user_id',
        
    ];
    public function event()
    {
        return $this->hasMany(event::class);
    }
}
