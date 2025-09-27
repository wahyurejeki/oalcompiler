<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $id; // type: integer
    protected $title; // type: string
    protected $author; // type: string
    protected $year; // type: integer
    protected $isbn; // type: string
    protected $available; // type: boolean

    public function BorrowRecord()
    {
        return $this->hasMany(BorrowRecord::class);
    }
}
