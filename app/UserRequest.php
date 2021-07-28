<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $guarded=[];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
