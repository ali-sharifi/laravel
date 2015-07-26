<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $fillable = ['id', 'note', 'website', 'tbd', 'image', 'user_id'];
}
