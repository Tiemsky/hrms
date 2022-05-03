<div class="content container-fluid">
    <!-- Page Content -->
    <div>

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leaves</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leaves</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->

        <!-- Leave Statistics -->
        <div class="row">
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Today Presents</h6>
                    <h4>12 / 60</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Planned Leaves</h6>
                    <h4>8 <span>Today</span></h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Unplanned Leaves</h6>
                    <h4>0 <span>Today</span></h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Pending Requests</h6>
                    <h4>12</h4>
                </div>
            </div>
        </div>
        <!-- /Leave Statistics -->

        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating">
                        <option> -- Select -- </option>
                        <option>Casual Leave</option>
                        <option>Medical Leave</option>
                        <option>Loss of Pay</option>
                    </select>
                    <label class="focus-label">Leave Type</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating">
                        <option> -- Select -- </option>
                        <option> Pending </option>
                        <option> Approved </option>
                        <option> Rejected </option>
                    </select>
                    <label class="focus-label">Leave Status</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div>
        <!-- /Search Filter -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>No of Days</th>
                                <th>Reason</th>
                                <th class="text-center">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($requestedLeaves as $requestedLeave)

                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a  class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                        <a href="{{ route('user.profile', [$requestedLeave->user->slug]) }} ">{{$requestedLeave->user->last_name}}  <span>{{$requestedLeave->user->department->name}}</span></a>
                                    </h2>
                                </td>
                                <td>{{$requestedLeave->leave->name}} </td>
                                <td>{{$requestedLeave->leave_from}} </td>
                                <td>{{$requestedLeave->leave_to}}  </td>
                                <td>{{$requestedLeave->number_of_day}} </td>
                                <td>{{$requestedLeave->leave_reason}}  </td>
                                <td class="text-center">
                                    @if ($requestedLeave->status == 1)
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o {{ $requestedLeave->status == 0 ? 'text-danger' : ($requestedLeave->status == 1 ? 'text-warning' : 'text-success' )  }}"></i>
                                             {{ ($requestedLeave->status == 0 )? 'Declined' : ($requestedLeave->status == 1 ? 'Pending' : 'Approved') }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @foreach ($requestStatus as $state)
                                                @if ($requestedLeave->status != $state['number'])

                                                    <a class="dropdown-item" type="button" wire:click.prevent="updateRequestStatus({{ $requestedLeave->id }}, {{ $state['number'] }} )">
                                                        <i class="fa fa-dot-circle-o {{ $state['number'] == 0 ? 'text-danger' : ($state['number'] == 1 ? 'text-warning' : 'text-success' )  }}"></i>
                                                        {{ $state['status']}}
                                                    </a>
                                                @endif
                                            @endforeach
                                            {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a> --}}
                                        </div>
                                    </div>
                                    @else
                                    <p class="text-center text-{{$requestedLeave->status == 0 ? 'danger' : ($requestedLeave->status == 1 ? 'warning' : 'success') }}">
                                        {{ $requestedLeave->status == 0 ? 'Declined' : ($requestedLeave->status == 1 ? 'Pending' : 'Approved!') }}
                                    </p>
                                    @endif

                                </td>
                            </tr>
                          @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->


</div>
