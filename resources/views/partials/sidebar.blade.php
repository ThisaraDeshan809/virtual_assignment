<div class="page-sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="active-page">
                <a href="/" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">apps</i>
                    Employees
                    <i class="material-icons has-sub-menu">add</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('Employees.create')}}">Create New</a>
                    </li>
                    <li>
                        <a href="{{route('Employees.index')}}">List Employees</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">apps</i>
                    Tasks
                    <i class="material-icons has-sub-menu">add</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('Tasks.create')}}">Create New</a>
                    </li>
                    <li>
                        <a href="{{route('Tasks.index')}}">List Tasks</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">apps</i>
                    Report
                </a>
            </li>
        </ul>
    </div>
</div>
