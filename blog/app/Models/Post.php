<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public const CREATED_AT = 'publication_year';
    public const UPDATED_AT  = null;

    protected $dateFormat = 'U';
}
