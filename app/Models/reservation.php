<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservation extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'status',
        'event_id',
        'client_id',
    ];
    public function event()
    {
        return $this->belongsTo(event::class , 'event_id');
    }
    public function client()
    {
        return $this->belongsTo(client::class);
    }
}
