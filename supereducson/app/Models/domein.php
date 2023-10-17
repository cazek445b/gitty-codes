<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domein extends Model
{
    use HasFactory;

    public function kwalificatiedosiers()
    {
        return $this->hasMany(kwalificatiedosier::class);
    }
}
