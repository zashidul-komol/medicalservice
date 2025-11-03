@extends('layouts.admin')
<style type="text/css">
  input:valid {
    background-color: #99ff99;
}
select:valid {
    background-color: #99ff99;
}
textarea:valid {
    background-color: #99ff99;
}
</style>
@section('title', 'Add Requisition')
@section('content')
<div class="content-header">
    <div class="text-center">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#"><h4 class="section-subtitle">MEDICAL SERVICE</h4></a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    {{ Form::model(request()->old(),array('route' => array('medical_services.store'),'enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
    <div class="panel">

        <div class="row dash-box-height SixBox">
            
            <legend style="color:#2C89B5; cursor:pointer; text-align: center;">DHAKA ICE CREAM INDUSTRIES LIMITED</legend>

            <table width="92%" border="0" align="left">
                <tr>
                  <th width="13%" height="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                  <th width="2%">: </th>
                  <th width="25%">{{Form::select('employee_id',$employees->toArray(),null,array('class' => 'form-control select2', 'onchange'=>'getUserDetails(this)'))}}
                      {!! $errors->first('employee_id', '<p class="text-danger">:message</p>' ) !!}</th>
                  <th width="1%">&nbsp;</th>
                  <th width="24%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Employee ID</th>
                  <th width="2%">:</th>
                  <th width="25%">{{Form::text('polar_id',null,array('class' => 'form-control'))}}
                    {!! $errors->first('polar_id', '<p class="text-danger">:message</p>' ) !!}
                      
                </tr>
                <tr>
                  <th width="13%" height="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender</th>
                  <th>:</th>
                  <th>{{Form::text('gender',null,array('class' => 'form-control'))}}
                      {!! $errors->first('gender', '<p class="text-danger">:message</p>' ) !!}
                  </th>
                  <th>&nbsp;</th>
                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Blood Group</th>
                  <th>:</th>
                  <th style="width: 30%;">{{Form::text('bloodgroup',null,array('class' => 'form-control'))}}
                      {!! $errors->first('bloodgroup', '<p class="text-danger">:message</p>' ) !!}
                  </th>
                </tr>
                <tr>
                  <th height="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Appoint Date</th>
                  <th>:</th>
                  <th>{{Form::text('appointment_date', null,array('class' => 'form-control datepicker'))}}
                      {!! $errors->first('appointment_date', '<p class="text-danger">:message</p>' ) !!}</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Age ( Till today )</th>
                  <th>: </th>
                  <th>{{Form::text('age', null,array('class' => 'form-control'))}}
                      {!! $errors->first('maxrequisition_no', '<p class="text-danger">:message</p>' ) !!}</th>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
        </div>
    </div>
    
    <div class="col-md-5">
        <h4 class="section-subtitle"><b>Prescription</b></h4>
        
        <div class="panel">
            <div class="row dash-box-height SixBox">
                
              <!-- Blank Page Start Here -->
                <div class="active tab-pane" id="personal">
                    
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2">C/C : </label>
                        <div class="col-sm-9">
                          {{Form::textarea('chief_complain',null,array('class' => 'form-control max-length','rows' => 4, 'cols' => 2,'maxlength'=>'250'))}}
                          {!! $errors->first('chief_complain', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                            
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 "></label>
                        <div class="col-sm-12">
                          
                              
                        </div>
                            
                    </div>
                        
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2">O/E : </label>
                          <div class="col-sm-9">
                              {{Form::textarea('on_examination',null,array('class' => 'form-control max-length','rows' => 4, 'cols' => 2,'maxlength'=>'250'))}}
                                  {!! $errors->first('on_examination', '<p class="text-danger">:message</p>' ) !!}
                              
                          </div>
                            
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 "></label>
                          <div class="col-sm-12">
                          
                              
                          </div>
                            
                        </div>
                        
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 ">Advice : </label>
                          <div class="col-sm-9">
                            {{Form::textarea('advice',null,array('class' => 'form-control max-length','rows' => 4, 'cols' => 2,'maxlength'=>'250'))}}
                                {!! $errors->first('advice', '<p class="text-danger">:message</p>' ) !!}
                            
                          </div>
                          
                        </div>
                                            
                <!-- /.form-horizontal -->
                </div>

              <!-- Blank Page End Here --> 
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <h4 class="section-subtitle"><b>Medicine Details</b></h4>
          
        <div class="panel">
            <div class="row dash-box-height SixBox">
              <!-- Blank Page Start Here -->
                <div class="active tab-pane" id="personal">
                  
                    <div class="from-group">
                        @if (count($errors->get('details.*'))>0)
                        <div class="alert alert-danger" style="width:64%;padding: 5px;    margin-bottom: 10px;margin-left: 38px;">
                            <ul>
                                <li>Size,Brand & Quantity cann't be blank</li>
                                <li>Unit price should be a number or blank</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="from-group">
                        @if (count($errors->get('details.*'))>0)
                        <div class="alert alert-danger" style="width:64%;padding: 5px;    margin-bottom: 10px;margin-left: 38px;">
                            <ul>
                                <li>Size,Brand & Quantity cann't be blank</li>
                                <li>Unit price should be a number or blank</li>
                            </ul>
                        </div>
                        @endif

                        @if(request()->old('details'))
                            <stockdetails :brands="{{ $countries }}" :sizes="{{ $countries }}" :details="{{ collect(request()->old('details')) }}"/>
                        @else
                            <stockdetails :brands="{{ $countries }}" :sizes="{{ $countries }}" :details="[]"/>
                        @endif
                    </div>
                    <label for="inputName" class="col-sm-3 control-label">Next Appointment Date</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                {{Form::text('next_appointment_date',null,array('class' => 'form-control datepicker'))}}
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-9">
                            <button type="submit" class="btn btn-primary">
                                Submit Prescription   
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.form-horizontal -->
            </div>

              <!-- Blank Page End Here --> 
        </div>
    </div>
        
{{ Form::close() }}   
</div>
@endsection
@component('common_pages.selectize')

<script src="{{ asset('vendor/bootstrap_date-picker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
     $('.datepicker').datepicker({ format: "yyyy-mm-dd",todayHighlight: true,autoclose:true});


    function getUserDetails(obj) {
        alert (obj.value);
    } 
</script>
@slot('css')
 <!--Date picker-->
 <link rel="stylesheet" href="{{ asset('vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css') }}">
@endslot
@endcomponent