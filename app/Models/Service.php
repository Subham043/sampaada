<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    public function ServiceCategory()
    {
        return $this->belongsTo('App\Models\ServiceCategory');
    }

    public function ServiceSubCategory()
    {
        return $this->belongsTo('App\Models\ServiceSubCategory');
    }

    public function ServiceDocument()
    {
        return $this->hasMany('App\Models\ServiceDocument');
    }

    public function ServiceFaq()
    {
        return $this->hasMany('App\Models\ServiceFaq');
    }

    public function ServiceAddon()
    {
        return $this->hasMany('App\Models\ServiceAddon');
    }

}
