<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'is_favorite',
        'language',
        'description',
        'proyect_id'
    ];

    public function proyect()
    {
        return $this->belongsTo(Proyect::class);
    }
}
