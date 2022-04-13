<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePayment extends Model
{
    use HasFactory;
    protected $table = 'service_payments';

    public function ServiceRequest()
    {
        return $this->belongsTo('App\Models\ServiceRequest');
    }
}
