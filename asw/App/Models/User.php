<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 01/05/17
 * Time: 17:37
 */

namespace App\Models;

use App\Models\Model;


class User extends Model
{
    public $table = 'users';
    public $data = 'user_data';
    public $session = 'user';
    public $id = 'user_id';

}