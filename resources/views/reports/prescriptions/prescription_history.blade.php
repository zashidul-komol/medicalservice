@extends('layouts.admin')
@section('title', 'Freezer')
@section('content')
    <div class="content-header">
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="{{route('prescriptionreports.prescriptionHistory')}}">Prescription
                        Report </a></li>
                <li><a href="{{route('prescriptionreports.prescriptionHistory')}}">Prescription History</a></li>
            </ul>
        </div>
    </div>
    <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="@if($param=='0'){{ 'active' }}@endif"><a href="{{ route('prescriptionreports.prescriptionHistory',[0]) }}">Date Wise Prescription Report</a></li>
        </ul>
    </div>
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    {{ Form::open(['url'=>route('prescriptionreports.prescriptionHistory',$param),'method'=>'post', 'id'=>'brand-wise-df-status', 'class'=>'form-horizontal']) }}
                    {{ Form::hidden('is_download', 0, array('id' => 'is_download') ) }}
                    <div class="row">
                            <div class="form-group{{ $errors->has('range') ? ' has-error' : '' }}">
                                {{Form::label('Date Range:',null,array('class' => 'control-label col-sm-2'))}}
                                <div class="col-md-8">
                                    <div class="input-daterange input-group" id="area-range-datepicker">
                                        {{Form::text('start_date',$start_date,array('class' => 'form-control input-sm', 'id'=>'startDate'))}}
                                        <span class="input-group-addon x-primary">to</span>
                                        {{Form::text('end_date', $end_date,array('class' => 'form-control input-sm','id'=>'endDate'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('Organization Name:',null,array('class' => 'control-label col-sm-2'))}}
                                <div class="col-md-8">
                                    {{Form::select('organization_id[]',$organizations, $organizations, array('class' => 'select2 form-control','id'=>'organization-name-select2', 'multiple'=>true))}}
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('Employee Type:',null,array('class' => 'control-label col-sm-2'))}}
                                <div class="col-md-8">
                                    {{Form::select('employee_types[]',['Management'=>'Management', 'Non Management'=>'Non Management', 'Daily Labour'=>'Daily Labour', 'Sublime'=>'Sublime'],null,array('class' => 'select2 form-control','id'=>'employee-select2', 'multiple'=>true))}}
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('Chief Complain:',null,array('class' => 'control-label col-sm-2'))}}
                                <div class="col-md-8">
                                    {{Form::select('chiefComplain_id[]',$ChiefComplains, null, array('class' => 'select2 form-control','id'=>'chiefComplain-select2', 'multiple'=>true))}}
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-md-8 col-md-offset-2 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            @if(isset($is_download))
                @if(count($reportData))
                    <span class="pull-right">
                        <button type="submit" class="btn btn-info"
                                onClick="$('#is_download').val(1); $('#brand-wise-df-status').submit();">
                            <i class="fa fa-download" aria-hidden="true"></i>
                        </button>
                    </span>
                    <h4 class="section-subtitle"><b>Prescription History Report</b></h4>
                @endif
              @include('reports.prescriptions.prescription_history_report')
            @endif

        </div>
    </div>
@endsection

@component('common_pages.selectize')

    <script src="{{ asset('vendor/bootstrap_date-picker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>

        $('#area-range-datepicker').datepicker({
            format: "dd-mm-yyyy",
            weekStart: 1,
            todayBtn: "linked",
            todayHighlight: true,
            autoclose: true,
        });

        $("#organization-name-select2").select2({
            placeholder: "Please Select Organization Name",
            allowClear: true,
        });

        $("#employee-select2").select2({
            placeholder: "Please Select Employee Type",
            allowClear: true,
        });

        $("#chiefComplain-select2").select2({
            placeholder: "Please Select Chief Compalin",
            allowClear: true,
        });

        $("#region-select2").select2({
            placeholder: "Please Select Regions",
            allowClear: true,
        });

        $("#depot-select2").select2({
            placeholder: "Please Select Depot",
            allowClear: true,
        });

        $("#dfcode-select2").select2({
            placeholder: "Please Select DF Codes",
            allowClear: true,
        });

        $("#division-select2").select2({
            placeholder: "Please Select Division",
            allowClear: true,
        });

        $("#district-select2").select2({
            placeholder: "Please Select District",
            allowClear: true,
        });

        $("#thana-select2").select2({
            placeholder: "Please Select Thana",
            allowClear: true,
        });

        $('#district-select2').on('select2:select', function (e) {
            var districtIds = $(this).val();
            var thanaSelectedId = $("#thana-select2").val();
            populateDistrict(districtIds,thanaSelectedId);
        });

        $('#district-select2').on('select2:unselect', function (e) {
            setTimeout(function () {
                var districtIds = $("#district-select2").val();
                var thanaSelectedId = $("#thana-select2").val();
                populateDistrict(districtIds,thanaSelectedId);
            },100);
        });

        $('#division-select2').on('select2:select', function (e) {
            var divisionIds = $(this).val();
            var districtSelectedId = $("#district-select2").val();
            populateDivisions(divisionIds,districtSelectedId);
        });

        $('#division-select2').on('select2:unselect', function (e) {
            setTimeout(function () {
                var divisionIds = $("#division-select2").val();
                var districtSelectedId = $("#district-select2").val();
                populateDivisions(divisionIds,districtSelectedId);
            },100);
        });

    </script>
    @slot('css')
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css') }}">
    @endslot
@endcomponent