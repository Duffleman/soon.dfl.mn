<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{

    protected $fillable = ['name', 'date', 'user_id'];
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
