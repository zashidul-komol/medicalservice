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

            <table width="90%" border="0" align="left">
                <tr>
                  <th width="13%" height="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Form::label('Name:',null,array('class' => 'control-label require'))}}</th>
                  <th width="2%">: </th>
                  <th width="20%">{{Form::select('employee_id',[''=>'Please Select Employee']+$Employee_PolarId,null,array('class' => 'form-control select2 require', 'onchange'=>'getUserDetails(this)'))}}
                      {!! $errors->first('employee_id', '<p class="text-danger">:message</p>' ) !!}</th>
                  <th width="1%">&nbsp;</th>
                  <th width="15%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Employee ID</th>
                  <th width="2%">:</th>
                  <th width="20%">{{Form::text('polar_id',null,array('class' => 'form-control', 'id'=>'polar_id', 'readonly'=>'true', 'required'))}}
                    {!! $errors->first('polar_id', '<p class="text-danger">:message</p>' ) !!}
                      
                </tr>
                <tr>
                  <th width="13%" height="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender</th>
                  <th width="2%">:</th>
                  <th width="15%">{{Form::text('gender',null,array('class' => 'form-control', 'id'=>'gender', 'readonly'=>'true'))}}
                      {!! $errors->first('gender', '<p class="text-danger">:message</p>' ) !!}
                  </th>
                  <th width="1%">&nbsp;</th>
                  <th width="13%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Blood Group</th>
                  <th width="2%">:</th>
                  <th width="15%" style="width: 30%;">{{Form::text('bloodgroup',null,array('class' => 'form-control', 'id'=>'bloodgroup', 'readonly'=>'true'))}}
                      {!! $errors->first('bloodgroup', '<p class="text-danger">:message</p>' ) !!}
                  </th>
                </tr>
                <tr>
                  <th height="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Form::label('Appoint Date:',null,array('class' => 'control-label require'))}}</th>
                  <th>:</th>
                  <th>
                    <div class="input-group">
                        <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                        <div>
                            {{Form::text('appointment_date',null,array('class' => 'form-control datepicker'))}}
                        {!! $errors->first('appointment_date', '<p class="text-danger">:message</p>' ) !!}
                        </div>
                        
                    </div>
                  <th>&nbsp;</th>
                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Date of Birth</th>
                  <th>: </th>
                  <th>{{Form::text('age', null,array('class' => 'form-control', 'id'=>'age', 'readonly'=>'true'))}}
                      {!! $errors->first('age', '<p class="text-danger">:message</p>' ) !!}</th>
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
            <div class="panel-content">
                
              <!-- Blank Page Start Here -->
                <div class="active tab-pane" id="personal">
                    
                    <div class="form-group">
                      {{Form::label('C/C :',null,array('class' => 'control-label col-sm-2 require'))}}
                        <div class="col-sm-9">
                            {{ Form::select('chief_complain_id[]', ['' => 'Please Select Chief Complain'] + $chiefComplain->toArray(), null, ['class' => 'form-control select2 require', 'multiple' => true]) }}
                          {!! $errors->first('chief_complain_id[]', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                    </div>
                    <h5 class="section-subtitle">On Examination (O/E):</h5>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2">Temp: </label>
                        <div class="col-sm-4">
                              {{Form::text('temperature',null,array('class' => 'form-control max-length','maxlength'=>'250'))}}
                                  {!! $errors->first('temperature', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                        <label for="inputName" class="col-sm-1">Pulse: </label>
                        <div class="col-sm-4">
                              {{Form::text('pulse',null,array('class' => 'form-control max-length','maxlength'=>'250'))}}
                                  {!! $errors->first('pulse', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2">Lungs: </label>
                        <div class="col-sm-4">
                              {{Form::text('lungs',null,array('class' => 'form-control max-length','maxlength'=>'250'))}}
                                  {!! $errors->first('lungs', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                        <label for="inputName" class="col-sm-1">BP: </label>
                        <div class="col-sm-4">
                              {{Form::text('bp',null,array('class' => 'form-control max-length','maxlength'=>'250'))}}
                                  {!! $errors->first('bp', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2">Heart: </label>
                        <div class="col-sm-4">
                              {{Form::text('heart',null,array('class' => 'form-control max-length','maxlength'=>'250'))}}
                                  {!! $errors->first('heart', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2">Others: </label>
                        <div class="col-sm-9">
                              {{Form::text('others',null,array('class' => 'form-control max-length','maxlength'=>'250'))}}
                                  {!! $errors->first('others', '<p class="text-danger">:message</p>' ) !!}
                              
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 ">Advice : </label>
                        <div class="col-sm-9">
                            {{Form::textarea('advice',null,array('class' => 'form-control max-length','rows' => 1, 'cols' => 2,'maxlength'=>'250'))}}
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
            <div class="panel-content">
              <!-- Blank Page Start Here -->
                <div class="active tab-pane" id="personal">
                  
                    <div class="from-group">
                        @if (count($errors->get('details.*'))>0)
                        <div class="alert alert-danger" style="width:64%;padding: 5px;    margin-bottom: 10px;margin-left: 38px;">
                            <ul>
                               <li>Time to take medicine can't be blank</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="from-group">
                        @if (count($errors->get('details.*'))>0)
                        <div class="alert alert-danger" style="width:64%;padding: 5px;    margin-bottom: 10px;margin-left: 38px;">
                            <ul>
                              <li>Suggetions Field can't be blank</li>
                            </ul>
                        </div>
                        @endif

                        @if(request()->old('details'))
                            <stockdetails :brands="{{ $countries }}" :sizes="{{ $countries }}" :details="{{ collect(request()->old('details')) }}"/>
                        @else
                            <stockdetails :brands="{{ $countries }}" :sizes="{{ $countries }}" :details="[]"/>
                        @endif
                    </div>
                </div>
                <!-- /.form-horizontal -->
            </div>

              <!-- Blank Page End Here --> 
        </div>
        <h5 class="section-subtitle"><b>If refer to other Doctor/Hospital</b></h5>
          
        <div class="panel" style="height: 180px;">
            <div class="panel-content">
              <!-- Blank Page Start Here -->
                <div class="active tab-pane" id="personal">
                  
                    <div class="from-group" style="height:50px;">
                        <label for="inputName" class="col-sm-3 ">Basic Treatment : </label>
                        <div class="col-sm-9">
                            {{Form::textarea('basic_treatment',null,array('class' => 'form-control max-length','rows' => 1, 'cols' => 2,'maxlength'=>'250'))}}
                                {!! $errors->first('basic_treatment', '<p class="text-danger">:message</p>' ) !!}
                        </div> 
                    </div>
                    <div class="from-group" style="height:50px;">
                        <label for="inputName" class="col-sm-3 ">Refer to Other : </label>
                        <div class="col-sm-9">
                            {{Form::textarea('refer_other',null,array('class' => 'form-control max-length','rows' => 1, 'cols' => 2,'maxlength'=>'250'))}}
                                {!! $errors->first('reffer_other', '<p class="text-danger">:message</p>' ) !!}
                        </div> 
                    </div>
                    <div class="from-group">
                        <label for="inputName" class="col-sm-3 ">Refer Reason : </label>
                        <div class="col-sm-9">
                            {{Form::textarea('refer_reason',null,array('class' => 'form-control max-length','rows' => 2, 'cols' => 2,'maxlength'=>'250'))}}
                                {!! $errors->first('reffer_reason', '<p class="text-danger">:message</p>' ) !!}
                        </div>
                    </div>
                </div>
                <!-- /.form-horizontal -->
            </div>

              <!-- Blank Page End Here --> 
        </div>
        <div class="panel" style="height: 60px;">
            <div class="panel-content">
              <!-- Blank Page Start Here -->
                <div class="active tab-pane" id="personal">
                    <label for="inputName" class="col-sm-3 control-label">Next Appointment Date</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                    {{Form::text('next_appointment_date',null,array('class' => 'form-control datepicker'))}}
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">
                                    Submit Prescription   
                                </button>
                                
                            </div>
                        </div>
                </div>
            </div>
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
        //alert (obj.value);
        let patient_id = obj.value;
        $.ajax({
            type: 'Get',
            url:"{{ route('ajax.getPatientInfo') }}",
            data:{patient_id:patient_id}
        }).done(function(response) {
            //alert (response['name']);
            console.log(response);
            $('#polar_id').val(response['polar_id']);
            $('#gender').val(response['gender']);
            $('#bloodgroup').val(response['bloodgroup']);
            $('#age').val(response['birthdate']);
            
        }).fail(function(response) {
        });
    } 
</script>
@slot('css')
 <!--Date picker-->
 <link rel="stylesheet" href="{{ asset('vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css') }}">
@endslot
@endcomponent