<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadRequest;
use App\Http\Requests\VisitorRequest;
use App\Models\admin\Service;
use App\Models\admin\Visitor;
use App\Models\admin\VisitorService;
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
        $data['services']=Service::where('status','=',ACTIVE_STATUS)->get();
        $data['chunks']=$data['services']->chunk(6);
        return view('visitor.action',$data);
    }

    public function storeVisitor(VisitorRequest $request)
    {

        $storeVisitor = Visitor::create([
            'name'=>$request->post('name'),
            'phone'=>$request->post('phone'),
            'location'=>$request->post('location'),
            'source'=>$request->post('source'),
            'contact_date'=>$request->post('contact_date'),
            'status'=>$request->post('status'),
        ]);

        if ($request->post('serviceId') && $storeVisitor){
            VisitorService::create([
                'visitor_id'=>$storeVisitor->id,
                'service_id' => implode("<||>", $request->post('serviceId')),
                'total_amt' => $request->post('totalPrice'),
                'paid_amt' => $request->post('paidAmt'),
                'due_amt' => $request->post('dueAmt'),
            ]);
        }

        if ($storeVisitor){
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

        $visitorServiceId = $request->post('visitorServiceId');
        $serviceIds = $request->post('serviceId');

        if ($visitorServiceId === null && $serviceIds) {
            VisitorService::create([
                'visitor_id' => $id,
                'service_id' => implode("<||>", $serviceIds),
                'total_amt' => $request->post('totalPrice'),
                'paid_amt' => $request->post('paidAmt'),
                'due_amt' => $request->post('dueAmt'),
            ]);
        } else {
            $data = VisitorService::where('visitor_id', $visitorServiceId)->first();
            if ($data) {
                $data->delete();
                VisitorService::create([
                    'visitor_id' => $id,
                    'service_id' => implode("<||>", $serviceIds),
                    'total_amt' => $request->post('totalPrice'),
                    'paid_amt' => $request->post('paidAmt'),
                    'due_amt' => $request->post('dueAmt'),
                ]);
            }
        }

        if ($updateEmployee){
            toast('Visitor updated successfully.','success');
            return redirect()->route('visitor.list');
        }
    }

    public function editVisitor($id)
    {
        $data['userInfo'] = Visitor::where('id',$id)->first();
        $data['services']=Service::where('status','=',ACTIVE_STATUS)->get();
        $data['chunks']=$data['services']->chunk(6);
        $data['serviceData']=VisitorService::where('visitor_id',$id)->first();
        if (!empty($data['serviceData']->service_id)){
            $data['serviceList']=explode('<||>',$data['serviceData']->service_id);
        }

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
