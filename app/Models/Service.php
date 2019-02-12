<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "service";

    protected $fillable = [
        'department_id',
        'title',
        'price',


    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
