<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Education;
use App\Models\Referances;
use App\Models\Experiance;

class EmployeeController extends Controller
{
    public function index(){
        return view('admin.employee.list');
    }
    public function listAjax(Request $request){
        $columns = ['name','email','designation', 'phone','action'];
        $totalData = Employee::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');

        if(isset($columns[$request->input('order.0.column')]) && $request->input('order.0.dir') != ""){
            $order = $columns[$request->input('order.0.column')];
            if ($order == 'name'){
                $order = 'employees.first_name';
            }else if ($order == 'email'){
                $order = 'employees.email';
            } else if ($order == 'designation'){
                $order = 'employees.designation';
            }else if ($order == 'phone'){
                $order = 'employees.phone';
            }
            $dir = $request->input('order.0.dir');
        } else{
            $order = "employees.id";
            $dir = "desc";
        }

        $employee_list = Employee::select('employees.*');

        if($request->input('search.value') != ""){
            $search = $request->input('search.value');

            $employee_list = $employee_list->where(function ($query) use ($search){
                $query->where('first_name', 'LIKE', '%'.$search.'%');
                $query->orWhere('last_name', 'LIKE', '%'.$search.'%');
                $query->orWhere('email', 'LIKE', '%'.$search.'%');
                $query->orWhere('designation', 'LIKE', '%'.$search.'%');
                $query->orWhere('phone', 'LIKE', '%'.$search.'%');

            });
            $totalFiltered = $employee_list->count();
        }

        $employee_list = $employee_list->offset($start)->limit($limit)->orderBy($order, $dir)->get();

        $data = [];
        if ($employee_list->count() > 0){
            foreach ($employee_list AS $employee_item){
                $nestedData['name'] = $employee_item->first_name.' '.$employee_item->last_name;
                $nestedData['email'] = $employee_item->email;
                $nestedData['designation'] = $employee_item->designation;
                $nestedData['phone'] = $employee_item->phone;


                $action = '<a href="'.route('employee.show',$employee_item->id).'" class="btn btn-info" role="button" aria-pressed="true">View</a>';
                $action .= '&nbsp;<a href="javascript:void(0)" class="btn btn-danger btnDelete" role="button" aria-pressed="true" data-id="'.$employee_item->id.'">Delete</a>';
                $nestedData['action'] = $action;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo json_encode($json_data);
        exit;
    }

    public function show($id)
    {
        $title = "View Employee Details";
        $employee_item = Employee::findOrFail($id);
        // $employee_list = Employee::select('employees.*', 'educations.course_name','experiances.company_address','experiances.technology','referances.ref_name')
        // ->leftjoin('educations', 'educations.employee_id', '=', 'employees.id')
        // ->leftjoin('experiances', 'experiances.employee_id', '=', 'employees.id')
        // ->leftjoin('referances', 'referances.employee_id', '=', 'employees.id');
        return view('admin.employee.view',compact('title','employee_item'));
    }

    public function destroy($id)
    {
        $employee_item = Employee::findOrFail($id);
        Education::where('employee_id',$id);
        Referances::where('employee_id',$id);
        Experiance::where('employee_id',$id);
        if($employee_item)
        {
            $employee_item->delete();
            return response()->json(array('success' => true));
        }
        return response()->json(array('error' => false));
    }
}

