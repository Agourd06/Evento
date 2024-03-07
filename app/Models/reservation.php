<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'event_id',
        'client_id',
    ];
    public function event()
    {
        return $this->belongsTo(event::class);
    }
    public function client()
    {
        return $this->belongsTo(client::class);
    }
}
