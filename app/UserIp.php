<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIp extends Model
{
    protected $table = 'userips';
    protected $fillable = [
        'u_id', 'name', 'c_id', 'ip',
    ];
}
