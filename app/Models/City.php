<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "canton_id",
        "description",
    ];

    public function canton()
    {
        return $this->belongsTo(Canton::class, 'canton_id');
    }
}
