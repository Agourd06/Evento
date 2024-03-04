<?php

namespace App\Models\traits;

use App\Models\User;

trait OnetoOneTrait
{

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
