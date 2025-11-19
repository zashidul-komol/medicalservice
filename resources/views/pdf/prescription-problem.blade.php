<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title></title>
    <link rel="stylesheet" href="{{ public_path().'/css/pdf.css' }}">

<style type="text/css">
    body {
        font-size:14px;
        line-height:22px;
        font-family:'bangla-bold', sans-serif;
    }
    .cTr{
        width: 100%;
    }
    .fl{
        float: left;
    }
    .bbt{
        font-size: 12px;
        font-family:english;
        border-bottom:2px dotted #000;
    }
    .bb{ border-bottom:1px dotted #000;}

</style>
</head>
{{$appointmentsDetails}}
<body>
    <table>
        <thead>
            <tr>
                <th >
                     <img class="img" src="{{public_path('images/PolarLogoBangla.png')}}" alt="logo">
                </th>
                <td >
                    <div style="height:30px" align="center">
                        <b><h2>Dhaka Ice Cream Industries Limited</h2></b> </div>
                    <div style="height:20px" align="center"><h4>Khagan,     Birulia, Savar, Dhaka.</h4></div>
                </td>
                <td align="right" >
                    <div style="height:20px" align="right">
                        <img class="img" src="{{public_path('images/barcode.png')}}" alt="logo"> 
                    </div>
                    <div style="height:20px" align="left">
                        <h4>Prescription No : {{$appointmentsDetails[0]->prescription_no}}</h4> 
                    </div>
                </td>
                
            </tr>
        </thead>
    </table>
    
	<table id="main-table" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="2">
                    <table class="subtable">
                        <tr>
                            <td width="50%"><span class="title" style="width: 22%">Employee ID :  {{$appointmentsDetails[0]->polar_id}}</span><span class="data" style="width: 78%"></span></td>
                            <td width="30%"><span class="title" style="width: 16%">Date: </span><span class="data" style="width: 84%">&nbsp;&nbsp;{{ $appointmentsDetails[0]->appointment_date }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="subtable">
                        <tr>
                            <td width="50%"><span class="title" style="width: 30%">Patient Name: {{$appointmentsDetails[0]->employees->name}}</span><span class="data" style="width: 70%"></span></td>
                            <td width="20%"><span class="title" style="width: 40%">Gender: {{$appointmentsDetails[0]->employees->gender}}</span><span class="data" style="width: 60%"></span></td>
                            <td width="30%"><span class="title" style="width: 20%">Age: {{\Carbon\Carbon::parse($appointmentsDetails[0]->employees->birthdate)->diff(\Carbon\Carbon::now())->format('%y years, %m months')}}</span><span class="data" style="width: 80%">&nbsp;&nbsp;</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    
    <table width="40%" align="left" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td width="20%">C/C : </td>
                            <td width="20%"></td>
                        </tr>
                        <tr>
                            <td width="30%">{{$appointmentsDetails[0]->chief_complain}}</td>
                            <td width="10%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td width="30%"></td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="30%"></td>
                            <td width="10%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <div class="fl">
                    <td colspan="2">
                    <table>
                        <tr>
                            <td width="8%">O/E : </td>
                            <td width="2%">যেহেতু কোম্পানী (প্রথম পক্ষ) তাহার ঢাকার তেজগাঁও শিল্প এলাকায়</td>
                            <td width="30%"></td>
                        </tr>
                        <tr>
                            <td width="8%">Temp</td>
                            <td width="2%">:</td>
                            <td width="30%">{{$appointmentsDetails[0]->temperature}}</td>
                        </tr>
                        <tr>
                            <td width="8%">Pulse</td>
                            <td width="2%">:</td>
                            <td width="30%">{{$appointmentsDetails[0]->pulse}}</td>
                        </tr>
                        <tr>
                            <td width="8%">BP</td>
                            <td width="2%">:</td>
                            <td width="30%">{{$appointmentsDetails[0]->bp}}</td>
                        </tr>
                        <tr>
                            <td width="8%">Lungs </td>
                            <td width="2%">:</td>
                            <td width="30%">{{$appointmentsDetails[0]->lungs}}</td>
                        </tr>
                        <tr>
                            <td width="8%">Heart </td>
                            <td width="2%">:</td>
                            <td width="30%">{{$appointmentsDetails[0]->heart}}</td>
                        </tr>
                        <tr>
                            <td width="8%">Others </td>
                            <td width="2%">:</td>
                            <td width="30%">{{$appointmentsDetails[0]->others}}</td>
                        </tr>
                        <tr>
                            <td width="8%" height="300px;">Advice  </td>
                            <td width="2%">:</td>
                            <td width="30%">{{$appointmentsDetails[0]->advice}}</td>
                        </tr>
                        
                    </table>
                </td>
                    
                </div>
                
            </tr>
        </tbody>
    </table>
    <table width="60%" align="right" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td align="left" width="10%">
                    <td width="10%" align="left">
                        
                    </td>
                            
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table >
                        @foreach ($MedicineDetails as $key=>$data)
                          <tr>
                            <td align="left" width="30%">{{ $data->medicine_name ?? '' }}</td>
                            <td align="left" width="20%">{{$data->medicine_duration ?? ''}}</td>
                            
                          </tr>
                          <tr>
                            <td align="left" width="20%">{{$data->when_take_medicine ?? ''}}</td>
                            <td align="left" width="30%">{{ $data->suggetions ?? '' }}</td>
                            
                          </tr>
                        @endforeach
                                                
                    </table>
                </td>
            </tr>
            
        </tbody>
    </table>

    <table width="60%" align="right" cellpadding="0" cellspacing="0">
        <tr>
            <td width="60%" align="left" height="800px;">&nbsp</td>
            <td width="40%" align="right" height="800px;">&nbsp</td>
            
        </tr>
        <tr>
            <td colspan="3" align="right">You will come again after  
                {{\Carbon\Carbon::parse($appointmentsDetails[0]->next_appointment_date)->diff(\Carbon\Carbon::now())->format('%d days')}}.
            </td>
                            
        </tr>
        
    </table>
</body>
</html>