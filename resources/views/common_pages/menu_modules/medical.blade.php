<li class=" has-child-item{{ check_menu_active($current_location,config('myconfig.menu.medical')) }}">
    <a><i class="fa fa-plus" aria-hidden="true"></i><span>Medical Service Module</span></a>
     <ul class="nav child-nav level-1">

    <!-- Medical Services start-->
        @if(isMenuRender(['AppointmentsController@create','AppointmentsController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['AppointmentsController']) }}">
                @if(isMenuRender('AppointmentsController@index',$menu_list))
                    <li @if($current_location=='AppointmentsController@index') class="active-item" @endif><a href="{{ route('medical_services.index',[]) }}">Prescription List</a></li>
                @endif
                                                            
            </li>
            <li class="has-child-item{{ check_menu_active($current_location,['AppointmentsController']) }}">
                @if(isMenuRender('AppointmentsController@create',$menu_list))
                    <li @if($current_location=='AppointmentsController@create') class="active-item" @endif><a href="{{ route('medical_services.create',[]) }}">Appointment</a></li>
                @endif
                                                            
            </li>
            <li class="has-child-item{{ check_menu_active($current_location,['AppointmentsController']) }}">
                @if(isMenuRender('AppointmentsController@PrescriptionHistory',$menu_list))
                    <li @if($current_location=='AppointmentsController@PrescriptionHistory') class="active-item" @endif><a href="{{ route('medical_services.prescription_history',[]) }}">Prescription History</a></li>
                @endif
                                                            
            </li>
        @endif
        <!-- Employee Managements end-->

        

    </ul>
</li>
