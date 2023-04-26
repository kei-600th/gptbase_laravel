<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'response_id'];

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
