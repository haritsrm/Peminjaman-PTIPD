<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acc extends Model
{
    protected $fillable = [
        'kode', 'activate',
    ];
}
