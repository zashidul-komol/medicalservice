<?php

namespace App\Http\Controllers;

use App\Employee;
use App\ChiefComplain;
use App\Appointment;
use App\Medicine;
use App\Location;
use App\Department;
use App\Designation;
use App\Organization;
use App\OfficeLocation;
use App\Region;
use App\Country;
use Auth;
use Carbon\Carbon;
use App\Traits\PhpExcelFormater;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    use PhpExcelFormater;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::find(auth()->id());
        $appointments = Appointment::with([
            'employees' => function ($q) {
                return $q->select('*');
            },
            'employees.designation' => function ($q) {
                return $q->select('*');
            },
        ])
        ->orderBy('prescription_serial', 'desc')
        ->get();
        //
        //dd($appointments);
        

        //dd($appointments->toArray());


        return view('medical_services.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $Employee_PolarId = [];
        $countries = Country::pluck('country_name', 'country_code');
        $employees = Employee::pluck('name', 'id');
        $chiefComplain = ChiefComplain::where('status', 'active')->pluck('name', 'id');
        $appointmentDate = Carbon::now();

        $KomolTest = Employee::join('designations', 'designations.id', '=', 'employees.desig_id')
        ->where('employees.status', '=', 'active')
        ->where('employees.status', '=', 'active')
        //->where('employees.organization_id', '=', 1)
        ->select('employees.id', 'employees.desig_id', 'employees.polar_id', 'employees.name', 'employees.bloodgroup', 'designations.title', 'employees.birthdate')
        ->get();

            foreach ($KomolTest as $value) {

                $Employee_PolarId[$value->id] = $value->name . ' - ' . $value->title . ' - ' . $value->polar_id;
            }

        return view('medical_services.create', compact('countries', 'employees', 'appointmentDate','Employee_PolarId', 'KomolTest','chiefComplain'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $data = $request->except('_token');
        $authUser  = auth()->user()->id ;
        $EmployeeInfo = Employee::where('id', $data['employee_id'])->select('organization_id', 'employee_type' )
        ->get();

        $Emp_Org = $EmployeeInfo[0]->organization_id;
        $Emp_type = $EmployeeInfo[0]->employee_type;
        
        $appointment_Request_data = $request->except('details', '_method', '_token');
        $appointmentDetailsRequest_Data = $request->only('details');
        $user_data  = Auth::user();
        $request->validate([
            'polar_id' => 'required',
            'appointment_date' => 'required',
            'chief_complain_id' => 'required|array',
        ]);

        $prescription_serial = Appointment::select('prescription_serial')
            ->orderBy('prescription_serial', 'desc')
            ->limit(1)
            ->first();
        if($prescription_serial['prescription_serial'] == null){
            $prescription_serial_now = '100001';
        }else{
            $prescription_serial_now = $prescription_serial['prescription_serial'] + 1;
        }
        $AppointDate = \Carbon\Carbon::parse($request->appointment_date)->format('y-m-d');

        $date = explode("-", $AppointDate);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];

        $Prescription_No = 'P'.'-'.$year.'-'.$prescription_serial_now;
        
        $appointment_data = [
            'user_id' => $user_data->id,
            'employee_id' => $data['employee_id'],
            'organization_id' => $Emp_Org,
            'polar_id' => $data['polar_id'],
            'prescription_serial' => $prescription_serial_now,
            'prescription_no' => $Prescription_No,
            'appointment_date' => $data['appointment_date'],
            'chief_complain_id' => $data['chief_complain_id'], // <- array or multiple IDs
            'temperature' => $data['temperature'],
            'pulse' => $data['pulse'],
            'lungs' => $data['lungs'],
            'bp' => $data['bp'],
            'heart' => $data['heart'],
            'others' => $data['others'],
            'advice' => $data['advice'],
            'employee_type' => $Emp_type,
            'basic_treatment' => $data['basic_treatment'],
            'refer_other' => $data['refer_other'],
            'refer_reason' => $data['refer_reason'],
            'next_appointment_date' => $data['next_appointment_date'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        //insert data in appointments table
        $appointmentData = Appointment::create($appointment_data);
        
        //insert data in medicines table
        
        if ($appointmentData) {
                $detials_data =[];
                foreach($appointmentDetailsRequest_Data['details'] as $report){
                    if(!empty($report['medicine_name'])){
                       $d_data['appointment_id'] = $appointmentData->id;
                        $d_data['employee_id']  = $data['employee_id'];
                        $d_data['polar_id'] = $data['polar_id'];
                        $d_data['medicine_name'] = $report['medicine_name'];
                        $d_data['medicine_duration'] = $report['medicine_duration'];
                        $d_data['suggetions'] = $report['suggetions'];
                        $d_data['when_take_medicine'] = $report['when_take_medicine'];
                        $d_data['created_at']   = Carbon::now();
                        $d_data['updated_at']   = Carbon::now();

                        $detials_data[] = $d_data; 
                    }
                    
                    
                }
            $appointmentDetails = $appointmentData->medicines()->createMany($detials_data);

            $message = "You have successfully created the Requisition..";
            return redirect()->route('medical_services.index')
            ->with('flash_success', $message);

        } else {
            $message = "Something wrong!! Please try again";
            return redirect()->route('medical_services.index', [])
                ->with('flash_danger', $message);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function prescriptionDownload($id) {
        $user = \App\User::find(auth()->id());
        $appointmentsDetails = Appointment::with([
            'employees' => function ($q) {
                return $q->select('id', 'name', 'polar_id', 'gender', 'birthdate', 'bloodgroup');
            },
            'medicines'=>function($q){
                return $q->select('*');
            },
        ])
        ->where('id', $id)
        ->get();
        //dd($appointmentsDetails[0]->chief_complains_names);

        $MedicineDetails = Medicine::where('appointment_id',$id) 
        ->get();

        $pdf = \mPDF::loadView('pdf.prescription', compact('appointmentsDetails', 'MedicineDetails'))->download('prescription.pdf');
         
    }

    public function PrescriptionHistory($id = 0) {
        //dd($id);

        if ($id > 0) {
            //dd($id);

            $employee = Employee::findOrFail($id);
            //dd($employee->toArray());
            
            $appointments = Appointment::with([
                'employees' => function ($q) {
                    return $q->select('*');
                },
                'medicines' => function ($q) {
                    return $q->select('*');
                },
                'employees.designation' => function ($q) {
                    return $q->select('*');
                },
                'medicines' => function ($q) {
                    return $q->select('*');
                },
                'employees.user' => function ($q) {
                    return $q->select('*');
                },
                
            ])
            ->where('employee_id', '=', $id)
            ->orderBy('id', 'desc')
            ->get();
            //dd($appointments->toArray());

            
            return view('medical_services.show_history', compact('employee', 'appointments'));
        } else {
            return view('medical_services.prescription_history');
        }
        
    }

    public function prescription_upload(Request $request, $id) {

        //dd($id);
        
        $appointments = Appointment::with([
                'employees' => function ($q) {
                    return $q->select('*');
                },
                'medicines' => function ($q) {
                    return $q->select('*');
                },
                'employees.designation' => function ($q) {
                    return $q->select('*');
                },
                'medicines' => function ($q) {
                    return $q->select('*');
                },
                'employees.user' => function ($q) {
                    return $q->select('*');
                },
                
            ])
            ->where('id', '=', $id)
            ->orderBy('id', 'desc')
            ->get();
            //dd($appointments->toArray());
        
        return view('medical_services.prescription_upload', compact('appointments'));
    }

    public function update(Request $request, $id) {

        //dd($request->toArray());
        $prescription = Appointment::select('prescription_no')->where('id', $id)->get();
        $prescription_no = $prescription[0]->prescription_no;
        
        if($request->file('upload_report')){
            $file = $request->file('upload_report');
            $extension =$file->getClientOriginalExtension();
            $filename = $prescription_no.'.'.$extension;
            $file->move('storage/reports/', $filename);
            $data['upload_report'] = $filename;
        }
        
        $affectedRows = Appointment::where("id", $id)->update(["upload_report" => $filename]);
        //dd($prescription_no);
        
        //return view('medical_services.prescription_upload', compact('appointments'));
        $message = "You have successfully uploaded the Report...";
        return redirect()->route('medical_services.index')
            ->with('flash_success', $message);
    }
}
