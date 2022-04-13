<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    use HasFactory;
    protected $table = 'service_sub_categories';

    public function ServiceCategory()
    {
        return $this->belongsTo('App\Models\ServiceCategory');
    }

    public function Service()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function ActiveService()
    {
        return $this->Service()->where('active', 1);
    }

}
