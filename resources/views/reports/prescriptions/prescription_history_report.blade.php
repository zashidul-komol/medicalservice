@if(count($reportData) > 0)
@php
	$download_column_header = $download_column_val = '';
	if($is_download){
    	$download_column_header = '<td><b>Remarks</b></td>';
    	$download_column_val = '<td></td>';
    }
@endphp
<div class="panel">
    <div class="panel-content">
        <div class="table-responsive">
            <table border="1" cellspacing="0" cellpadding="0" width="100%" class="table table-bordered table-striped table-sm">
                <thead class="table-primary">
                <tr>
                    <td><b>SL</b></td>
                    <td><b>Employee Name</b></td>
                    <td><b>Organization</b></td>
                    <td><b>Prescription No</b></td>
                    <td><b>Appointment Date</b></td>
                    <td><b>Chief Complain</b></td>
                    <td><b>Employee Type</b></td>
                    
                    {!! $download_column_header !!}
                </tr>
                </thead>
                <tbody>
                	@foreach($reportData as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->EmployeeName}}</td>
                        <td>{{$data->organization}}</td>
                        <td>{{$data->prescription_no}}</td>
                        <td>{{$data->appointment_date}}</td>
                        <td>{{$data->chiefComplain}}</td>
                        <td>{{$data->employee_type}}</td>
                        
                        {!! $download_column_val !!}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif