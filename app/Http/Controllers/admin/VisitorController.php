<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadRequest;
use App\Http\Requests\VisitorRequest;
use App\Models\admin\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $data['empList'] = Visitor::where('status','!=',DELETE_STATUS)->latest()->get();
        return view('visitor.list',$data);
    }

    public function addNewVisitor()
    {
        return view('visitor.action');
    }

    public function storeVisitor(VisitorRequest $request)
    {
        $storeEmployee = Visitor::create([
            'name'=>$request->post('name'),
            'phone'=>$request->post('phone'),
            'location'=>$request->post('location'),
            'source'=>$request->post('source'),
            'contact_date'=>$request->post('contact_date'),
            'status'=>$request->post('status'),
        ]);

        if ($storeEmployee){
            toast('Visitor created successfully.','success');
            return redirect()->route('visitor.list');
        }
    }
    public function updateVisitor(Request $request,$id)
    {
        $updateEmployee = Visitor::find($id)->update([
            'name'=>$request->post('name'),
            'phone'=>$request->post('phone'),
            'location'=>$request->post('location'),
            'source'=>$request->post('source'),
            'contact_date'=>$request->post('contact_date'),
            'status'=>$request->post('status'),
        ]);

        if ($updateEmployee){
            toast('Visitor updated successfully.','success');
            return redirect()->route('visitor.list');
        }
    }

    public function editVisitor($id)
    {
        $data['userInfo'] = Visitor::where('id',$id)->first();
        return view('visitor.action',$data);
    }

    public function deleteVisitor($id)
    {
        Visitor::where('id',$id)->update([
            'status'=>DELETE_STATUS
        ]);

        toast('Visitor deleted successfully.','success');
        return redirect()->back();
    }
}
