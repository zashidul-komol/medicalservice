<?php
namespace App\Repositories\Models;

use App\Models\ComplainType;
use App\Models\DfProblem;
use App\Models\Appointment;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use DB;
class AppointmentsRepository extends Repository {

	// model property on class instances
	//protected $model;

	// Constructor to bind model to repo
	public function __construct() {
		$appoinment = new Appointment;
		parent::__construct($appoinment);
	}

	// Get all instances of model
	public function all() {
		return $this->model->all();
	}

	public function prescriptionHistory($start_date, $end_date, $organization_id = [], $employee_types = [], $ChiefComplains = [], $chiefComplain_id = []) {

    $start_date = !empty($start_date) 
        ? Carbon::parse($start_date)->format('Y-m-d') 
        : Carbon::now()->startOfMonth()->format('Y-m-d');

    $end_date = !empty($end_date) 
        ? Carbon::parse($end_date)->format('Y-m-d') 
        : Carbon::now()->format('Y-m-d');

    $appointments = $this->model
        ->join('employees', 'employees.id', '=', 'appointments.employee_id')
        ->join('organizations', 'organizations.id', '=', 'appointments.organization_id')
        // Convert JSON array into rows
        ->leftJoin(DB::raw("
            JSON_TABLE(appointments.chief_complain_id, '$[*]' 
                COLUMNS (cid INT PATH '$')
            ) AS ccjson
        "), 'ccjson.cid', '=', DB::raw('1')) // We'll join later with chief_complains
        ->leftJoin('chief_complains', 'chief_complains.id', '=', DB::raw('ccjson.cid'))
        ->select(
            'appointments.employee_id',
            'appointments.chief_complain',
            'appointments.chief_complain_id',
            'appointments.organization_id',
            'appointments.prescription_no',
            'appointments.appointment_date',
            'appointments.employee_type',
            'employees.name as EmployeeName',
            'organizations.organization',
            DB::raw('GROUP_CONCAT(chief_complains.name) as chiefComplain')
        )
        ->whereRaw('DATE(appointments.appointment_date) BETWEEN ? AND ?', [$start_date, $end_date])
        ->groupBy(
            'appointments.employee_id',
            'appointments.chief_complain',
            'appointments.chief_complain_id',
            'appointments.organization_id',
            'appointments.prescription_no',
            'appointments.appointment_date',
            'appointments.employee_type',
            'employees.name',
            'organizations.organization'
        );

    // Filter by employee types
    if (!empty($employee_types)) {
        $appointments->whereIn('appointments.employee_type', $employee_types);
    }

    // Filter by chief complain IDs
    if (!empty($chiefComplain_id)) {
        $appointments->where(function($q) use ($chiefComplain_id) {
            foreach ($chiefComplain_id as $id) {
                $q->orWhereJsonContains('appointments.chief_complain_id', $id);
            }
        });
    }

    // Filter by organization IDs
    if (!empty($organization_id)) {
        $appointments->whereIn('appointments.organization_id', $organization_id);
    }

    return $appointments->get();
}


}
