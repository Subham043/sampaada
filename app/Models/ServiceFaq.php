<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    use HasFactory;
    protected $table = 'service_faqs';

    public function Service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
