<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kwalificatiedosierfile extends Model
{
    use HasFactory;

    public function kwalificatiedosiers()
    {
        return $this->hasMany(kwalificatiedosier::class);
    }
}
