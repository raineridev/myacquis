<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RakingPost extends Model
{
    use HasFactory;

    protected  $fillable = [
        'post-id',
        'user-id',
        'type',
    ];
}
