<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Manage Student</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('students.registration.add')}}">
                    <i class="bi bi-circle"></i><span>Student Admission</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('students.shift.class.year.wise')}}">
                    <i class="bi bi-circle"></i><span>Shift Student</Details></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('students.roll.view')}}">
                    <i class="bi bi-circle"></i><span>Roll Generate</Details></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('students.registration.view')}}">
                    <i class="bi bi-circle"></i><span>Student Details</Details></span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Forms Nav -->
        <li class="nav-heading">Setup Managment</li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('setups.class.view')}}">
                <i class="bi bi-plus-circle"></i>
                <span>Classes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('setups.year.view')}}">
                <i class="bi bi-plus-circle"></i>
                <span>Year</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('setups.fee.catagory.view')}}">
                <i class="bi bi-plus-circle"></i>
                <span>Fee Catagory</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('setups.fee.ammount.view')}}">
                <i class="bi bi-plus-circle"></i>
                <span>Fee Ammount</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('setups.subject.view')}}">
                <i class="bi bi-plus-circle"></i>
                <span>Subjects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('setups.assign.subject.view')}}">
                <i class="bi bi-plus-circle"></i>
                <span>Assign Subject</span>
                </a>
            </li>
        @if(Auth::user()->usertype=='Admin')
        <li class="nav-heading">User Managment</li>
            <li class="nav-item">
                <a class="nav-link {{route('admin.users.view')?'active':'collapsed'}}" href="{{route('admin.users.view')}}">
                    <i class="bi bi-person"></i>
                    <span>Users</span>
                </a>
            </li>
        @endif
    </ul>

</aside>