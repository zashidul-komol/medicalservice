<?php
namespace App\Repositories\Models;

use App\ComplainType;
use App\DfProblem;
use App\Appointment;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

		//dd($organization_id);
		$start_date = !empty($start_date) 
		    ? Carbon::parse($start_date)->format('Y-m-d') 
		    : Carbon::now()->startOfMonth()->format('Y-m-d');

		$end_date = !empty($end_date) 
		    ? Carbon::parse($end_date)->format('Y-m-d') 
		    : Carbon::now()->format('Y-m-d');

		$appointments = $this->model
		    ->join('employees', 'employees.id', '=', 'appointments.employee_id')
		    ->join('organizations', 'organizations.id', '=', 'appointments.organization_id')
		    ->join('chief_complains', 'chief_complains.id', '=', 'appointments.chiefComplain_id')
		    ->select(
		        'appointments.employee_id',
		        'appointments.chief_complain',
		        'appointments.chiefComplain_id',
		        'appointments.organization_id',
		        'appointments.prescription_no',
		        'appointments.appointment_date',
		        'appointments.employee_type',
		        'employees.name as EmployeeName',
		        'organizations.organization',
		        'chief_complains.name as chiefComplain'
		    )
		    ->whereRaw('DATE(appointments.appointment_date) between ? AND ?', [$start_date, $end_date]);
		    if ($employee_types) {
				$appointments->whereIn('appointments.employee_type', $employee_types);
			}
			if ($chiefComplain_id) {
				$appointments->whereIn('appointments.chiefComplain_id', $chiefComplain_id);
			}
			if ($organization_id) {
				$appointments->whereIn('appointments.organization_id', $organization_id);
			}
		return $appointments->get();

	}

}
