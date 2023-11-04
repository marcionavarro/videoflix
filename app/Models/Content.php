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
        return $this->hasMany(Video::class);
    }
}
