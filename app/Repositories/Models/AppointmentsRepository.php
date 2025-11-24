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

    // Use DB query builder instead of Eloquent to avoid model casting
    $appointments = DB::table('appointments')
        ->join('employees', 'employees.id', '=', 'appointments.employee_id')
        ->join('organizations', 'organizations.id', '=', 'appointments.organization_id')
        ->select(
            'appointments.id',
            'appointments.employee_id',
            'appointments.chief_complain',
            'appointments.chief_complain_id',
            'appointments.organization_id',
            'appointments.prescription_no',
            'appointments.appointment_date',
            'appointments.employee_type',
            'employees.name as EmployeeName',
            'organizations.organization'
        )
        ->whereBetween('appointments.appointment_date', [$start_date, $end_date]);

    // Apply filters
    if (!empty($employee_types)) {
        $appointments->whereIn('appointments.employee_type', $employee_types);
    }

    if (!empty($chiefComplain_id)) {
        $appointments->where(function($q) use ($chiefComplain_id) {
            foreach ($chiefComplain_id as $id) {
                $q->orWhereJsonContains('appointments.chief_complain_id', $id);
            }
        });
    }

    if (!empty($organization_id)) {
        $appointments->whereIn('appointments.organization_id', $organization_id);
    }

    $results = $appointments->get();

    // Get all chief complain IDs from all appointments
    $allChiefComplainIds = [];
    foreach ($results as $appointment) {
        if ($appointment->chief_complain_id) {
            $ids = json_decode($appointment->chief_complain_id, true);
            if (is_array($ids)) {
                $allChiefComplainIds = array_merge($allChiefComplainIds, $ids);
            }
        }
    }
    $allChiefComplainIds = array_unique($allChiefComplainIds);

    // Get all chief complain names in one query
    $chiefComplains = \App\Models\ChiefComplain::whereIn('id', $allChiefComplainIds)
        ->pluck('name', 'id')
        ->toArray();

    // Add chief complain names to each appointment
    foreach ($results as $appointment) {
        $names = [];
        if ($appointment->chief_complain_id) {
            $ids = json_decode($appointment->chief_complain_id, true);
            if (is_array($ids)) {
                foreach ($ids as $id) {
                    if (isset($chiefComplains[$id])) {
                        $names[] = $chiefComplains[$id];
                    }
                }
            }
        }
        $appointment->chiefComplainNames = implode(', ', $names);
    }

    return $results;
}


}
