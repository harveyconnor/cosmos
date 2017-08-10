<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Google extends Model
{

    protected $fillable = ['name','google_id','nickname','avatar','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
