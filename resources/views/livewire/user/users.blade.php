<div class="content container-fluid">
  
    		<!-- Page Content -->
            <div class="">
				
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Employee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employee</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                            <div class="view-icons">
                                <a href="{{ route('user.index') }} " class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                <a href="{{ route('user.users-list') }} " class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3"> 
                        <div class="form-group form-focus select-focus">
                            <select class="select floating"> 
                                <option>Select Designation</option>
                                <option>Web Developer</option>
                                <option>Web Designer</option>
                                <option>Android Developer</option>
                                <option>Ios Developer</option>
                            </select>
                            <label class="focus-label">Designation</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <a href="#" class="btn btn-success btn-block"> Search </a>  
                    </div>
                </div>
                <!-- Search Filter -->
                
                <div class="row staff-grid-row">
                  @foreach ($users as $user)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="{{ route('user.profile', [$user->slug]) }}" 
                                    class="avatar">

                                    <img class="" alt="avatar" 
                                  
                                    @if ($user->avatar == '')
                                        @if ($user->gender  == 'male')
                                            src="{{asset('assets/img/default_profil/male.jpg')}} "
                                        @else
                                            src="{{asset('assets/img/default_profil/female.jpg')}} "
                                        @endif
                                    @else
                                        src="{{asset('storage/avatar/'.$user->avatar)}} "
                                    @endif>
                                    {{-- <img src="assets/img/profiles/avatar-02.jpg" alt=""> --}}
                                </a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" 
                                            data-toggle="dropdown" 
                                            aria-expanded="false">
                                    <i class="material-icons">
                                        more_vert
                                    </i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" 
                                    data-toggle="modal" 
                                    data-target="#delete_employee"
                                    wire:click.prevent="getUserId('{{ $user->id }} ')">
                                    <i class="fa fa-lock m-r-5"></i> 
                                    Block
                                </a>
                                
                                    <a class="dropdown-item" href="#" 
                                        data-toggle="modal" 
                                        data-target="#delete_employee"
                                        wire:click.prevent="getUserId('{{ $user->id }} ')">
                                        <i class="fa fa-trash-o m-r-5"></i> 
                                        Delete
                                    </a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                                <a href="{{ route('user.profile', [$user->slug]) }} ">
                                    {{ $user->last_name }} {{ $user->first_name }}
                                </a>
                            </h4>
                            <div class="small text-muted">Web Designer</div>
                        </div>
                    </div>
                  @endforeach
               
              
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Add Employee Modal -->
            <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email">
                                        </div>
                                    </div>
                            


                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
       
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select Department</option>
                                                <option>Web Development</option>
                                                <option>IT Management</option>
                                                <option>Marketing</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                </div>
                              
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Employee Modal -->
            
 
            
            <!-- Delete Employee Modal -->
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Employee</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" 
                                            class="btn btn-primary continue-btn"
                                            wire:click.prevent='delete'>
                                            Delete
                                        </a>
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
            <!-- /Delete Employee Modal -->

            
</div>
<script>
        window.addEventListener('deletedSucessfully', event => {
        $('#delete_employee').modal('hide')
    })

</script>