@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-md-2">
        <!--CONTACT INFO-->
        <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
            <div class="panel-content">
                <div class="box box-primary">
                  <div class="box-body box-profile">
                    @php
                      $avatar = '';
                      if(!empty($employees->user)){
                      $avatar = $employees->user->avatar;
                    }
                    @endphp
                    @if($avatar)
                      <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/images/avatar/'.$avatar) }}" alt="User profile picture">
                    @else
                      <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/images/avatar/avatar_user.jpg') }}" />
                    @endif
                    {!! $errors->first('avatar', '<p class="text-danger">:message</p>' ) !!}

                    <h5 class="profile-username text-center">{{$employees->name or ''}}</h5>

                    <p class="text-muted text-center">{{$employees->designation->title or ''}}</p>

                  </div>
            <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
    {{ Form::model($employees,array('route' => array('employees.updateEmployee',$employees),'method' => 'PUT','enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
    <div class="col-sm-5">
        <div class="panel">
            <div class="panel-content">
                
              <!-- Blank Page Start Here -->
              <div class="active tab-pane" id="personal">
                  
                        <div class="form-group">
                          <label for="inputName" class="col-sm-3 ">Full Name</label>
                          <div class="col-sm-9">
                            {{Form::text('name',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('name', '<p class="text-danger">:message</p>' ) !!}
                          </div>
                          
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-3 ">Company Name</label>
                          <div class="col-sm-9">
                            {{Form::text('name',$employees->organization->organization,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('name', '<p class="text-danger">:message</p>' ) !!}
                          </div>
                          
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 ">Department</label>
                            <div class="col-xs-9">
                                {{Form::text('name',$employees->department->name,array('class' => 'form-control', 'readonly' => 'true'))}}
                                {!! $errors->first('name', '<p class="text-danger">:message</p>' ) !!}
                            </div>               
                        </div>
                        <div class="form-group">                          
                          <label for="inputName" class="col-sm-3 ">Designation</label>
                          <div class="col-xs-9">
                             {{Form::text('title',$employees['designation']['title'],array('class' => 'form-control', 'readonly' => 'true'))}}
                             {!! $errors->first('title', '<p class="text-danger">:message</p>' ) !!} 
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-3 ">Mobile No.</label>
                            <div class="col-xs-4">
                                <div class="input-group">
                                   {{Form::text('mobile',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('mobile', '<p class="text-danger">:message</p>' ) !!} 
                                    
                                </div>
                            </div>                               
                            <label for="inputName" class="col-sm-2 ">Grade</label>
                            <div class="col-xs-3">
                                <div class="input-group">
                                   {{Form::text('grade',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('grade', '<p class="text-danger">:message</p>' ) !!} 
                                   
                                </div>
                            </div>
                        </div>
                        
                                        
                       
                 
                  <!-- /.form-horizontal -->
              </div>

              <!-- Blank Page End Here --> 
            </div>
        </div>
    </div>
@section('vuescript')
<script>
    laravelObj.division_id='{{ $employees[0]->division_id or '' }}';
    laravelObj.districts =JSON.parse('{!! $districts or '' !!}');
    laravelObj.district_id='{{ $employees[0]->district_id or '' }}';
    laravelObj.thanas =JSON.parse('{!! $thanas or '' !!}');
    laravelObj.thana_id ='{{ $employees[0]->thana_id or '' }}';
</script>
@stop
    <div class="col-sm-5">
        <div class="panel">
            <div class="panel-content">

              <!-- Blank Page Start Here -->
              <div class="active tab-pane" id="personal">
                  
                        <div class="form-group">
                          <label for="inputName" class="col-sm-3 ">Birth Date</label>
                            <div class="col-xs-4">
                                <div class="input-group">
                                  <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                    {{Form::text('birthdate',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                                </div>
                            </div>  
                            <label for="inputName" class="col-sm-2 ">Joining Date</label>
                            <div class="col-xs-3">
                                <div class="input-group">
                                   {{Form::text('hiredate',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('hiredate', '<p class="text-danger">:message</p>' ) !!} 
                                   
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                          <label for="inputName" class="col-sm-3 ">Maritial Status</label>
                            <div class="col-xs-4">
                                <div class="input-group">
                                   {{Form::text('maritial_status',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('maritial_status', '<p class="text-danger">:message</p>' ) !!} 
                                    
                                </div>
                            </div>
                            <label for="inputName" class="col-sm-2 ">Blood Group</label>
                            <div class="col-xs-3">
                                <div class="input-group">
                                   {{Form::text('bloodgroup',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('bloodgroup', '<p class="text-danger">:message</p>' ) !!} 
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-3 ">ID No.</label>
                            <div class="col-xs-4">
                                <div class="input-group">
                                   {{Form::text('polar_id',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('polar_id', '<p class="text-danger">:message</p>' ) !!} 
                                    
                                </div>
                            </div>                               
                            <label for="inputName" class="col-sm-2 ">Gendar</label>
                            <div class="col-xs-3">
                                <div class="input-group">
                                   {{Form::text('gender',null,array('class' => 'form-control', 'readonly' => 'true'))}}
                              {!! $errors->first('gender', '<p class="text-danger">:message</p>' ) !!} 
                                   
                                </div>
                            </div>
                        </div>
                  <!-- /.form-horizontal -->
              </div>

              <!-- Blank Page End Here --> 
            </div>
        </div>
    </div>
{{ Form::close() }} 
  </div>
@endsection

