@extends('layouts.admin')
@section('title', 'Prescription Upload')
@section('content')
<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Medical Service</a></li>
            <li><a>Prescription Upload</a></li>
        </ul>
    </div>
</div> 

<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Prescription Upload</b></h4>
        <span class="pull-right">
        	{!! Html::decode(link_to_route('medical_services.index','<i class="fa fa-list"></i>',['approved'],array('class'=>'btn btn-success btn-right-side'))) !!}
        </span>
        <div class="panel">
            {{ Form::model($appointments,array('route' => array('medical_services.report_save',request()->route()->parameters['param']),'method'=>'PUT','enctype'=>'multipart/form-data','class'=>'form-horizontal confirm-form')) }}
            <div class="panel-content">
    			<div class="widget-list list-left-element list-sm">
    				<ul class="dashboard">
    					<li>
    						<div class="left-element">Name :</div>
    						 <div class="text">{{$appointments[0]->employees->name}}</div>
    					</li>
    					<li>
    						<div class="left-element">Prescription No :</div>
    						 <div class="text">{{$appointments[0]->prescription_no}}</div>
    					</li>
                        <li>
                            <div class="left-element">Appointment Date : </div>
                             <div class="text">{{\Carbon\Carbon::parse($appointments[0]->appointment_date)->format('d-M-Y')}}</div>
                        </li>
                        <li>
                            <div class="left-element">Upload Report : </div>
                             <div class="text">
                                <input type="file" name="upload_report" >
                             </div>
                        </li>
                        
    				</ul>
    			</div>
                {{-- prescription's file upload--}}
					<div class="panel-content">
    					<div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" name="report_save" value="report_save" class="btn btn-primary">
                                	Upload Prescription
                            	</button>
                            </div>
                        </div>
                    </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    .left-element{min-width: 160px !important;font-weight: bold;text-align: right;padding-right: 10px}
</style>
@stop
 