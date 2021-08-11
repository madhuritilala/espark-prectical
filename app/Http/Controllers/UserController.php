<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Education;
use App\Models\Referances;
use App\Models\Experiance;

class UserController extends Controller
{
    public function index(){
        $title = "Job Application Form";
        return view('customer.form',compact('title'));
    }
    private function validation($request,$id = null)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'designation' => 'required',
            'address_1' => 'required',
            'email' => 'required|email|max:255|unique:employees',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'birth_date' => 'required',
            'relation_status' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'course_name.*' => 'required',
            'univercity.*' => 'required',
            'passing_year.*' => 'required',
            'percentage.*' => 'required',
            "language" =>"required|in:1",
            "technology" =>"required|in:1",
            "type"=>"required",
            'company_address.*' => 'required',
            'exp_designation.*' => 'required',
            'joining_date_from.*' => 'required',
            'joining_date_to.*' => 'required',
            'ref_name.*' => 'required',
            'ref_phone.*' => 'required',
            'ref_relation.*' => 'required',
            'notice_period' => 'required',
            'exp_ctc' => 'required',
            'current_ctc' => 'required',
        ];

        $messages = [
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'designation.required' => 'Please enter designation.',
            'address_1.required' => 'Please enter Address.',
            'email.required' => 'Please enter email.',
            'city.required' => 'Please enter city.',
            'state.required' => 'Please select state.',
            'zipcode.required' => 'Please enter zipcode.',
            'birth_date.required' => 'Please enter birth_date.',
            'gender.required' => 'Please select gender.',
            'phone.required' => 'Please enter phone.',
            'relation_status.required' => 'Please select relation_status.',
            'course_name.*.required'=> "You need to add atleast one course name.",
            'univercity.*.required'=> "You need to add atleast one univercity name.",
            'passing_year.*.required'=> "You need to add atleast one passing year.",
            'percentage.*.required'=> "You need to add atleast one percentage.",
            "language.required" =>"please select language checkbox.",
            "technology.required" =>"please select technology checkbox.",
            "type.required" =>"please select sub tye of technology checkbox.",
            'company_address.*.required'=> "You need to add atleast one company address.",
            'exp_designation.*.required'=> "You need to add atleast one exp.designation.",
            'joining_date_from.*.required'=> "You need to add atleast one joining date from.",
            'joining_date_to.*.required'=> "You need to add atleast one joining date to.",
            'ref_name.*.required'=> "You need to add atleast one referance of name.",
            'ref_phone.*.required'=> "You need to add atleast one  referance of phone number.",
            'ref_relation.*.required'=> "You need to add atleast one referance of relation.",
            'notice_period.required' => 'Please enter notice period.',
            'exp_ctc.required' => 'Please enter expected CTC.',
            'current_ctc.required' => 'Please enter current CTC.',
        ];

        $request->validate($rules,$messages);
    }

    public function store(Request $request){
        $this->validation($request);
        //dd($request->all());
        try{
            $requestArr = $request->all();
            $requestArr['language'] = implode(',', $request->language);
            $insert_data = Employee::create($requestArr);
            $insertedId = $insert_data->id;
            $message = "Customers detail added successfully.";
            if(isset($requestArr['course_name']) && count($requestArr['course_name']) > 0){
                Education::where('employee_id', $insertedId)->delete();
                foreach ($requestArr['course_name'] AS $key => $course_item){
                    $insertArr =[
                        'employee_id' => $insertedId,
                        'course_name' => $course_item,
                        'univercity' => $requestArr['univercity'][$key],
                        'passing_year' => $requestArr['passing_year'][$key],
                        'percentage' => $requestArr['percentage'][$key],
                    ];
                    if(!is_null($insertArr)){
                        Education::create($insertArr);
                   }
                }
            }
            if(isset($requestArr['company_address']) && count($requestArr['company_address']) > 0){
                Experiance::where('employee_id', $insertedId)->delete();
                foreach ($requestArr['company_address'] AS $key => $company_item){
                    $insertArr =[
                        'employee_id' => $insertedId,
                        'company_address' => $company_item,
                        'exp_designation' => $requestArr['exp_designation'][$key],
                        'joining_date_from' => $requestArr['joining_date_from'][$key],
                        'joining_date_to' => $requestArr['joining_date_to'][$key],
                        'technology' => $requestArr['technology'][$key],
                        'type' => $requestArr['type'][$key],
                        'notice_period' => $request->notice_period,
                        'exp_ctc' => $request->exp_ctc,
                        'current_ctc' => $request->current_ctc,
                        'preferance_location' => $request->preferance_location,
                        'department' => $request->department,

                    ];
                    if(!is_null($insertArr)){
                        Experiance::create($insertArr);
                   }
                }
            }
            if(isset($requestArr['ref_name']) && count($requestArr['ref_name']) > 0){
                Referances::where('employee_id', $insertedId)->delete();
                foreach ($requestArr['ref_name'] AS $key => $ref_items){
                    $insertArr =[
                        'employee_id' => $insertedId,
                        'ref_name' => $ref_items,
                        'ref_phone' => $request->ref_phone[$key],
                        'ref_relation' => $request->ref_relation[$key],
                       ];

                       if(!is_null($insertArr)){
                            Referances::create($insertArr);
                       }
                }

            }
            return redirect()->back()->with('success',$message);
        } catch (\Exception $e) {
              return redirect()->back()->with('error', $e->getMessage());
         }

    }
}
