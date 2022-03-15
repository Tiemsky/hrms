<div>
    <div class="content container-fluid">
        <!-- Page Content -->
        <div>
    
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">My Leaves</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">My Leaves</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn " data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Make a request</a>
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
                        <table class="table table-striped custom-table mb-0 ">
                            <thead>
                                <tr>
                                    
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Show detail</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($myLeaves as $myLeave)
                                <tr>

                                    <td>{{ $myLeave->leave->name }}</td>
                                    <td>{{ $myLeave->leave_from }} </td>
                                    <td>{{ $myLeave->leave_to }} </td>
                                    <td>{{ $myLeave->number_of_day }} </td>
                                    <td>{{ $myLeave->leave_reason }} </td>
                                    <td class="text-center">
                                        status
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('leave.show-request',[Auth::user()->slug, $myLeave->leave->slug]) }} ">Show More</a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
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
        
        <!-- Add Leave Modal -->
        <div wire:ignore.self id="add_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Leave</h5>
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="form-control" wire:model='leave_id' >
                                    <option value="">Select Leave Type</option>
                                    @foreach ($leaves as $leave)
                                        <option value="{{ $leave->id }} " >{{ $leave->name }} </option>
                                    @endforeach
                                   
                                </select>
                                @error('leave_id')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <div class="">
                                    <input class="form-control " 
                                            type="date"
                                            wire:model='leave_from'>
                                </div>
                                @error('leave_from')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <div class="">
                                    <input class="form-control " 
                                            type="date"
                                            wire:model='leave_to'>
                                </div>
                                @error('leave_to')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" 
                                        readonly type="text"
                                        wire:model.defer='number_of_day'>
                            </div>
                            <div class="form-group">
                                <label>Max day can be requested <span class="text-danger">*</span></label>
                                <input class="form-control" 
                                        readonly
                                        type="text"
                                        wire:model='leave_max_day'>
                            </div>
                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="4" 
                                            class="form-control"
                                            wire:model.defer='leave_reason'>
                                </textarea>
                                @error('leave_reason')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary" wire:click.prevent='submitLeave'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Leave Modal -->
        
        <!-- Edit Leave Modal -->
        <div id="edit_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Leave</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select Leave Type</option>
                                    <option>Casual Leave 12 Days</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" readonly type="text" value="2">
                            </div>
                            <div class="form-group">
                                <label>Remaining Leaves <span class="text-danger">*</span></label>
                                <input class="form-control" readonly value="12" type="text">
                            </div>
                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control">Going to hospital</textarea>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Leave Modal -->
    
    
        
        <!-- Delete Leave Modal -->
        <div class="modal custom-modal fade" id="delete_approve" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Leave</h3>
                            <p>Are you sure want to delete this leave?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a type="button" 
                                        class="btn btn-primary continue-btn"
                                        wire:click.prevent='submitLeave'>Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Leave Modal -->
    </div>
</div>

<script>
    window.addEventListener('leave_requested', event => {
    $('#add_leave').modal('hide')
})
</script>


<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@section('DateScript')
<script>
    // var picker = new Pikaday({
    //     field: document.getElementById('date'),
    //     format: 'D MMM YYYY',
    //     onSelect: function() {
    //         console.log(this.getMoment().format('Do MMMM YYYY'));
    //     }
        
    // });


    var picker = [];
    $('.date').each(function(idx) {
        picker[idx] = new Pikaday({ field: $(this)[0] });
    });
</script>
@endsection