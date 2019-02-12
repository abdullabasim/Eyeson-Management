<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "department";

    protected $fillable = [
        'title',

    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class, 'department_id', 'id');
    }
}
