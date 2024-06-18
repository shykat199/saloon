<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\LeadRequest;
use App\Models\admin\User;
use App\Models\admin\UserLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLeadController extends Controller
{
    public function index()
    {
        $data['empList'] = UserLead::where('status','!=',DELETE_STATUS)->latest()->get();
        return view('lead.list',$data);
    }

    public function addNewLead()
    {
        return view('lead.action');
    }

    public function storeLead(LeadRequest $request)
    {
        $storeEmployee = UserLead::create([
            'name'=>$request->post('name'),
            'phone'=>$request->post('phone'),
            'location'=>$request->post('location'),
            'source'=>$request->post('source'),
            'contact_date'=>$request->post('contact_date'),
            'status'=>$request->post('status'),
        ]);

        if ($storeEmployee){
            toast('Lead created successfully.','success');
            return redirect()->route('lead.list');
        }
    }
    public function updateLead(Request $request,$id)
    {
        $updateEmployee = UserLead::find($id)->update([
            'name'=>$request->post('name'),
            'phone'=>$request->post('phone'),
            'location'=>$request->post('location'),
            'source'=>$request->post('source'),
            'contact_date'=>$request->post('contact_date'),
            'status'=>$request->post('status'),
        ]);

        if ($updateEmployee){
            toast('Lead updated successfully.','success');
            return redirect()->route('lead.list');
        }
    }

    public function editLead($id)
    {
        $data['userInfo'] = UserLead::where('id',$id)->first();
        return view('lead.action',$data);
    }

    public function deleteLead($id)
    {
        UserLead::where('id',$id)->update([
            'status'=>DELETE_STATUS
        ]);

        toast('Employee deleted successfully.','success');
        return redirect()->back();
    }
}
