<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Models\Service;
use App\Models\ServiceDocument;
use App\Models\ServiceFaq;
use Illuminate\Support\Facades\Validator;
use File;


class ServiceController extends Controller
{
    //
    public function create(){
        $breadcrumb = "Create";
        $service_category = ServiceCategory::get();
        return view('admin.pages.service.create')->with('service_category', $service_category)->with('breadcrumb', $breadcrumb);
    }

    public function store_ajax(Request $req){
        $rules = array(
            "title" => "required",
            "service_category_id" => "required|integer",
            "service_sub_category_id" => "required|integer",
            "price" => "required|integer",
            "heading" => "required",
            "description" => "required",
            "content" => "required",
            "document"  => "required|array|min:1",
            "document.*"  => "required",
            "feature" => "required",
            "faq_question"  => "required|array|min:1",
            "faq_question.*"  => "required",
            "faq_answer"  => "required|array|min:1",
            "faq_answer.*"  => "required",
            "image" => "required|mimes:jpg,png,jpeg,webp|max:2048",
            "icon" => "required|mimes:jpg,png,jpeg,webp|max:2048",
        );
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json(["error"=>$validator->errors()], 400);
        }else{
            $serviceImage = time().'-'.rand(100,1000000).'-'.$req->image->getClientOriginalName();
            $req->image->move(public_path('service'), $serviceImage);
            $serviceIcon = time().'-'.rand(100,1000000).'-'.$req->icon->getClientOriginalName();
            $req->icon->move(public_path('service'), $serviceIcon);
            $service = new Service;
            $service->title = strip_tags($req->title);
            $service->price = strip_tags($req->price);
            $service->heading = strip_tags($req->heading);
            $service->description = strip_tags($req->description);
            $service->content = ($req->content);
            $service->feature = ($req->feature);
            $service->service_category_id = strip_tags($req->service_category_id);
            $service->service_sub_category_id = strip_tags($req->service_sub_category_id);
            $service->image = $serviceImage;
            $service->icon = $serviceIcon;
            $service->active = strip_tags($req->active) == "on" ? 1 : 0;
            $service->save();
            foreach($req->document as $document){
                $service_document = new ServiceDocument;
                $service_document->document = strip_tags($document);
                $service_document->service_id = $service->id;
                $service_document->save();
            }
            foreach($req->faq_question as $key=>$value){
                $service_faq = new ServiceFaq;
                $service_faq->faq_question = strip_tags($value);
                $service_faq->faq_answer = strip_tags($req->faq_answer[$key]);
                $service_faq->service_id = $service->id;
                $service_faq->save();
            }
            
            return response()->json(["success"=>true, "data"=>$service], 200);
        }
    }

    public function view(Request $request){
        $breadcrumb = "View";
        if ($request->has('search')) {
            $search = $request->input('search');
            $service = Service::where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('heading', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $service = Service::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.pages.service.display')->with('service', $service)->with('breadcrumb', $breadcrumb);
    }

    public function edit($id){
        $breadcrumb = "Edit";
        $serviceCount = Service::where('id',$id)->get();
        if(count($serviceCount)==0){
            return redirect()->intended('admin/service/view')->with('error_status', 'Invalid ID');
        }
        $service = Service::where('id',$id)->first();
        $service_category = ServiceCategory::get();
        $service_sub_category = ServiceSubCategory::where('service_category_id',$service->service_category_id)->get();
        return view('admin.pages.service.edit')->with('service', $service)->with('service_category', $service_category)->with('service_sub_category', $service_sub_category)->with('breadcrumb', $breadcrumb);
    }

    public function update_ajax(Request $req, $id){
        $rules = array(
            "title" => "required",
            "service_category_id" => "required|integer",
            "service_sub_category_id" => "required|integer",
            "price" => "required|integer",
            "heading" => "required",
            "description" => "required",
            "content" => "required",
            "feature" => "required",
        );
        if($req->hasFile('icon')){
            $rules["icon"] = "required|mimes:jpg,png,jpeg,webp|max:2048";
        }
        if($req->hasFile('image')){
            $rules["image"] = "required|mimes:jpg,png,jpeg,webp|max:2048";
        }
        $service = Service::where('id',$id)->first();
        if($service->ServiceDocument->count()>0){
            $rules["document"] = "nullable|array|min:1";
            $rules["document.*"] = "nullable";
            $rules["document_exist"] = "required|array|min:".$service->ServiceDocument->count();
            $rules["document_exist.*"] = "required";
        }else{
            $rules["document"] = "required|array|min:1";
            $rules["document.*"] = "required";
        }
        if($service->ServiceFaq->count()>0){
            $rules["faq_question"] = "nullable|array|min:1";
            $rules["faq_question.*"] = "nullable";
            $rules["faq_answer"] = "nullable|array|min:1";
            $rules["faq_answer.*"] = "nullable";
            $rules["faq_question_exist"] = "required|array|min:".$service->ServiceFaq->count();
            $rules["faq_question_exist.*"] = "required";
            $rules["faq_answer_exist"] = "required|array|min:".$service->ServiceFaq->count();
            $rules["faq_answer_exist.*"] = "required";
        }else{
            $rules["faq_question"] = "required|array|min:1";
            $rules["faq_question.*"] = "required";
            $rules["faq_answer"] = "required|array|min:1";
            $rules["faq_answer.*"] = "required";
        }
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json(["error"=>$validator->errors()], 400);
        }else{
            if($req->hasFile('image')){
                unlink(public_path('service/'.$service->image)); 
                $serviceImage = time().'-'.rand(100,1000000).'-'.$req->image->getClientOriginalName();
                $req->image->move(public_path('service'), $serviceImage);
                $service->image = $serviceImage;
            }
            if($req->hasFile('icon')){
                unlink(public_path('service/'.$service->icon)); 
                $serviceIcon = time().'-'.rand(100,1000000).'-'.$req->icon->getClientOriginalName();
                $req->icon->move(public_path('service'), $serviceIcon);
                $service->icon = $serviceIcon;
            }
            $service->title = strip_tags($req->title);
            $service->price = strip_tags($req->price);
            $service->heading = strip_tags($req->heading);
            $service->description = strip_tags($req->description);
            $service->content = ($req->content);
            $service->feature = ($req->feature);
            $service->service_category_id = strip_tags($req->service_category_id);
            $service->service_sub_category_id = strip_tags($req->service_sub_category_id);
            $service->active = strip_tags($req->active) == "on" ? 1 : 0;
            $service->save();
            if(!empty($req->document)){
                foreach($req->document as $document){
                    $service_document = new ServiceDocument;
                    $service_document->document = strip_tags($document);
                    $service_document->service_id = $service->id;
                    $service_document->save();
                }
            }
            if(!empty($req->document_id)){
                for($i=0;$i<count($req->document_id);$i++){
                    $service_document = ServiceDocument::where('id',$req->document_id[$i])->first();
                    $service_document->document = strip_tags($req->document_exist[$i]);
                    $service_document->save();
                }
            }
            if(!empty($req->faq_question)){
                foreach($req->faq_question as $key=>$value){
                    $service_faq = new ServiceFaq;
                    $service_faq->faq_question = strip_tags($value);
                    $service_faq->faq_answer = strip_tags($req->faq_answer[$key]);
                    $service_faq->service_id = $service->id;
                    $service_faq->save();
                }
            }
            if(!empty($req->faq_id)){
                for($i=0;$i<count($req->faq_id);$i++){
                    $service_faq = ServiceFaq::where('id',$req->faq_id[$i])->first();
                    $service_faq->faq_question = strip_tags($req->faq_question_exist[$i]);
                    $service_faq->faq_answer = strip_tags($req->faq_answer_exist[$i]);
                    $service_faq->service_id = $service->id;
                    $service_faq->save();
                }
            }
            
            return response()->json(["success"=>true, "data"=>$service], 200);
        }
    }

    public function delete($id){
        $serviceCount = Service::where('id',$id)->get();
        if(count($serviceCount)==0){
            return redirect()->intended('admin/service/view')->with('error_status', 'Invalid ID');
        }
        $service = Service::where('id',$id)->first();
        unlink(public_path('service/'.$service->image)); 
        unlink(public_path('service/'.$service->icon)); 
        $service->delete();
        $service_document = ServiceDocument::where('service_id',$service->id)->delete();
        $service_faq = ServiceFaq::where('service_id',$service->id)->delete();
        return redirect()->intended('admin/service/view')->with('success_status', 'Data Deleted successfully.');
    }

    public function delete_document($id){
        $serviceDocumentCount = ServiceDocument::where('id',$id)->get();
        if(count($serviceDocumentCount)==0){
            return redirect()->intended('admin/service/view')->with('error_status', 'Invalid ID');
        }
        $serviceDocument = ServiceDocument::where('id',$id)->first();
        $serviceDocument->delete();
        return redirect()->intended('admin/service/edit/'.$serviceDocument->service_id)->with('success_status', 'Data Deleted successfully.');
    }

    public function delete_faq($id){
        $serviceFaqCount = ServiceFaq::where('id',$id)->get();
        if(count($serviceFaqCount)==0){
            return redirect()->intended('admin/service/view')->with('error_status', 'Invalid ID');
        }
        $serviceFaq = ServiceFaq::where('id',$id)->first();
        $serviceFaq->delete();
        return redirect()->intended('admin/service/edit/'.$serviceFaq->service_id)->with('success_status', 'Data Deleted successfully.');
    }

    public function preview($id){
        $service = Service::where('id',$id)->where('active',1)->first();
        $service_count = Service::where('id',$id)->where('active',1)->get();
        if(count($service_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        $service_sub_category_count = ServiceSubCategory::where('id',$service->service_sub_category_id)->where('active',1)->get();
        if(count($service_sub_category_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        $service_category_count = ServiceSubCategory::where('id',$service->service_category_id)->where('active',1)->get();
        if(count($service_category_count)==0){
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        $allActiveService = Service::where('active',1)->where('id','<>',$id)->get();
        $service_sub_category = Service::where('service_sub_category_id',$service->service_sub_category_id)->where('id', '<>',$service->id)->where('active',1)->get();
        $service_category = ServiceCategory::where('active',1)->get();
        
        return view('admin.pages.service.preview')
        ->with('heroTitle', $service->title)
        ->with('service', $service)
        ->with('service_sub_category', $service_sub_category)
        ->with('allActiveService', $allActiveService)
        ->with('service_category',$service_category);
    }

    public function copy($id){
        $breadcrumb = "Copy";
        $serviceCount = Service::where('id',$id)->get();
        if(count($serviceCount)==0){
            return redirect()->intended('admin/service/view')->with('error_status', 'Invalid ID');
        }
        $service = Service::where('id',$id)->first();
        $service_category = ServiceCategory::get();
        $service_sub_category = ServiceSubCategory::where('service_category_id',$service->service_category_id)->get();
        return view('admin.pages.service.copy')->with('service', $service)->with('service_category', $service_category)->with('service_sub_category', $service_sub_category)->with('breadcrumb', $breadcrumb);
    }

    public function copy_ajax(Request $req, $id){
        $rules = array(
            "title" => "required",
            "service_category_id" => "required|integer",
            "service_sub_category_id" => "required|integer",
            "price" => "required|integer",
            "heading" => "required",
            "description" => "required",
            "content" => "required",
            "feature" => "required",
            "document" => "required|array|min:1",
            "document.*" => "required",
            "faq_question" => "required|array|min:1",
            "faq_question.*" => "required",
            "faq_answer" => "required|array|min:1",
            "faq_answer.*" => "required",
        );
        if($req->hasFile('icon')){
            $rules["icon"] = "required|mimes:jpg,png,jpeg,webp|max:2048";
        }
        if($req->hasFile('image')){
            $rules["image"] = "required|mimes:jpg,png,jpeg,webp|max:2048";
        }
        
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json(["error"=>$validator->errors()], 400);
        }else{
            $service = new Service;
            if($req->hasFile('image')){
                $serviceImage = time().'-'.rand(100,1000000).'-'.$req->image->getClientOriginalName();
                $req->image->move(public_path('service'), $serviceImage);
                $service->image = $serviceImage;
            }else{
                $exist_service = Service::where('id',$id)->first();
                $serviceImage = time().'-'.rand(100,1000000).'-'.$exist_service->image;
                File::copy(public_path('service/'.$exist_service->image), public_path('service/'.$serviceImage));
                $service->image = $serviceImage;
            }
            if($req->hasFile('icon')){
                $serviceIcon = time().'-'.rand(100,1000000).'-'.$req->icon->getClientOriginalName();
                $req->icon->move(public_path('service'), $serviceIcon);
                $service->icon = $serviceIcon;
            }else{
                $exist_service = Service::where('id',$id)->first();
                $serviceIcon = time().'-'.rand(100,1000000).'-'.$exist_service->icon;
                File::copy(public_path('service/'.$exist_service->icon), public_path('service/'.$serviceIcon));
                $service->icon = $serviceIcon;
            }
            $service->title = strip_tags($req->title);
            $service->price = strip_tags($req->price);
            $service->heading = strip_tags($req->heading);
            $service->description = strip_tags($req->description);
            $service->content = ($req->content);
            $service->feature = ($req->feature);
            $service->service_category_id = strip_tags($req->service_category_id);
            $service->service_sub_category_id = strip_tags($req->service_sub_category_id);
            $service->active = strip_tags($req->active) == "on" ? 1 : 0;
            $service->save();
            foreach($req->document as $document){
                $service_document = new ServiceDocument;
                $service_document->document = strip_tags($document);
                $service_document->service_id = $service->id;
                $service_document->save();
            }
            foreach($req->faq_question as $key=>$value){
                $service_faq = new ServiceFaq;
                $service_faq->faq_question = strip_tags($value);
                $service_faq->faq_answer = strip_tags($req->faq_answer[$key]);
                $service_faq->service_id = $service->id;
                $service_faq->save();
            }
            
            return response()->json(["success"=>true, "data"=>$service], 200);
        }
    }

}
