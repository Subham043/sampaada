<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    protected $table = 'service_requests';

    public function ServiceAddon()
    {
        return $this->hasMany('App\Models\ServiceAddon');
    }

    public function ServicePayment()
    {
        return $this->hasOne('App\Models\ServicePayment');
    }
}
