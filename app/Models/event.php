<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class event extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'sets',
        'setsLeft',
        'price',
        'organizer_id' ,
        'categorie_id' ,
         'acceptation',
         'image',
    ];



    public function categorie()
    {
        return $this->belongsTo(categorie::class , 'categorie_id');
    }
    public function reservations()
    {
        return $this->hasMany(reservation::class, 'event_id');
    }
}
