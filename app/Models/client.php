<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\traits\OnetoOneTrait;

class client extends Model
{
    use HasFactory;
    use OnetoOneTrait;

    protected $fillable = [
        'user_id',
    ];
    public function reservation()
    {
        return $this->hasMany(reservation::class);
    }
}
