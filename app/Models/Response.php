<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Response extends Model
{
    use HasFactory;
 
    protected $fillable = ['title', 'filepath'];

    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}