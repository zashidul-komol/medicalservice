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
                    <table id="datatable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('vuescript')
<script>
        function showModal(serial,){
            laravelObj.common=serial;
            var modalBody=$('#modal-body');
            modalBody.css('padding-top',0);
            modalBody.html('');
            $.ajax({
                type: 'Get',
                url:"{{ route('ajax.items.getItemDetailsBySeraial') }}",
                data:{serial:serial}
            }).done(function(response) {
                 modalBody.html(response);
            }).fail(function(response) {
                console.log(response);
            });
            $('#common-modal').modal('show');
        };

      //get distributor(request goes in requisition route)
        function getDepotDistributor(depotId){
            $('#shop-list').html('');
            $.ajax({
              type: 'Get',
              url:"{{ route('ajax.getShops') }}",
              data:{depot_id:depotId,distributor:1}
            }) .done(function(response) {
             $('#shop-list').html(response);
             //remove empty value option
             $('#shop_id option')
             .filter(function() {
                 return !this.value || $.trim(this.value).length == 0 || $.trim(this.text).length == 0;
             })
             .remove();

            if('{{old('shop_id')}}'){
                $("#shop_id").val('{{old('shop_id')}}').change();
            }

          })
          .fail(function(response) {
          });
        }
    </script>
@stop
@component('common_pages.data_table_script')
@include('common_pages.max_length')
<script>

        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [], /* No ordering applied by DataTables during initialisation */
                "pageLength": 25,
                "columnDefs": [ {
                  "targets": 'no-sort',
                  "orderable": false,
                  "order": []
                } ],
                "ajax": "{{ route('ajax.items.prescriptionHistory') }}",
                "columns": [
                    {
                    "data": null, 
                    "orderable": false,
                    "bSearchable": false,
                    "render": function (data, type, full, meta) {
                        return meta.row + 1;
                        }
                    },
                    {
                        "orderable": false,
                        "data": "polarID",
                        "name":"employees.polar_id"
                    },
                    { "data": "name","name":"employees.name" },
                    { "data": "title","name":"designations.title" },
                    { "data": "depatName","name":"departments.name" },
                    {
                        "data": "id",
                        "orderable": false,
                        "bSearchable": false,
                         render: function (data, type, full, meta) {
                            var actionStr = '';

                            actionStr = actionStr + '<a href="'+laravelObj.appHost+'/prescription_history/'+data+'" class="btn btn-info">Prescription History</a>';
                            return actionStr;
                        }
                     }
                   
                ]
            });
        });
    </script>
    
@endcomponent

