<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $name; // type: string
    protected $email; // type: string
    protected $password; // type: string


}
