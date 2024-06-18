<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\admin\Service;
use App\Models\admin\Visitor;
use App\Models\admin\VisitorService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data['empList'] = Service::where('status','!=',DELETE_STATUS)->latest()->get();
        return view('service.list',$data);
    }

    public function visitorService()
    {
        $data['services']=Service::where('status','=',ACTIVE_STATUS)->get();
        $data['chunks']=$data['services']->chunk(5);
        $data['visitors']=Visitor::where('status','=',ACTIVE_STATUS)->get();
        $data['empList']=VisitorService::with('visitor')->latest()->get();
        return view('service.visitor-service',$data);
    }

    public function storeVisitorService(Request $request)
    {

      $service= VisitorService::create([
           'visitor_id' => $request->post('visitor'),
           'service_id' => implode("<||>", $request->post('serviceId')),
           'total_amt' => $request->post('totalPrice'),
           'paid_amt' => $request->post('paidAmt'),
           'due_amt' => $request->post('dueAmt'),
       ]);

      if ($service){
          toast("Data stored successfully",'success');
          return redirect()->route('service.visitor.page');
      }
    }

    public function addNewService()
    {
        return view('service.action');
    }

    public function storeService(ServiceRequest $request)
    {
        $storeEmployee = Service::create([
            'name'=>$request->post('name'),
            'price'=>$request->post('price'),
            'status'=>$request->post('status'),
        ]);

        if ($storeEmployee){
            toast('Service created successfully.','success');
            return redirect()->route('service.list');
        }
    }
    public function updateService(Request $request,$id)
    {
        $updateEmployee = Service::find($id)->update([
            'name'=>$request->post('name'),
            'price'=>$request->post('price'),
            'status'=>$request->post('status'),
        ]);

        if ($updateEmployee){
            toast('Lead updated successfully.','success');
            return redirect()->route('service.list');
        }
    }

    public function editService($id)
    {
        $data['userInfo'] = Service::where('id',$id)->first();
        return view('service.action',$data);
    }

    public function deleteService($id)
    {
        Service::where('id',$id)->update([
            'status'=>DELETE_STATUS
        ]);

        toast('Employee deleted successfully.','success');
        return redirect()->back();
    }
}
