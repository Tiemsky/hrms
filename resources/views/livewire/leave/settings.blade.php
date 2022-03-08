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
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn " data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                    </div>

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
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_custom01" wire:click='test'>
                                <label class="onoffswitch-label" for="switch_custom01">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                            <button class="btn btn-danger leave-delete-btn" type="button">Delete</button>

                        </div>
                        <div class="leave-item">
                         
                            
                            <!-- Annual Days Leave -->
                            <div class="leave-row">
                                <div class="leave-left">
                                    <div class="input-box">
                                        <div class="form-group">
                                            <label>Days</label>
                                            <input type="text" 
                                                    class="form-control"
                                                    wire:model.defer='days'>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <!-- /Annual Days Leave -->
                            
                        
                            <!-- /Carry Forward -->

                                  <!-- Earned Leave -->
                                  <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <label class="d-block">Carry forward</label>
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
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            <!-- Earned Leave -->
                            <div class="leave-row">
                                <div class="leave-left">
                                    <div class="input-box">
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
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /Earned Leave -->
                            
                        </div>
                        
                        <!-- Custom Policy -->
                        <div class="custom-policy">
                            <div class="leave-header">
                                <div class="title">Custom policy</div>
                                <div class="leave">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#add_custom_policy"><i class="fa fa-plus"></i> Add custom policy</button>
                                </div>
                            </div>
                          
                        </div>

                        <div class="leave-row" >
                            <input class="btn btn-success" type="button" value="save" wire:click.prevent="save('{{ $leave->id}}') ">
                        </div>
                        <!-- /Custom Policy -->
                        
                    </div>
                </div>
                <!-- /Custom Create Leave -->
             @empty
                 
             @endforelse
             
                
            </div>
        </div>
            
    </div>
    <!-- /Page Content -->

    <div id="add_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customized Leave Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card leave-box mb-0" id="leave_custom01">
                        <div class="card-body">
                      
                            <div class="leave-item">

                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Leave Type</label>
                                                <select name="" id="" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                                <!-- Annual Days Leave -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Days</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /Annual Days Leave -->
                                
                                <!-- Carry Forward -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <label class="d-block">Carry forward</label>
                                            <div class="leave-inline-form">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="carryForward" id="carry_no_01" value="option1" >
                                                    <label class="form-check-label" for="carry_no_01">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="carryForward" id="carry_yes_01" value="option2" >
                                                    <label class="form-check-label" for="carry_yes_01">Yes</label>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                                <!-- /Carry Forward -->
                                
                                <!-- Earned Leave -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <label class="d-block">Earned leave</label>
                                            <div class="leave-inline-form">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" >
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" >
                                                    <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                                <!-- /Earned Leave -->
                                
                            </div>
                            
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Custom Policy Modal -->
    <div id="add_custom_policy" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Custom Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Policy Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Days <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                      

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Custom Policy Modal -->
    
    <!-- Edit Custom Policy Modal -->
    <div id="edit_custom_policy" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Custom Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Policy Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="LOP">
                        </div>
                        <div class="form-group">
                            <label>Days <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="4">
                        </div>
                        <div class="form-group leave-duallist">
                            <label>Add employee</label>
                            
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Custom Policy Modal -->
    
    <!-- Delete Custom Policy Modal -->
    <div class="modal custom-modal fade" id="delete_custom_policy" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Custom Policy</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
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
    <!-- /Delete Custom Policy Modal -->
    
</div>