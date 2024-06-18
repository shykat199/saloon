<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['empList'] = User::where('role','!=',ADMIN_ROLE)->where('status','!=',DELETE_STATUS)->latest()->get();
        return view('employee.list',$data);
    }

    public function addNewEmp()
    {
        return view('employee.action');
    }

    public function storeEmp(EmployeeRequest $request)
    {
        $storeEmployee = User::create([
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'phone'=>$request->post('phone'),
            'position'=>EMP_POSITION,
            'role'=>EMPLOYEE_ROLE,
            'password'=>Hash::make($request->post('password')),
            'salary'=>$request->post('salary'),
            'join_date'=>$request->post('join_date'),
            'status'=>$request->post('status'),
        ]);

        if ($storeEmployee){
            toast('Employee created successfully.','success');
            return redirect()->route('employee.list');
        }
    }
    public function updateEmp(Request $request,$id)
    {
        $updateEmployee = User::find($id)->update([
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'phone'=>$request->post('phone'),
            'salary'=>$request->post('salary'),
            'join_date'=>$request->post('join_date'),
            'status'=>$request->post('status'),
        ]);

        if ($updateEmployee){
            toast('Employee updated successfully.','success');
            return redirect()->route('employee.list');
        }
    }

    public function editEmp($id)
    {
        $data['userInfo'] = User::where('id',$id)->first();
        return view('employee.action',$data);
    }

    public function deleteEmp($id)
    {
        User::where('id',$id)->update([
            'status'=>DELETE_STATUS
        ]);

        toast('Employee deleted successfully.','success');
        return redirect()->back();
    }
}
