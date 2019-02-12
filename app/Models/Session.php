<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = "session";

    protected $fillable = [
        'department_id',
        'service_id',
        'client_id',
        'note',
        'price',
        'invoice_id'

    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
