<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Credential extends Model
{
    protected $fillable = [
        'name','user_id', 'website', 'username', 'password', 'link', 'category',
    ];

    use SoftDeletes;

}
