<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAddon extends Model
{
    use HasFactory;
    protected $table = 'service_addons';

    public function ServiceRequest()
    {
        return $this->belongsTo('App\Models\ServiceRequest');
    }

    public function Service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
