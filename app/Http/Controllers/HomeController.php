<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    private $service_category;
    public function __construct() {
        $this->service_category = ServiceCategory::where('active',1)->get();
    }
    //
    public function index(){
        $service = Service::where('active',1)->get();
        $testimonial = Testimonial::where('active',1)->get();
        return view('pages.home.index')->with('service',$service)->with('testimonial',$testimonial)->with('service_category',$this->service_category);
    }

    public function category($service_sub_category_id){
        $service_sub_category_count = ServiceSubCategory::where('id',$service_sub_category_id)->where('active',1)->get();
        if(count($service_sub_category_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        $service_sub_category = ServiceSubCategory::where('id',$service_sub_category_id)->where('active',1)->first();
        $service_category_count = ServiceCategory::where('id',$service_sub_category->service_category_id)->where('active',1)->get();
        if(count($service_category_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        return view('pages.services.index')
        ->with('heroTitle', $service_sub_category->name)
        ->with('service_sub_category', $service_sub_category)
        ->with('service_category',$this->service_category);
    }

    public function service($id){
        $service = Service::where('id',$id)->where('active',1)->first();
        $service_count = Service::where('id',$id)->where('active',1)->get();
        if(count($service_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        $service_sub_category_count = ServiceSubCategory::where('id',$service->service_sub_category_id)->where('active',1)->get();
        if(count($service_sub_category_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        $service_category_count = ServiceCategory::where('id',$service->service_category_id)->where('active',1)->get();
        if(count($service_category_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        $allActiveService = Service::where('active',1)->where('id','<>',$id)->get();
        $service_sub_category = Service::where('service_sub_category_id',$service->service_sub_category_id)->where('id', '<>',$service->id)->where('active',1)->get();
        return view('pages.product.index')
        ->with('heroTitle', $service->title)
        ->with('service', $service)
        ->with('service_sub_category', $service_sub_category)
        ->with('allActiveService', $allActiveService)
        ->with('service_category',$this->service_category);
    }

    public function pageNotFound(){
        return view('pages.home.page404')
        ->with('heroTitle', 'Page Not Found')
        ->with('service_category',$this->service_category);
    }
}
