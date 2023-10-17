<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class kwalificatiedosier extends Model
{
    use HasFactory;

    public function kwalificatiedosierfiles()
    {
        return $this->hasMany(kwalificatiedosierfile::class);
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }

    public function domein()
    {
        return $this->belongsTo(domein::class);
    }
    
    public function niveau()
    {
        return $this->belongsTo(niveau::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
