@extends('layouts.admin')
@section('title', 'Employee Lists')
@section('content')
<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Employee</a></li>
            <li><a>Edit</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">

    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Edit Employee</b></h4>
        <span class="pull-right">
            {!! Html::decode(link_to_route('employees.index','<i class="fa fa-list"></i>',[],array('class'=>'btn btn-success btn-right-side'))) !!}
        </span>
        <div class="panel">
            <div class="panel-content">

              <!-- Blank Page Start Here -->
              <div class="active tab-pane" id="personal">
                  {{ Form::model($employees[0],array('route' => array('employees.update',$employees[0]->id),'method' => 'PUT','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 ">Name</label>

                          <div class="col-sm-4">
                            {{Form::text('name',null,array('class' => 'form-control'))}}
                              {!! $errors->first('name', '<p class="text-danger">:message</p>' ) !!}
                          </div>
                          <label for="inputName" class="col-sm-2 ">Company Name</label>

                          <div class="col-sm-4">
                            {{Form::select('organization_id',[''=>'--Please Select Company--']+$organizations->toArray(),null,array('class' => 'form-control select2'))}}
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 ">Department</label>
                          <div class="col-xs-4">
                            {{Form::select('dept_id',$departments,null,array('class' => 'form-control select2'))}}
                          </div>
                          
                          <label for="inputName" class="col-sm-2 ">Designation</label>
                          <div class="col-xs-4">
                              {{Form::select('desig_id',$designations,null,array('class' => 'form-control select2'))}}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 ">Polar ID</label>

                          <div class="col-xs-4">
                              {{Form::text('polar_id',null,array('class' => 'form-control'))}}
                              {!! $errors->first('polar_id', '<p class="text-danger">:message</p>' ) !!}
                          </div>
                          <label for="inputName" class="col-sm-2 ">Blood Group</label>
                          <div class="col-xs-1">
                              {{Form::text('bloodgroup',null,array('class' => 'form-control'))}}
                              {!! $errors->first('bloodgroup', '<p class="text-danger">:message</p>' ) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 ">Hire Date</label>
                            <div class="col-xs-4">
                                <div class="input-group">
                                    <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                    {{Form::text('hiredate',null,array('class' => 'form-control datepicker'))}}
                                </div>
                            </div>
                        
                          <label for="inputName" class="col-sm-2 ">Birth Date</label>
                          <div class="col-xs-4">
                                <div class="input-group">
                                    <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                    {{Form::text('birthdate',null,array('class' => 'form-control datepicker'))}}
                                </div>
                            </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 ">Mobile</label>

                          <div class="col-xs-4">
                              {{Form::text('mobile',null,array('class' => 'form-control'))}}
                              {!! $errors->first('mobile', '<p class="text-danger">:message</p>' ) !!}
                          </div>
                          <label for="inputName" class="col-sm-2 ">Gender</label>
                          <div class="col-xs-4">
                              {{Form::select('gender',[''=>'--Please Select Gender--']+['Male'=>'Male', 'Female'=>'Female'],null,array('class' => 'form-control'))}}
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 ">Employee Status</label>

                          <div class="col-xs-4">
                              {{Form::select('status',config('myconfig.status'),null,array('class' => 'form-control'))}}
                          </div>
                          <label for="inputName" class="col-sm-2 ">Employee Type</label>
                          <div class="col-xs-4">
                              {{Form::select('employee_type',[''=>'--Please Select Employee Type--']+['Management'=>'Management', 'Non Management'=>'Non-Management', 'Daily Labour'=>'Daily Labour', 'Sublime'=>'Sublime'],null,array('class' => 'form-control select2'))}}
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"> Update</button>
                          </div>
                      </div>
                 {{ Form::close() }}
                  <!-- /.form-horizontal -->
              </div>

              <!-- Blank Page End Here --> 
            </div>
        </div>
    </div>
</div>
@endsection
@section('vuescript')
<script>
    laravelObj.division_id='{{ $employees[0]->division_id ?? '' }}';
    laravelObj.districts =JSON.parse('{!! $districts ?? '' !!}');
    laravelObj.district_id='{{ $employees[0]->district_id ?? '' }}';
    laravelObj.thanas =JSON.parse('{!! $thanas ?? '' !!}');
    laravelObj.thana_id ='{{ $employees[0]->thana_id ?? '' }}';
</script>
@stop
@component('common_pages.selectize')
@include('common_pages.max_length')
<script src="{{ asset('vendor/bootstrap_date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">

        $('.datepicker').datepicker({ format: "yyyy-mm-dd",todayHighlight: true,autoclose:true});

        //get shops ?? distributor
        
    </script>
    @slot('css')
     <!--Date picker-->
     <link rel="stylesheet" href="{{ asset('vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css') }}">
    @endslot
@endcomponent
