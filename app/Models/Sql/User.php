<?php

namespace App\Models\Sql;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email',  'password'
    ];

    public function document()
    {
        return $this->hasOne('App\Models\Sql\UserDocument');
    }
}
