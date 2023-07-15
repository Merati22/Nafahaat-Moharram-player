<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    protected $fillable = ['name', 'cover_path'];
}
