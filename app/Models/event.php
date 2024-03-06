<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'sets',
        'organizer_id' ,
         'acceptation',
         'image',
    ];



    public function category()
    {
        return $this->belongsTo(categorie::class);
    }
    public function reservation()
    {
        return $this->hasMany(reservation::class);
    }
}
