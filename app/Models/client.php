<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\traits\OnetoOneTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class client extends Model
{
    use HasFactory;
    use OnetoOneTrait;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
    ];
    public function reservation()
    {
        return $this->hasMany(reservation::class);
    }
}
