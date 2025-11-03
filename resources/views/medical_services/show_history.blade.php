@extends('layouts.admin')
@section('title', 'DF list for complain')
@section('content')
<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Services</a></li>
            <li><a>Service History</a></li>
        </ul>
    </div>
</div>

<div class="row animated fadeInRight">
    <div class="col-md-12 col-lg-12">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--HEADER INFO-->
        <div class="panel  project-detail">
            <div class="panel-content">
                <div class="row">
                    <div class="col-sm-12 p-project">

                        <div class="col-sm-12 p-project">

                        @php


                        $donutMonth = \Carbon\Carbon::parse($employee->hiredate)->startOfDay()->diffInMonths();

                       @endphp
                        
                        <div class="p-progress">
                            <span class="donut">{{round($donutMonth,2)}}/200</span>
                            <span class="value"> </span></div>
                        <div class="p-data">
                            <h5 class="p-name">{{$employee->name}}</h5>
                            <div class="p-update">Join Date: <span class="highlight">{{\Carbon\Carbon::parse($employee->hiredate)->format('d-M-Y')}}</span></div>
                            <div class="p-status"><small>Bloodgroup:</small> <span class="badge x-info">{{$employee->bloodgroup}}</span></div>
                            <div class="p-status"><small>Gender:</small> <span class="badge x-info">{{$employee->gender}}</span>|</div>
                            <div class="p-deadline"><small>Age: </small><b>
                                {{\Carbon\Carbon::parse($employee->birthdate)->diff(\Carbon\Carbon::now())->format('%y years, %m months')}}
                            </b></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="col-md-12">
        <!--TIMELINE right-->
        <div class="timeline tl-right">
            <h4><span class="highlight">Prescription History</span> </h4>
            @foreach($appointments as $appointment)
            <div class="timeline-box">
                <div class="timeline-icon bg-primary">
                    <i class="fa fa-angle-up"></i>
                </div>
                <div class="timeline-content">
                    <h4 class="tl-title"> 
                        <span>Chief Complain : {{$appointment->chief_complains_names}}</span>
                    </h4>
                    <h4 class="tl-title">
                        <span>Report : <a href="{{ asset('storage/reports/'.$appointment->upload_report) }}" target="_blank">{{ $appointment->upload_report }}</a>
                        </span>
                    </h4>
                    <h6 class="tl-title">
                        <span>Temp :  {{$appointment->temperature}} , </span>
                        <span>BP :  {{$appointment->bp}} , </span>
                        <span>Pulse :  {{$appointment->pulse}} , </span>
                        <span>Lungs :  {{$appointment->lungs}} , </span>
                        <span>Heart :  {{$appointment->heart}} . </span>
                        <span>Others :  {{$appointment->others}} . </span>
                        <span>Advice :  {{$appointment->advice}} . </span>
                    </h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">Name of Medicine</th>
                                <th width="40%">When to take Medicine</th>
                                <th width="10%">Duration</th>
                                <th width="30%">Suggetions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointment->medicines as $medicine)
                            <tr>
                                <td>{{$medicine->medicine_name}}</td>
                                <td>{{$medicine->when_take_medicine}}</td>
                                <td>{{$medicine->medicine_duration}}</td>
                                <td>{{$medicine->suggetions}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        @if(!empty($appointment->basic_treatment))
                        <tbody>
                            <tr>
                                <td>Basic Treatment : </td>
                                <td colspan="3">{{$appointment->basic_treatment}}</td>
                            </tr>
                        </tbody>
                        @endif
                        @if(!empty($appointment->refer_other))
                        <tbody>
                            <tr>
                                <td>Refer to others : </td>
                                <td colspan="3">{{$appointment->refer_other}}</td>
                            </tr>
                        </tbody>
                        @endif
                        @if(!empty($appointment->refer_reason))
                        <tbody>
                            <tr>
                                <td>Refer Reasons : </td>
                                <td colspan="3">{{$appointment->refer_reason}}</td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
                <div align="center">
                    <span class="badge x-primary">Appointment Date:
                    @if($appointment->appointment_date)
                        {{\Carbon\Carbon::parse($appointment->appointment_date)->format('d-M-Y')}}
                        
                    @else
                        Not Attain Yet
                    @endif
                    </span> | 
                    <span class="badge x-primary"> Next Appointment Date:
                    @if($appointment->next_appointment_date)
                        {{\Carbon\Carbon::parse($appointment->next_appointment_date)->format('d-M-Y')}}
                        
                    @else
                        Not Attain Yet
                    @endif
                    </span> |
                    <span class="badge x-primary">Prescription No:
                    @if($appointment->prescription_no)
                        {{$appointment->prescription_no}}
                        
                    @else
                        Not Done Yet
                    @endif
                    </span> |
                    
                </div>

            </div>
            @endforeach
            

        </div>
    </div>

        </div>
    </div>

</div>
@endsection
@section('script')
   <!--peity chart-->
    <script src="{{ asset('vendor/peity-chart/jquery.peity.min.js') }}"></script>
    <script>
        $(".donut").peity("donut", {
            radius: 45,
            innerRadius: 25,
            fill: function(value, i) {

                if (i == 0) {

                    if (value > 60) {
                        return "#d2322d";
                    } else if (value > 30) {
                        return '#fea223';
                    } else {
                        return '#88b93c';
                    }
                } else {
                    return '#ececec';
                }

            }
        })


    </script>
@stop

