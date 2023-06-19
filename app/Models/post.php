<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'subject',
        'image',

    ];




public function user(){
    return $this->belongsTo(User::class);
}
public function tags()
{
    return $this->belongsToMany(Tag::class);
}

// for creat posts to the same user.....
protected static function booted()
{
    static::creating(function ($post) {
        $post->user_id = Auth::id();
    });
}

}
