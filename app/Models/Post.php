<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','post_image', 'title', 'details', 'post_type', 'is_published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
