<?php 

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = "posts";
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'content',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}