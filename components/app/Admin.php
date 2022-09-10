<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'sitename',
        'sitedes',
        'toplink',
        'toptext',
        'servicedes',
        'col2',
        'col3',
        'col3s1',
        'col3s2',
        'col3s3',
        'advertise',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube'
    ];
}
