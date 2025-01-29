<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = ['N_magazine','privacy'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
