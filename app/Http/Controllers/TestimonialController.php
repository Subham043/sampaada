<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    //
    public function create(){
        $breadcrumb = "Create";
        return view('admin.pages.testimonial.create')->with('breadcrumb', $breadcrumb);
    }

    public function store(Request $req){
        $breadcrumb = "Create";
        $validator = $req->validate([
            'name' => 'required',
            'place' => 'required',
            'message' => 'required',
            'rating' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        $newImage = time().'-'.$req->image->getClientOriginalName();
        $req->image->move(public_path('testimonial'), $newImage);
        $testimonial = new Testimonial;
        $testimonial->name = strip_tags($req->name);
        $testimonial->image = $newImage;
        $testimonial->message = strip_tags($req->message);
        $testimonial->place = strip_tags($req->place);
        $testimonial->rating = strip_tags($req->rating);
        $testimonial->active = strip_tags($req->active) == "on" ? 1 : 0;
        $result = $testimonial->save();
        if($result){
            return redirect()->intended('admin/testimonial/create')->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended('admin/testimonial/create')->with('error_status', 'Something went wrong. Please try again');
        }

        return view('admin.pages.testimonial.create')->with('breadcrumb', $breadcrumb);
    }

    public function view(Request $request){
        $breadcrumb = "View";
        if ($request->has('search')) {
            $search = $request->input('search');
            $testimonial = Testimonial::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('place', 'like', '%' . $search . '%')
                      ->orWhere('message', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $testimonial = Testimonial::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.pages.testimonial.display')->with('testimonial', $testimonial)->with('breadcrumb', $breadcrumb);
    }

    public function edit($id){
        $breadcrumb = "Edit";
        $testimonialCount = Testimonial::where('id',$id)->get();
        if(count($testimonialCount)==0){
            return redirect()->intended('admin/testimonial/view')->with('error_status', 'Invalid ID');
        }
        $testimonial = Testimonial::where('id',$id)->first();
        return view('admin.pages.testimonial.edit')->with('testimonial', $testimonial)->with('breadcrumb', $breadcrumb);
    }

    public function update(Request $req, $id){
        $breadcrumb = "Edit";
        $testimonialCount = Testimonial::where('id',$id)->get();
        if(count($testimonialCount)==0){
            return redirect()->intended('admin/testimonial/view')->with('error_status', 'Invalid ID');
        }
        $validator = $req->validate([
            'name' => 'required',
            'place' => 'required',
            'message' => 'required',
            'rating' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $testimonial = Testimonial::where('id',$id)->first();

        if($req->hasFile('image')){
            unlink(public_path('testimonial/'.$testimonial->image)); 
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $req->image->move(public_path('testimonial'), $newImage);
            $testimonial->image = $newImage;
        }
        
        $testimonial->name = strip_tags($req->name);
        $testimonial->message = strip_tags($req->message);
        $testimonial->place = strip_tags($req->place);
        $testimonial->rating = strip_tags($req->rating);
        $testimonial->active = strip_tags($req->active) == "on" ? 1 : 0;
        $result = $testimonial->save();
        if($result){
            return redirect()->intended('admin/testimonial/edit/'.$id)->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended('admin/testimonial/edit/'.$id)->with('error_status', 'Something went wrong. Please try again');
        }

        return view('admin.pages.testimonial.edit')->with('testimonial', $testimonial)->with('breadcrumb', $breadcrumb);
    }

    public function delete($id){
        $testimonialCount = Testimonial::where('id',$id)->get();
        if(count($testimonialCount)==0){
            return redirect()->intended('admin/testimonial/view')->with('error_status', 'Invalid ID');
        }
        $testimonial = Testimonial::where('id',$id)->first();
        unlink(public_path('testimonial/'.$testimonial->image)); 
        $testimonial->delete();
        return redirect()->intended('admin/testimonial/view')->with('success_status', 'Data Deleted successfully.');
    }

}
