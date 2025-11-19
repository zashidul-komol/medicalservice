@extends('layouts.admin')
@section('title', 'Prescription Lists')
@section('content')
<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Prescription</a></li>
            <li><a>Lists</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-sm-12">
       <h4 class="section-subtitle"><b>Prescription Lists</b></h4>
        <span class="pull-right">
        	{!! Html::decode(link_to_route('medical_services.create','<i class="fa fa-plus"></i>',[],array('class'=>'btn btn-success btn-right-side'))) !!}
        </span>
        <div class="panel">
            <div class="panel-content">
              <div class="table-responsive">
                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>SI</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Age</th>
                        <th>Employee ID</th>
                        <th>Appointment Date</th>
                        <th>Prescription No</th>
                        <th>Chief Complain</th>
                        <th>Print</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($i=1)
                        @foreach ($appointments as $data)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->employees->name ?? ''}}</td>
                        <td>{{$data->employees->designation->title ?? ''}}</td>
                        <td>{{ $data->employees && $data->employees->birthdate 
                            ? \Carbon\Carbon::parse($data->employees->birthdate)->diff(\Carbon\Carbon::now())->format('%y Years') 
                            : '' }}</td>
                        <td>{{$data->polar_id ?? ''}}</td>
                        <td>{{$data->appointment_date ?? ''}}</td>
                        <td>{{$data->prescription_no ?? ''}}</td>
                        <td>
                            <p>
                            {{ $data->chief_complains_names }}
                        </p>
                        </td>
                        <td>
                          {!! Html::decode(link_to_route('medical_services.prescriptionDownload','<span aria-hidden="true" class="fa fa-print fa-x"></span>' , [$data->id],['title'=>'Print Prescription'])) !!} 
                          {!! Html::decode(link_to_route('medical_services.prescription_upload','<span aria-hidden="true" class="fa fa-upload fa-x"></span>' , [$data->id],['title'=>'Upload Prescription'])) !!}
                                                                                                     
                        </td>
                      </tr>
                        @php ($i=$i+1)
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@component('common_pages.data_table_script')
<script>
  $(function(){
      "use strict";
      $('.data-table').DataTable({
        "order": [], /* No ordering applied by DataTables during initialisation */
      });
  });
</script>
@endcomponent

