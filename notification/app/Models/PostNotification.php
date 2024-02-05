<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostNotification extends Model
{
    public $timestamps = false;
    protected $fillable = ['post_id', 'message'];
}
