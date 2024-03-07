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
    public function reservation()
    {
        return $this->hasMany(reservation::class);
    }
}
