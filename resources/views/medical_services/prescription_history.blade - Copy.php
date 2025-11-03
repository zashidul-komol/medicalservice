@extends('layouts.admin')
@section('title', 'Prescription History')
@section('content')
<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Prescription</a></li>
            <li><a>List of Prescription History</a></li>
        </ul>
    </div>
</div>

<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle">
            <b>Prescription History</b>
        </h4>
        <div class="panel">
            <div class="panel-content">
				 <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php ($i=1)
                        @foreach ($appointmentsDetails as $data)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->employees->polar_id or ''}}</td>
                        <td>{{$data->employees->name or ''}}</td>
                        <td>{{$data->employees->designation->title or ''}}</td>
                        
                        <td>
                                                                                                                               
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

        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [], /* No ordering applied by DataTables during initialisation */
                "pageLength": 25,
                "ajax": "{{ route('ajax.items.prescriptionHistory') }}",
                "columns": [
                    { "data": "serial_no" },
                    {
                        "orderable": false,
                        "data": "depot",
                        "name":"depots.name"
                    },
                    { "data": "outlet_name","name":"shops.outlet_name" },
                    { "data": "proprietor_name" ,"name":"shops.proprietor_name"},
                    { "data": "mobile","name":"shops.mobile" },
                     { "data": "size","name":"sizes.name" },
                    {
                        "data": "serial_no",
                        "orderable": false,
                        "bSearchable": false,
                        render: function (data, type, full, meta) {
                            var actionStr = '';

                            actionStr = actionStr + '<a href="'+laravelObj.appHost+'/service-history/'+full.id+'" class="btn btn-info">Service History</a>';
                            return actionStr;

                        }
                    }
                ]
            });
        });
    </script>
    <script>
  $(function(){
      "use strict";
      $('.data-table').DataTable({
        "order": [], /* No ordering applied by DataTables during initialisation */
      });
  });
</script>
@endcomponent

