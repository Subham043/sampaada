<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    public function create(Request $req){
        $rules = array(
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'service' => 'required',
            'message' => 'required',
        );
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json(["error"=>$validator->errors()], 400);
        }else{
            $enquiry = new Enquiry;
            $enquiry->fname = strip_tags($req->fname);
            $enquiry->lname = strip_tags($req->lname);
            $enquiry->email = strip_tags($req->email);
            $enquiry->phone = strip_tags($req->phone);
            $enquiry->service = strip_tags($req->service);
            $enquiry->message = strip_tags($req->message);
            $enquiry->save();
            return response()->json(["success"=>true, "data"=>$enquiry], 200);
        }
    }

    public function view(Request $request){
        $breadcrumb = "View";
        if ($request->has('search')) {
            $search = $request->input('search');
            $enquiry = Enquiry::where(function ($query) use ($search) {
                $query->where('fname', 'like', '%' . $search . '%')
                        ->orWhere('lname', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $enquiry = Enquiry::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.pages.enquiry.display')->with('enquiry', $enquiry)->with('breadcrumb', $breadcrumb);
    }

    public function view_id($id){
        $breadcrumb = "View";
        $enquiryCount = Enquiry::where('id',$id)->get();
        if(count($enquiryCount)==0){
            return redirect()->intended('admin/enquiry')->with('error_status', 'Invalid ID');
        }
        $enquiry = Enquiry::where('id',$id)->first();
        return view('admin.pages.enquiry.view')->with('enquiry', $enquiry)->with('breadcrumb', $breadcrumb);
    }

    public function edit($id){
        $breadcrumb = "Edit";
        $enquiryCount = Enquiry::where('id',$id)->get();
        if(count($enquiryCount)==0){
            return redirect()->intended('admin/enquiry')->with('error_status', 'Invalid ID');
        }
        $enquiry = Enquiry::where('id',$id)->first();
        return view('admin.pages.enquiry.edit')->with('enquiry', $enquiry)->with('breadcrumb', $breadcrumb);
    }

    public function update(Request $req, $id){
        $breadcrumb = "Edit";
        $enquiryCount = Enquiry::where('id',$id)->get();
        if(count($enquiryCount)==0){
            return redirect()->intended('admin/enquiry')->with('error_status', 'Invalid ID');
        }
        $validator = $req->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'service' => 'required',
            'message' => 'required',
        ]);

        $enquiry = Enquiry::where('id',$id)->first();
        
        $enquiry->fname = strip_tags($req->fname);
        $enquiry->lname = strip_tags($req->lname);
        $enquiry->message = strip_tags($req->message);
        $enquiry->email = strip_tags($req->email);
        $enquiry->phone = strip_tags($req->phone);
        $enquiry->service = strip_tags($req->service);
        $result = $enquiry->save();
        if($result){
            return redirect()->intended('admin/enquiry/edit/'.$id)->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended('admin/enquiry/edit/'.$id)->with('error_status', 'Something went wrong. Please try again');
        }

        return view('admin.pages.enquiry.edit')->with('enquiry', $enquiry)->with('breadcrumb', $breadcrumb);
    }

    public function delete($id){
        $enquiryCount = Enquiry::where('id',$id)->get();
        if(count($enquiryCount)==0){
            return redirect()->intended('admin/enquiry')->with('error_status', 'Invalid ID');
        }
        $enquiry = Enquiry::where('id',$id)->first();
        $enquiry->delete();
        return redirect()->intended('admin/enquiry')->with('success_status', 'Data Deleted successfully.');
    }

}
