<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CommunityEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'venue',
        'starts_at',
        'banner_image',
    ];
}
