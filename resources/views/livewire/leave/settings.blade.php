<div>
    <!-- Page Wrapper -->
<div class="content container-fluid">

    <!-- Page Content -->
    <div>

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12 ">
                    <h3 class="page-title">Leave Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leave Settings</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <!-- Leaves -->
             @forelse ($leaves as $leave)
                    <!-- Custom Create Leave -->
                <div class="card leave-box mb-0" id="leave_custom01">
                    <div class="card-body">
                        <div class="h3 card-title with-switch">
                            {{ Str::upper($leave->name) }}
                            <div class="">
                                <h5><strong>Leave Status</strong>: <span class="text-{{ $leave->status == 1 ? 'success':'warning' }}">{{ $leave->status == 1 ? 'Available':'Inactive' }} </span> </h5>
                                {{-- <button class="btn btn-success leave-delete-btn" type="button">Status:</button>
                                <button class="btn btn-danger leave-delete-btn" type="button">Delete</button> --}}
                            </div>
                        </div>
                        @if (isset($leave->setting))
                            <div class="leave-item">
                                <!-- Annual Days Leave -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Days: <strong>{{ $leave->setting->days }}</strong> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- Earned Leave -->
                                    <div class="leave-row">
                                        <div class="leave-left">
                                            <div class="input-box">
                                                <label class="d-block">Carry forward: <strong> {{$leave->setting->carry_forward == 1 ? 'Yes' : 'No'  }} </strong></label>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Earned Leave -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <label class="d-block">Earned leave: <strong> {{$leave->setting->earned_leave == 1 ? 'Yes' : 'No'  }} </strong></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Earned Leave -->
                            </div>
                            @else
                            <i>This Leave Has Not Yet Set Up By The Admin!</i>
                        @endif

                    </div>
                </div>
                <!-- /Custom Create Leave -->
             @empty

             @endforelse


            </div>
        </div>

    </div>
    <!-- /Page Content -->
    <!-- /Delete Custom Policy Modal -->

</div>
</div>
