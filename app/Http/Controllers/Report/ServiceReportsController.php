<?php

namespace App\Http\Controllers\Report;

use App\Models\DamageType;
use App\Exports\ComplainExport;
use App\Exports\PrescriptionHistoryExport;
use App\Http\Controllers\Controller;
use App\Models\ProblemType;
use App\Models\Organization;
use App\Models\Employee;
use App\Models\ChiefComplain;
use App\Models\Appointment;
use App\Repositories\Models\DamageApplicationRepository;
use App\Repositories\Models\DepotRepository;
use App\Repositories\Models\DfProblemRepository;
use App\Repositories\Models\AppointmentsRepository;
use App\Repositories\Models\ProblemTypeRepository;
use App\Repositories\Models\SizeRepository;
use App\Repositories\Models\TechnicianRepository;
use App\Repositories\Models\ZoneRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ServiceReportsController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		$report = collect([]);
		$token = false;
		$isDownload = false;
		$isPost = false;

		$authUserId = auth()->user()->id;
		$depotRepository = new DepotRepository;
		$depotsObject = $depotRepository->getRegionWiseLists($authUserId);

		$depots = $depotsObject->pluck('id')->toArray();
		$dfProblemRepository = new DfProblemRepository;

		if ($request->isMethod('post')) {
			$request->validate([
				'token' => 'required|numeric',
			]);
			$isPost = true;
			$token = $request->input('token');
			$report = $dfProblemRepository->findToken($token, $depots);

			//dd($report->toArray());

			if ($request->has('download')) {
				$isDownload = true;
				$fileName = 'Token-' . $token;
				$pdf = \domPDF::loadView('reports.services.token_pdf', compact('report', 'token', 'isDownload'));
				$customPaper = array(0, 0, 950, 950);
				return $pdf->setPaper($customPaper, 'landscape')->setWarnings(false)->download($fileName . '.pdf');
			}
		}
		return view('reports.services.token', compact('token', 'report', 'isDownload', 'isPost'));

	}

	
	public function prescriptionHistory(Request $request, $param = 0) {

        //dd($request->toArray());
      
        $organization_id = $employee_types = $ChiefComplains = $chiefComplain_id = [];

        $start_date = '01-'.date('m-Y');
        $end_date_To = Carbon::now()->format('d-m-Y');
        $authUserId = auth()->user()->id;
        //dd($end_date);
        $organizations = Organization::pluck('short_name','id');
        $ChiefComplains = ChiefComplain::pluck('name','id');

        $reportData = [];
        $is_download = 0;

        if ($request->isMethod('post')) {

            if ($request->has('is_download'))
                $is_download = $request->input('is_download');

            if ($request->has('start_date'))
                $start_date = $request->input('start_date');

            if ($request->has('end_date'))
                $end_date = $request->input('end_date');
            //dd($end_date);
            if ($request->has('organization_id')) {
				$organization_id = $request->input('organization_id');
			}

			if ($request->has('employee_types')) {
				$employee_types = $request->input('employee_types');
			}

			if ($request->has('chiefComplain_id')) {
				$chiefComplain_id = $request->input('chiefComplain_id');
			}

            
            $prescriptionRepository = new AppointmentsRepository;
            $condArr = [
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date
            ];            
            //dd($request->end_date);
            $reportData = $prescriptionRepository->prescriptionHistory($start_date,$end_date, $organization_id, $employee_types, $ChiefComplains, $chiefComplain_id);
            //dd($reportData);
            
        } 

        if (isset($is_download) and $is_download > 0) {
            $fileName = 'prescription_history_report'.time().'.xlsx';
            ob_end_clean(); 
        	ob_start();
            return (new PrescriptionHistoryExport(compact('reportData','is_download','param')))
            ->download($fileName);
        }

        return view('reports.prescriptions.prescription_history', compact('start_date','end_date','reportData','is_download','param', 'organizations', 'employeeTypes', 'ChiefComplains'));
    }

}
