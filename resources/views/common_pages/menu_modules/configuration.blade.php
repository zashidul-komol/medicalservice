<li class=" has-child-item{{ check_menu_active($current_location,config('myconfig.menu.configaration')) }}">
    <a><i class="fa fa-sitemap" aria-hidden="true"></i><span>Configuration</span></a>
     <ul class="nav child-nav level-1">

        <!-- Designation Managements start-->
        @if(isMenuRender(['DesignationsController@create','DesignationsController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['DesignationsController']) }}">
                <a><span>Designation Setup</span></a>
                 <ul class="nav child-nav level-2">

                    @if(isMenuRender('DesignationsController@create',$menu_list))
                        <li @if($current_location=='DesignationsController@create') class="active-item" @endif><a href="{{ route('designations.create',[]) }}">Add Designation</a></li>
                    @endif
                    @if(isMenuRender('DesignationsController@index',$menu_list))
                        <li @if($current_location=='DesignationsController@index') class="active-item" @endif><a href="{{ route('designations.index',[]) }}">Designation Lists</a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- Designation Managements end-->

        <!-- Department Managements start-->
        @if(isMenuRender(['DepartmentsController@create','DepartmentsController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['DepartmentsController']) }}">
                <a><span>Department Setup</span></a>
                 <ul class="nav child-nav level-2">

                    @if(isMenuRender('DepartmentsController@create',$menu_list))
                        <li @if($current_location=='DepartmentsController@create') class="active-item" @endif><a href="{{ route('departments.create',[]) }}">Add Department</a></li>
                    @endif
                    @if(isMenuRender('DepartmentsController@index',$menu_list))
                        <li @if($current_location=='DepartmentsController@index') class="active-item" @endif><a href="{{ route('departments.index',[]) }}">Department Lists</a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- Department Managements end-->

        <!-- Office Locations Managements start-->
        @if(isMenuRender(['OfficeLocationsController@create','OfficeLocationsController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['OfficeLocationsController']) }}">
                <a><span>Office Location Setup</span></a>
                 <ul class="nav child-nav level-2">

                    @if(isMenuRender('OfficeLocationsController@create',$menu_list))
                        <li @if($current_location=='OfficeLocationsController@create') class="active-item" @endif><a href="{{ route('officelocations.create',[]) }}">Add Office Location</a></li>
                    @endif
                    @if(isMenuRender('OfficeLocationsController@index',$menu_list))
                        <li @if($current_location=='OfficeLocationsController@index') class="active-item" @endif><a href="{{ route('officelocations.index',[]) }}">Office location Lists</a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- Office locations Managements end-->

        <!-- Region Managements start-->
        @if(isMenuRender(['RegionsController@create','RegionsController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['RegionsController']) }}">
                <a><span>Region Setup</span></a>
                 <ul class="nav child-nav level-2">

                    @if(isMenuRender('RegionsController@create',$menu_list))
                        <li @if($current_location=='RegionsController@create') class="active-item" @endif><a href="{{ route('regions.create',[]) }}">Add Region</a></li>
                    @endif
                    @if(isMenuRender('RegionsController@index',$menu_list))
                        <li @if($current_location=='RegionsController@index') class="active-item" @endif><a href="{{ route('regions.index',[]) }}">Region Lists</a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- Region Managements end-->

        <!-- Chief Complain Managements start-->
        @if(isMenuRender(['ChiefComplainsController@create','ChiefComplainsController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['ChiefComplainsController']) }}">
                <a><span>Chief Complain Setup</span></a>
                 <ul class="nav child-nav level-2">

                    @if(isMenuRender('ChiefComplainsController@create',$menu_list))
                        <li @if($current_location=='ChiefComplainsController@create') class="active-item" @endif><a href="{{ route('chiefComplain.create',[]) }}">Add Chief Complain</a></li>
                    @endif
                    @if(isMenuRender('ChiefComplainsController@index',$menu_list))
                        <li @if($current_location=='ChiefComplainsController@index') class="active-item" @endif><a href="{{ route('chiefComplain.index',[]) }}">Chief Complain Lists</a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- Chief Complain Managements end-->

        <!-- Sugestions start-->
        @if(isMenuRender(['SugestionsController@create','SugestionsController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['SugestionsController']) }}">
                <a><span>Sugestions Setup</span></a>
                 <ul class="nav child-nav level-2">

                    @if(isMenuRender('SugestionsController@create',$menu_list))
                        <li @if($current_location=='SugestionsController@create') class="active-item" @endif><a href="{{ route('sugestions.create',[]) }}">Add Sugestions</a></li>
                    @endif
                    @if(isMenuRender('SugestionsController@index',$menu_list))
                        <li @if($current_location=='SugestionsController@index') class="active-item" @endif><a href="{{ route('sugestions.index',[]) }}">Sugestions Lists</a></li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- Sugestions end-->

        
    </ul>
</li>
