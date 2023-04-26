<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'response_id'];

    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}
