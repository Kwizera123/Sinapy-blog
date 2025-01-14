<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeService extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'short_dis',
        'image',
        'item',
        'item_dis',
    ];
}
