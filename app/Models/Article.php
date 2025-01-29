<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','content','theme_id','user_id','privacy'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function ratings()
    {
    return $this->hasMany(Review::class);
    }

}
