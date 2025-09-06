<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['body', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
