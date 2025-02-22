<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\calorias;

class Caloria extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
