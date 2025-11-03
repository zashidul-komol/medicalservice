<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
    <link rel="stylesheet" href="{{ public_path().'/css/pdf.min.css' }}">

    <style type="text/css">
        body {
            font-size:14px;
            line-height:15px;
            font-family:'bangla-bold', sans-serif;
        }
        header {
          background-color: #666;
          padding: 30px;
          text-align: center;
          font-size: 35px;
          color: white;
        }
</style>
</head>
<body>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th style="width: 20%;">
                     <img class="img" src="{{public_path('images/PolarLogoBangla.png')}}" alt="logo">
                </th>
                <td style="width: 63%;">
                    <div style="height:30px" align="center">
                        <b><h2>Dhaka Ice Cream Industries Limited</h2></b> </div>
                    <div style="height:20px" align="center"><h4>Khagan,     Birulia, Ashulia, Savar, Dhaka.</h4></div>
                </td>
                <td align="right" style="width: 17%;">
                    <div style="height:20px" align="right">
                        <img class="img" src="{{public_path('images/barcode.png')}}" alt="logo"> 
                    </div>
                    <div style="height:20px" align="right">
                        <h4>{{$appointmentsDetails[0]->prescription_no}}</h4> 
                    </div>
                </td>
                
            </tr>
        </thead>
    </table>
    
	<table width="100%" cellpadding="0" cellspacing="0" border="1">
        <tbody>
            <tr>
                <td colspan="2">
                    <table class="subtable">
                        <tr>
                            <td width="70%"><span class="title" >Employee ID :  {{$appointmentsDetails[0]->polar_id}}</span><span class="data"></span></td>
                            <td width="30%"><span class="title">Date: </span><span class="data">&nbsp;&nbsp;{{ $appointmentsDetails[0]->appointment_date }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="subtable" border="1">
                        <tr>
                            <td width="50%"><span class="title">Patient Name: {{$appointmentsDetails[0]->employees->name}}</span><span class="data"></span></td>
                            <td width="20%"><span class="title">Gender: {{$appointmentsDetails[0]->employees->gender}}</span><span class="data"></span></td>
                            <td width="30%"><span class="title">Age: {{\Carbon\Carbon::parse($appointmentsDetails[0]->employees->birthdate)->diff(\Carbon\Carbon::now())->format('%y years, %m months')}}</span><span class="data"></span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
<div style="width: 100%; float:left; height:20px; background-color::rgb(240, 240, 240);">
   
</div>
<div class="row" style="width: 40%; float:left; background-color::rgb(240, 240, 240); height: 800px;">
    <article>    
        <table style="font-family:myriadpro, Verdana, sans-serif; color:#111111;">
            <tbody>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <table style="font-family:myriadpro, Verdana, sans-serif; color:#111111;">
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt;">C/C</td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->chief_complains_names }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <table>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <table>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <table>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table >
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt;">O/E</td>
                                <td width="2%">:</td>
                                <td width="80%"></td>
                            </tr>
                             <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt;">Temp</td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->temperature}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt;">Pulse</td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->pulse}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt;">BP</td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->bp}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt;">Lungs </td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->lungs}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt;">Heart </td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->heart}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="18%" style="vertical-align:top; padding:5px; font-size: 20pt; ">Others </td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->others}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="18%" height="300px;" style="vertical-align:top; padding:5px; font-size: 20pt;">Advice  </td>
                                <td width="2%">:</td>
                                <td width="80%" style="vertical-align:top; padding:5px; font-size: 20pt;">{{$appointmentsDetails[0]->advice}}</td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </article>
</div>
@if(!empty($MedicineDetails[0]))
<div style="width: 60%; float:right;">
  <article>
        <table >
            <tbody>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td width="7%">Rx.</td>
                                <td width="6%"></td>
                                <td width="2%"></td>
                                <td width="60%"></td>
                                <td width="25%"></td>
                            </tr>
                            @php ($i=1)
                            @foreach ($MedicineDetails as $key=>$data)
                            <tr>
                                <td width="7%"></td>
                                <td width="6%">{{$i}}.</td>
                                <td width="2%"></td>
                                <td width="60%">{{ $data->medicine_name or '' }}</td>
                                <td width="25%"></td>
                            </tr>
                            <tr>
                                <td width="7%"></td>
                                <td width="6%"></td>
                                <td width="2%"></td>
                                <td width="60%">{{$data->when_take_medicine or ''}} -- {{ $data->suggetions or '' }}</td>
                                <td width="25%">- {{$data->medicine_duration or ''}}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            @php ($i=$i+1)
                            @endforeach
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
  </article>
</div>
@endif
<div style="width: 60%; float:right;">
  <article>
        <table >
            <tbody>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$appointmentsDetails[0]->basic_treatment or ''}}</td>
                            </tr> 
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$appointmentsDetails[0]->refer_other or ''}}</td>
                            </tr> 
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="5">{{$appointmentsDetails[0]->refer_reason or ''}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
  </article>
</div>
<div style="width: 100%; float:left">
   
</div>
<footer class="bg-body-tertiary text-center text-lg-start">
    <div class="row" align="right">
        
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        Design & Dev By: Polar IT : Web: 
        <a class="text-body" href="https://medicalservice.polarbd.com/">https://medicalservice.polarbd.com </a><a>// Next Appointment Date : {{$appointmentsDetails[0]->next_appointment_date}}</a>
    </div> 
<!-- Copyright -->
</footer>


</body>
</html>