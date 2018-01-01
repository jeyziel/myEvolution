<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
	protected $table = "users";

	protected $fillable = [
		'username',
		'email',
		'password',
		'roles'
	];

	public function post()
    {
        return $this->hasMany(Post::class);
    }

}