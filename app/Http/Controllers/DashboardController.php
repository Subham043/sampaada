<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ServiceRequest;
use App\Models\ServicePayment;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    //
    public function index(){
        $enquiryCount = Enquiry::count();
        $serviceRequestCount = ServiceRequest::count();
        $servicePaymentCount = ServicePayment::where('payment_status',1)->count();
        return view('admin.pages.dashboard')->with('enquiryCount',$enquiryCount)->with('serviceRequestCount',$serviceRequestCount)->with('servicePaymentCount',$servicePaymentCount);
    }

    public function logout() {
        Auth::logout();
  
        return redirect('admin/login');
    }

    public function change_password(){
        $breadcrumb = "Change Password";
        $user = Auth::user();
        return view('admin.pages.user.password')->with('breadcrumb', $breadcrumb);
    }

    public function update_password(Request $req){
        $breadcrumb = "Change Password";
        $validator = $req->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required_with:new_password|same:new_password',
        ]);
        $user = Auth::user();
        if (!Hash::check(strip_tags($req->current_password), $user->password)) {
                   
            return redirect()->intended('admin/user/change-password')->with('error_status', 'Invalid Current Password.');
        }else {
            $user->password = bcrypt($req->new_password);
            $user->save();
    
            return redirect()->intended('admin/user/change-password')->with('success_status', 'Password Updated Successfully.');
        }
        return view('admin.pages.user.password')->with('breadcrumb', $breadcrumb);
    }

}
