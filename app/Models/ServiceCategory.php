<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = 'service_categories';

    public function ServiceSubCategory()
    {
        return $this->hasMany('App\Models\ServiceSubCategory');
    }

    public function Service()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function ActiveServiceSubCategory()
    {
        return $this->ServiceSubCategory()->where('active', 1);
    }

    public function ActiveService($service_category_id,$service_sub_category_id)
    {
        return Service::where('service_category_id', $service_category_id)->where('service_sub_category_id', $service_sub_category_id)->where('active', 1)->get();
    }
}
