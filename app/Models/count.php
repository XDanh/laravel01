<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class count extends Model
{
    use HasFactory;
    protected $table = 'count';
    protected $fillable = [
        'count_number',
        'date'
    ];
}
