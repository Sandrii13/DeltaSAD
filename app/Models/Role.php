<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'rol',
    ];

    public function trabajadora(){
        return $this->hasMany(Trabajadora::class);
    }
}
