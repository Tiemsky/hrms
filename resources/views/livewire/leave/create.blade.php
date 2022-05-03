<div>
    <div>
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    </div>
    <div class="content container-fluid">
        <!-- Page Content -->
        <div>

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Leaves </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn " data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->


            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 ">
                            <thead>
                                <tr>

                                    <th>S0#</th>
                                    <th>Leave Type</th>
                                    <th class="text-center">modified_at</th>
                                    <th class="text-center">created_at</th>

                                    <th class="text-center">Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($leaves as $leave)
                                <tr>
                                    <td>{{ ++ $loop->index }} </td>
                                    <td>{{ $leave->name }} </td>

                                    <td class="text-center" >{{ $leave->updated_at->diffForHumans() }} </td>
                                    <td class="text-center"> {{ date('d-m-Y',strtotime($leave->created_at)) }} </td>

                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-{{ $leave->status == 1? 'success' : 'warning'}} "></i> {{ $leave->status == 1? 'Active' : 'Drafted'}}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" type="button" wire:click='changeStatus("{{ $leave->id }}")'>
                                                    <i class="fa fa-dot-circle-o text-{{ !$leave->status == 1? 'success' : 'warning'}}">
                                                    </i> {{ !$leave->status == 1? 'Active' : 'Drafted'}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"
                                                    type="button"
                                                    data-toggle="modal"
                                                    data-target="#edit_leave"
                                                    wire:click.prevent='getInfo("{{ $leave->id }}")'>
                                                    <i class="fa fa-pencil m-r-5"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item"
                                                    type="button"
                                                    data-toggle="modal"
                                                    data-target="#leave_settings"
                                                    wire:click.prevent='getInfo("{{ $leave->id }}")'>
                                                    <i class="fa fa-wrench m-r-5"></i>
                                                    Settings
                                                </a>
                                                <a class="dropdown-item"
                                                    type="button"
                                                    data-toggle="modal"
                                                    data-target="#delete_leave"
                                                    wire:click.prevent="getInfo('{{ $leave->id }}') ">
                                                    <i class="fa fa-trash-o m-r-5"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                               <p class="text-center "> No Data Found!</p>

                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Leave Modal -->
        <div id="add_leave" class="modal custom-modal fade" role="dialog">
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
                                <input type="text"
                                         class="form-control"
                                         wire:model.defer = 'name'>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary" wire:click.prevent='create'>Submit</button>
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
                                <input type="text"
                                         class="form-control"
                                         wire:model.defer = 'name'>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary" wire:click.prevent='update'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Leave Modal -->

        <!-- Approve Leave Modal -->
        <div class="modal custom-modal fade" id="approve_leave" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Leave Approve</h3>
                            <p>Are you sure want to approve for this leave?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Decline</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Approve Leave Modal -->

        <!-- Delete Leave Modal -->

        <!-- /Delete Leave Modal -->

        <div wire:ignore.self id="leave_settings" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Leave Settings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Leave <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control"
                                   wire:model.defer='name' readonly>
                            </div>
                            <div class="form-group">
                                <label>Days <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control"
                                   wire:model.defer='days'>
                                @error('days')
                                   <span class="invalid-feedback"> {{ $message }} </span>
                               @enderror
                            </div>

                            <div class="form-group">
                                <label>Carry forward</label>
                                <div class="leave-inline-form">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="carry_forward" id="carry_forward1" wire:model.defer="carry_forward" value="0" >
                                        <label class="form-check-label" for="inlineRadio1">No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="carry_forward" id="carry_forward2" wire:model.defer="carry_forward" value="1">
                                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                                    </div>
                                </div>
                                @error('carry_forward')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="d-block">Earned leave</label>
                                <div class="leave-inline-form">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" wire:model.defer="earned_leave"  value="0"   >
                                        <label class="form-check-label" for="inlineRadio1">No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" wire:model.defer="earned_leave" value="1">
                                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                                    </div>
                                </div>
                                @error('earned_leave')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>



                            <div class="submit-section">
                                <button class="btn btn-primary" wire:click.prevent='createOrUpdateLeaveSettings'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>







        <div class="modal custom-modal fade" id="delete_leave" role="dialog">
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
                                        wire:click.prevent='delete()'>Delete</a>
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



    </div>
</div>



<script>
    window.addEventListener('leave', event => {
    $('#delete_leave').modal('hide')
    $('#add_leave').modal('hide')
    $('#edit_leave').modal('hide')
    $('#leave_settings').modal('hide')





})
</script>
