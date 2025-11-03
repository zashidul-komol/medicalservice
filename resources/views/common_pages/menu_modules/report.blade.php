<li class=" has-child-item{{ check_menu_active($current_location,config('myconfig.menu.report')) }}">
    {{-- onclick="addcollapsibleclass('left-sidebar-collapsed')" --}}
    <a><i class="fa fa-file" aria-hidden="true"></i><span>Reports Module</span></a>
     <ul class="nav child-nav level-1">

        <!-- Service Start-->
        @if(isMenuRender('ServiceReportsController@prescriptionHistory',$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['ServiceReportsController']) }}">
                @if(isMenuRender('ServiceReportsController@prescriptionHistory',$menu_list))
                    <li @if($current_location=='ServiceReportsController@prescriptionHistory') class="active-item" @endif><a href="{{ route('prescriptionreports.prescriptionHistory',[]) }}">Prescription History</a></li>
                @endif
            </li>
        @endif
        <!-- Service end=======-->

    </ul>
</li>
