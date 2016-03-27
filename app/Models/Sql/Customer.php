<?php

namespace App\Models\Sql;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'name', 'phone', 'id_card', 'email', 'address', 'phone', 'image',
        'created_by', 'updated_by'
    ];

}
