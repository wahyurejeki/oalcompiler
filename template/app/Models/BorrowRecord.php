<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    protected $id; // type: integer
    protected $borrowedAt; // type: datetime
    protected $returnedAt; // type: datetime

    public function Book()
    {
        return $this->belongsTo(Book::class);
    }

    public function Member()
    {
        return $this->belongsTo(Member::class);
    }
}
