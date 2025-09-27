<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $id; // type: integer
    protected $name; // type: string
    protected $email; // type: string
    protected $phone; // type: string

    public function BorrowRecord()
    {
        return $this->hasMany(BorrowRecord::class);
    }
}
