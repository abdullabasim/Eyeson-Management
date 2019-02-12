<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "client";

    protected $fillable = [
        'name',
        'address',
        'mobile',
        'email',

    ];

    public function session()
    {
        return $this->hasMany(Session::class, 'client_id', 'id');
    }
}
