<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">

                    <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->segment(1)=='home' ? 'active' : ''}} " href="{{route('user.home')}} ">Admin Dashboard</a></li>
                        <li><a href="{{route('user.home')}} ">Employee Dashboard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="chat.html">Chat</a></li>
                        <li class="submenu">
                            <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="outgoing-call.html">Outgoing Call</a></li>
                                <li><a href="incoming-call.html">Incoming Call</a></li>
                            </ul>
                        </li>
                        <li><a href="events.html">Calendar</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="inbox.html">Email</a></li>
                        <li><a href="file-manager.html">File Manager</a></li>
                    </ul>
                </li>

                <li class="menu-title">
                    <span>Employees</span>
                </li>




                <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a  href="{{ route('user.index') }} ">All Employees</a></li>
                        <li><a href="attendance.html">Attendance (Admin)</a></li>
                        <li><a href="attendance-employee.html">Attendance (Employee)</a></li>
                        <li><a href="designations.html">Designations</a></li>
                        <li><a href="timesheet.html">Timesheet</a></li>
                        <li><a href="shift-scheduling.html">Shift & Schedule</a></li>
                        <li><a href="overtime.html">Overtime</a></li>
                    </ul>
                </li>

                <li><a class="{{ request()->segment(1)=='holidays' ? 'active' : ''}} "  href="{{ route('holiday.index') }} "> <i class="la la-user-secret"></i> <span>Holidays</span></a></li>

                <li><a  class="{{ request()->segment(1)=='departments' ? 'active' : ''}} " href="{{ route('department.index')}}"> <i class="la la-user-secret"></i> <span>Departments</span></a></li>


                <li class="menu-title">
                    <span>Leaves</span>
                </li>


                <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Leaves</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->path()=='leaves' ? 'active' : ''}}" href="{{ route('leave.index') }} ">Requested Leave</a></li>
                        <li><a class="{{ request()->path()=='leave/create' ? 'active' : ''}}" href="{{ route('leave.create') }} ">Manage Leaves</a></li>
                        <li><a class="{{ request()->path()=='leave/send-request' ? 'active' : ''}}"  href="{{ route('leave.send-request') }} ">Request For Leave </a></li>
                        <li><a class="{{ request()->path()=='leaves/settings' ? 'active' : ''}} " href="{{ route('leave.settings') }} ">Leave Settings</a></li>
                        {{-- <li><a href="{{ route('leave.show-request,[test, gem]') }} ">Show All Requests</a></li> --}}


                    </ul>
                </li>




                <li>
                    <a href="leads.html"> <span>Leads</span></a>
                </li>


                <li>
                    <a href="clients.html"><i class="la la-users"></i> <span>Clients</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="tasks.html">Tasks</a></li>
                        <li><a href="task-board.html">Task Board</a></li>
                    </ul>
                </li>
                <li>
                    <a href="leads.html"><i class="la la-user-secret"></i> <span>Leads</span></a>
                </li>

                <li class="menu-title">
                    <span>HR</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-files-o"></i> <span> Sales </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="estimates.html">Estimates</a></li>
                        <li><a href="invoices.html">Invoices</a></li>
                        <li><a href="payments.html">Payments</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="provident-fund.html">Provident Fund</a></li>
                        <li><a href="taxes.html">Taxes</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-files-o"></i> <span> Accounting </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="categories.html">Categories</a></li>
                        <li><a href="budgets.html">Budgets</a></li>
                        <li><a href="budget-expenses.html">Budget Expenses</a></li>
                        <li><a href="budget-revenues.html">Budget Revenues</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="salary.html"> Employee Salary </a></li>
                        <li><a href="salary-view.html"> Payslip </a></li>
                        <li><a href="payroll-items.html"> Payroll Items </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                        <li><a href="payments-reports.html"> Payments Report </a></li>
                        <li><a href="project-reports.html"> Project Report </a></li>
                        <li><a href="task-reports.html"> Task Report </a></li>
                        <li><a href="user-reports.html"> User Report </a></li>
                        <li><a href="employee-reports.html"> Employee Report </a></li>
                        <li><a href="payslip-reports.html"> Payslip Report </a></li>
                        <li><a href="attendance-reports.html"> Attendance Report </a></li>
                        <li><a href="leave-reports.html"> Leave Report </a></li>
                        <li><a href="daily-reports.html"> Daily Report </a></li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('training.index') }} "> Training List </a></li>
                        <li><a href="{{ route('trainers') }} "> Trainers</a></li>
                        <li><a href="{{ route('training-type') }} "> Training Type </a></li>
                    </ul>
                </li>
                <li><a href="{{ route('promotion.index') }} "><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
                <li><a href="{{ route('resignation.index') }} "><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>

                <li class="menu-title">
                    <span>Administration</span>
                </li>
                <li>
                    <a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="user-dashboard.html"> User Dasboard </a></li>
                        <li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
                        <li><a href="jobs.html"> Manage Jobs </a></li>
                        <li><a href="manage-resumes.html"> Manage Resumes </a></li>
                        <li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
                        <li><a href="interview-questions.html"> Interview Questions </a></li>
                        <li><a href="offer_approvals.html"> Offer Approvals </a></li>
                        <li><a href="experiance-level.html"> Experience Level </a></li>
                        <li><a href="candidates.html"> Candidates List </a></li>
                        <li><a href="schedule-timing.html"> Schedule timing </a></li>
                        <li><a href="apptitude-result.html"> Aptitude Results </a></li>
                    </ul>
                </li>

                <li>
                    <a href="users.html"><i class="la la-user-plus"></i> <span>Users</span></a>
                </li>
                <li>
                    <a href="{{ route('settings') }} "><i class="la la-cog"></i> <span>Settings</span></a>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.my-profile') }}"> My Profil </a></li>
                        <li><a href="client-profile.html"> Client Profile </a></li>
                    </ul>
                </li>










            </ul>
        </div>
    </div>
</div>
