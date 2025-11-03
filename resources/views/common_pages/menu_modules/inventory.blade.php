<li class=" has-child-item{{ check_menu_active($current_location,config('myconfig.menu.inventory')) }}">
    <a><i class="fa fa-users" aria-hidden="true"></i><span>Employees Module</span></a>
     <ul class="nav child-nav level-1">
     <!-- Employee Managements start-->
        @if(isMenuRender(['EmployeesController@create','EmployeesController@index'],$menu_list))
            <li class="has-child-item{{ check_menu_active($current_location,['EmployeesController']) }}">
                <a><span>Employee Setup</span></a>
                 <ul class="nav child-nav level-2">

                    @if(isMenuRender('EmployeesController@create',$menu_list))
                        <li @if($current_location=='EmployeesController@create') class="active-item" @endif><a href="{{ route('employees.create',[]) }}">Add Employee</a></li>
                    @endif
                    @if(isMenuRender('EmployeesController@index',$menu_list))
                        <li @if($current_location=='EmployeesController@index') class="active-item" @endif><a href="{{ route('employees.index',[]) }}">Employee Lists</a></li>
                    @endif
                    @if(isMenuRender('EmployeesController@uploadEmployee',$menu_list))
                        <li @if($current_location=='EmployeesController@uploadEmployee') class="active-item" @endif><a href="{{ route('employees.uploads',[]) }}">Employee Uploads</a></li>
                    @endif
                    
                </ul>
            </li>
        @endif
        <!-- Employee Managements end-->

        

    </ul>
</li>
