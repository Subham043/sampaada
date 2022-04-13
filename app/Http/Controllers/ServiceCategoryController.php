<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    //
    public function create(){
        $breadcrumb = "Create";
        return view('admin.pages.service_category.create')->with('breadcrumb', $breadcrumb);
    }

    public function store(Request $req){
        $breadcrumb = "Create";
        $validator = $req->validate([
            'name' => 'required|string',
        ]);
        
        $service_category = new ServiceCategory;
        $service_category->name = strip_tags($req->name);
        $service_category->active = strip_tags($req->active) == "on" ? 1 : 0;
        $result = $service_category->save();
        if($result){
            return redirect()->intended('admin/service-category/create')->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended('admin/service-category/create')->with('error_status', 'Something went wrong. Please try again');
        }

        return view('admin.pages.service_category.create')->with('breadcrumb', $breadcrumb);
    }

    public function view(Request $request){
        $breadcrumb = "View";
        if ($request->has('search')) {
            $search = $request->input('search');
            $service_category = ServiceCategory::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $service_category = ServiceCategory::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.pages.service_category.display')->with('service_category', $service_category)->with('breadcrumb', $breadcrumb);
    }

    public function edit($id){
        $breadcrumb = "Edit";
        $service_categoryCount = ServiceCategory::where('id',$id)->get();
        if(count($service_categoryCount)==0){
            return redirect()->intended('admin/service-category/view')->with('error_status', 'Invalid ID');
        }
        $service_category = ServiceCategory::where('id',$id)->first();
        return view('admin.pages.service_category.edit')->with('service_category', $service_category)->with('breadcrumb', $breadcrumb);
    }

    public function update(Request $req, $id){
        $breadcrumb = "Edit";
        $service_categoryCount = ServiceCategory::where('id',$id)->get();
        if(count($service_categoryCount)==0){
            return redirect()->intended('admin/service-category/view')->with('error_status', 'Invalid ID');
        }
        $validator = $req->validate([
            'name' => 'required',
        ]);

        $service_category = ServiceCategory::where('id',$id)->first();
        
        $service_category->name = strip_tags($req->name);
        $service_category->active = strip_tags($req->active) == "on" ? 1 : 0;
        $result = $service_category->save();
        if($result){
            return redirect()->intended('admin/service-category/edit/'.$id)->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended('admin/service-category/edit/'.$id)->with('error_status', 'Something went wrong. Please try again');
        }

        return view('admin.pages.service_category.edit')->with('service_category', $service_category)->with('breadcrumb', $breadcrumb);
    }

    public function delete($id){
        $service_categoryCount = ServiceCategory::where('id',$id)->get();
        if(count($service_categoryCount)==0){
            return redirect()->intended('admin/service-category/view')->with('error_status', 'Invalid ID');
        }
        $service_category = ServiceCategory::where('id',$id)->first();
        $service_category->delete();
        return redirect()->intended('admin/service-category/view')->with('success_status', 'Data Deleted successfully.');
    }

}
