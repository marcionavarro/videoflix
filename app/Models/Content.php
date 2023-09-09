<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body', 'type', 'cover', 'slug'];

    public function videos()
    {
        if($this->type == 1) return $this->hasOne(Video::class);
        return $this->hasMany(Video::class);
    }
}
