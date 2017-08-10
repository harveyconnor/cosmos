<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['name', 'date_due', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
