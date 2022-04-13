<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\ServicePayment;
use App\Models\ServiceAddon;
use Illuminate\Support\Facades\Validator;

class ServiceRequestController extends Controller
{
    public function store_ajax(Request $req){
        $rules = array(
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|integer',
            "service"  => "required|array|min:1",
            "service.*"  => "required",
        );
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json(["error"=>$validator->errors()], 400);
        }else{
            $amount = 0;
            $service_request = new ServiceRequest;
            $service_request->fname = strip_tags($req->fname);
            $service_request->lname = strip_tags($req->lname);
            $service_request->email = strip_tags($req->email);
            $service_request->phone = strip_tags($req->phone);
            $service_request->save();
            
            foreach($req->service as $service_aon){
                $serviceCount = Service::where('id',$service_aon)->get();
                if(count($serviceCount)>0){
                    $service_addon = new ServiceAddon;
                    $service_addon->service_request_id = $service_request->id;
                    $service_addon->service_id = strip_tags($service_aon);
                    $service_addon->save();
                    $service = Service::where('id',$service_aon)->first();
                    $amount = $amount + (int)$service->price;
                }
            }

            $service_payment = new ServicePayment;
            $service_payment->amount = $amount;
            $service_payment->service_request_id = $service_request->id;
            $service_payment->save();
            return response()->json(["success"=>true, "service_request"=>$service_request], 200);
        }
    }

    public function payment($id){
        $service_requestCount = ServiceRequest::where('id', $id)->get();
        if(count($service_requestCount)>0){
            $service_paymentCount = ServicePayment::where('service_request_id', $id)->where('payment_status',0)->get();
            if(count($service_paymentCount)>0){
                $service_request = ServiceRequest::where('id', $id)->first();
                return view('pages.payment.index')
                    ->with('service_request', $service_request);
            }
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        return redirect()->intended('404')->with('error_status', 'Invalid ID');
    }

    public function payment_ajax(Request $req, $id)
    {
        $service_requestCount = ServiceRequest::where('id', $id)->get();
        if(count($service_requestCount)>0){
            $service_paymentCount = ServicePayment::where('service_request_id', $id)->where('payment_status',0)->get();
            if(count($service_paymentCount)>0){
                $rules = array(
                    'payment_id' => 'required',
                );
                $validator = Validator::make($req->all(), $rules);
                if($validator->fails()){
                    return response()->json(["error"=>$validator->errors()], 400);
                }else{
                    $service_payment = ServicePayment::where('service_request_id', $id)->first();
                    $service_payment->payment_status = 1;
                    $service_payment->payment_id = $req->payment_id;
                    $service_payment->save();
                    return response()->json(["success"=>true, "status"=>"success"], 200);
                }
            }
            return redirect()->intended('404')->with('error_status', 'Invalid ID');
        }
        return redirect()->intended('404')->with('error_status', 'Invalid ID');
    }

    public function service_request_view(Request $request){
        $breadcrumb = "View";
        if ($request->has('search')) {
            $search = $request->input('search');
            $service_request = ServiceRequest::where(function ($query) use ($search) {
                $query->where('fname', 'like', '%' . $search . '%')
                        ->orWhere('lname', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $service_request = ServiceRequest::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.pages.service_request.display')->with('service_request', $service_request)->with('breadcrumb', $breadcrumb);
    }

    public function service_request_view_id($id){
        $breadcrumb = "View";
        $service_requestCount = ServiceRequest::where('id',$id)->get();
        if(count($service_requestCount)==0){
            return redirect()->intended('admin/service-request/view')->with('error_status', 'Invalid ID');
        }
        $service_request = ServiceRequest::where('id',$id)->first();
        return view('admin.pages.service_request.view')->with('service_request', $service_request)->with('breadcrumb', $breadcrumb);
    }
}