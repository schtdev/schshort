<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLinks extends Model
{
    protected $fillable = ['user_id', 'code', 'link'];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
