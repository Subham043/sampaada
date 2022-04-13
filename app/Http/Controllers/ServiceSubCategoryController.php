<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;

class ServiceSubCategoryController extends Controller
{
    //
    public function create(){
        $breadcrumb = "Create";
        $service_category = ServiceCategory::get();
        return view('admin.pages.service_sub_category.create')->with('service_category', $service_category)->with('breadcrumb', $breadcrumb);
    }

    public function store(Request $req){
        $breadcrumb = "Create";
        $validator = $req->validate([
            'name' => 'required|string',
            'service_category_id' => 'required',
        ]);
        $service_category = ServiceCategory::get();
        $service_sub_category = new ServiceSubCategory;
        $service_sub_category->name = strip_tags($req->name);
        $service_sub_category->service_category_id = strip_tags($req->service_category_id);
        $service_sub_category->active = strip_tags($req->active) == "on" ? 1 : 0;
        $result = $service_sub_category->save();
        if($result){
            return redirect()->intended('admin/service-sub-category/create')->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended('admin/service-sub-category/create')->with('error_status', 'Something went wrong. Please try again');
        }

        return view('admin.pages.service_sub_category.create')->with('service_category', $service_category)->with('breadcrumb', $breadcrumb);
    }

    public function view(Request $request){
        $breadcrumb = "View";
        if ($request->has('search')) {
            $search = $request->input('search');
            $service_sub_category = ServiceSubCategory::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $service_sub_category = ServiceSubCategory::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.pages.service_sub_category.display')->with('service_sub_category', $service_sub_category)->with('breadcrumb', $breadcrumb);
    }

    public function ajax_view($service_category_id){
        $service_sub_category = ServiceSubCategory::where('service_category_id', $service_category_id)->get();
        return response()->json(["service_sub_category"=>$service_sub_category], 200);
    }

    public function edit($id){
        $breadcrumb = "Edit";
        $service_category = ServiceCategory::get();
        $service_sub_categoryCount = ServiceSubCategory::where('id',$id)->get();
        if(count($service_sub_categoryCount)==0){
            return redirect()->intended('admin/service-sub-category/view')->with('error_status', 'Invalid ID');
        }
        $service_sub_category = ServiceSubCategory::where('id',$id)->first();
        return view('admin.pages.service_sub_category.edit')->with('service_category', $service_category)->with('service_sub_category', $service_sub_category)->with('breadcrumb', $breadcrumb);
    }

    public function update(Request $req, $id){
        $breadcrumb = "Edit";
        $service_category = ServiceCategory::get();
        $service_sub_categoryCount = ServiceSubCategory::where('id',$id)->get();
        if(count($service_sub_categoryCount)==0){
            return redirect()->intended('admin/service-sub-category/view')->with('error_status', 'Invalid ID');
        }
        $validator = $req->validate([
            'name' => 'required',
            'service_category_id' => 'required',
        ]);

        $service_sub_category = ServiceSubCategory::where('id',$id)->first();
        
        $service_sub_category->name = strip_tags($req->name);
        $service_sub_category->service_category_id = strip_tags($req->service_category_id);
        $service_sub_category->active = strip_tags($req->active) == "on" ? 1 : 0;
        $result = $service_sub_category->save();
        if($result){
            return redirect()->intended('admin/service-sub-category/edit/'.$id)->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended('admin/service-sub-category/edit/'.$id)->with('error_status', 'Something went wrong. Please try again');
        }

        return view('admin.pages.service_sub_category.edit')->with('service_category', $service_category)->with('service_sub_category', $service_sub_category)->with('breadcrumb', $breadcrumb);
    }

    public function delete($id){
        $service_sub_categoryCount = ServiceSubCategory::where('id',$id)->get();
        if(count($service_sub_categoryCount)==0){
            return redirect()->intended('admin/service-sub-category/view')->with('error_status', 'Invalid ID');
        }
        $service_sub_category = ServiceSubCategory::where('id',$id)->first();
        $service_sub_category->delete();
        return redirect()->intended('admin/service-sub-category/view')->with('success_status', 'Data Deleted successfully.');
    }

}
