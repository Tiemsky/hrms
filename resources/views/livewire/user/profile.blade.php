<div>
    <!-- Page Content -->
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.home') }} ">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#">
                                        <img alt="avatar" 
                                        @if ($user->avatar == '')
                                            @if ($user->gender  == 'male')
                                                src="{{asset('assets/img/default_profil/male.jpg')}} "
                                            @else
                                                src="{{asset('assets/img/default_profil/female.jpg')}} "
                                            @endif
                                        @else
                                            src="{{asset('storage/avatar/'.$user->avatar)}} "
                                        @endif>
                                    </a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $user->first_name }} {{ $user->last_name }} </h3>
                                            <h6 class="text-muted">{{ $user->departement->name }} </h6>
                                            <small class="text-muted">Web Designer</small>
                                            <div class="staff-id">Employee ID : {{ $user->employee_id }} </div>
                                            <div class="small doj text-muted">Date of Join : {{ $user->created_at }} </div>
                                            <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Phone:</div>
                                                <div class="text"><a href="">{{ $user->phone }} </a></div>
                                            </li>
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text"><a href="">{{ $user->email }} </a></div>
                                            </li>
                                            <li>
                                                <div class="title">Birthday:</div>
                                                <div class="text">{{ $user->date_of_birth }} </div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">{{ $user->address }} </div>
                                            </li>
                                            <li>
                                                <div class="title">Gender:</div>
                                                <div class="text">{{ $user->gender }} </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                        <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
                        <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="tab-content">
        
            <!-- Profile Info Tab -->
            <div id="emp_profile" class="pro-overview tab-pane fade show active">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Personal Informations 
                                   
                                </h3>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Passport No.</div>
                                        <div class="text">{{ $user->document_number? $user->document_number : 'N/A' }} </div>
                                    </li>
                                    <li>
                                        <div class="title">Passport Exp Date.</div>
                                        <div class="text">{{ $user->expiration_date?  $user->expiration_date  : 'N/A' }} </div>
                                    </li>

                                    <li>
                                        <div class="title">Nationality</div>
                                        <div class="text">{{ $user->nationality ?  $user->nationality  : 'N/A' }} </div>
                                    </li>
                                    <li>
                                        <div class="title">Religion</div>
                                        <div class="text">{{ $user->religion ?  $user->religion   : 'N/A'}} </div>
                                    </li>
                                    <li>
                                        <div class="title">Marital status</div>
                                        <div class="text">{{ $user->matrial_status ?  $user->matrial_status  : 'N/A'}} </div>
                                    </li>

                                    <li>
                                        <div class="title">No. of children</div>
                                        <div class="text">{{ $user->number_of_children ?  $user->number_of_children   : 'N/A' }} </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Emergency Contact 
                                  
                                </h3>
                                <h5 class="section-title">Primary</h5>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Name</div>
                                        <div class="text">{{ $user->emergencyContact ? $user->emergencyContact->name_one : 'N/A' }} </div>
                                    </li>
                                    <li>
                                        <div class="title">Relationship</div>
                                        <div class="text">{{ $user->emergencyContact ? $user->emergencyContact->relationship_one : 'N/A' }}  </div>
                                    </li>
                                    <li>
                                        <div class="title">Phone </div>
                                        <div class="text">{{ $user->emergencyContact ? $user->emergencyContact->phone_one : 'N/A' }} </div>
                                    </li>
                                </ul>
                                <hr>
                                <h5 class="section-title">Secondary</h5>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Name</div>
                                        <div class="text">{{ $user->emergencyContact ? $user->emergencyContact->name_two : 'N/A' }}  </div>
                                    </li>
                                    <li>
                                        <div class="title">Relationship</div>
                                        <div class="text">{{ $user->emergencyContact ? $user->emergencyContact->relationship_two : 'N/A' }}  </div>
            
                                    </li>
                                    <li>
                                        <div class="title">Phone </div>
                                        <div class="text">{{ $user->emergencyContact ? $user->emergencyContact->phone_two : 'N/A' }} </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Education Informations 
                                 

                                    
                                </h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                    @foreach ($user->educations as $education)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                                                                                      
                                                <div class="timeline-content">
                                                    <a href="" class="name">{{ $education->university }} </a>
                                                    <div>{{ $education->country }} - {{ $education->state }} - {{ $education->city }}</div>
                                                    <div>{{ $education->course }} </div>
                                                    <span class="time">{{ $education->yearIn }}  -  {{ $education->yearOut }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
           
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">
                                    Experience 
                             
                                </h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                    @foreach ($user->experiences as $experience)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                
                                              
                                                <div class="timeline-content">
                                                    <a href="" class="name">{{ $experience->title }} </a>
                                                    <div>{{ $experience->company }}</div>
                                                    
                                                    <span class="time">{{ $experience->currentPosition == 1 ? 'Since '. $experience->from_period : $experience->from_period .' - '. $experience->to_period }}</span>

                                                    <div>{{ $experience->country }}</div>
                                                    <div>{{ $experience->jobDescription }} </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
           
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Bank information</h3>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Bank name</div>
                                        <div class="text">ICICI Bank</div>
                                    </li>
                                    <li>
                                        <div class="title">Bank account No.</div>
                                        <div class="text">159843014641</div>
                                    </li>
                                    <li>
                                        <div class="title">IFSC Code</div>
                                        <div class="text">ICI24504</div>
                                    </li>
                                    <li>
                                        <div class="title">PAN No</div>
                                        <div class="text">TC000Y56</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  
                    
                </div>

            </div>
            <!-- /Profile Info Tab -->
            
            <!-- Projects Tab -->
            <div class="tab-pane fade" id="emp_projects">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown profile-action">
                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                <small class="block text-ellipsis m-b-15">
                                    <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                    <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                </small>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. When an unknown printer took a galley of type and
                                    scrambled it...
                                </p>
                                <div class="pro-deadline m-b-15">
                                    <div class="sub-title">
                                        Deadline:
                                    </div>
                                    <div class="text-muted">
                                        17 Apr 2019
                                    </div>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Project Leader :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Team :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="all-users">+15</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                <div class="progress progress-xs mb-0">
                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown profile-action">
                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                <small class="block text-ellipsis m-b-15">
                                    <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                    <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                </small>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. When an unknown printer took a galley of type and
                                    scrambled it...
                                </p>
                                <div class="pro-deadline m-b-15">
                                    <div class="sub-title">
                                        Deadline:
                                    </div>
                                    <div class="text-muted">
                                        17 Apr 2019
                                    </div>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Project Leader :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Team :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="all-users">+15</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                <div class="progress progress-xs mb-0">
                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown profile-action">
                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                <small class="block text-ellipsis m-b-15">
                                    <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                    <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                </small>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. When an unknown printer took a galley of type and
                                    scrambled it...
                                </p>
                                <div class="pro-deadline m-b-15">
                                    <div class="sub-title">
                                        Deadline:
                                    </div>
                                    <div class="text-muted">
                                        17 Apr 2019
                                    </div>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Project Leader :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Team :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="all-users">+15</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                <div class="progress progress-xs mb-0">
                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown profile-action">
                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                <small class="block text-ellipsis m-b-15">
                                    <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                    <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                </small>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. When an unknown printer took a galley of type and
                                    scrambled it...
                                </p>
                                <div class="pro-deadline m-b-15">
                                    <div class="sub-title">
                                        Deadline:
                                    </div>
                                    <div class="text-muted">
                                        17 Apr 2019
                                    </div>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Project Leader :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-members m-b-15">
                                    <div>Team :</div>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="all-users">+15</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                <div class="progress progress-xs mb-0">
                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Projects Tab -->
            
            <!-- Bank Statutory Tab -->
            <div class="tab-pane fade" id="bank_statutory">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> Basic Salary Information</h3>
                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option>Select salary basis type</option>
                                            <option>Hourly</option>
                                            <option>Daily</option>
                                            <option>Weekly</option>
                                            <option>Monthly</option>
                                        </select>
                                   </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Payment type</label>
                                        <select class="select">
                                            <option>Select payment type</option>
                                            <option>Bank transfer</option>
                                            <option>Check</option>
                                            <option>Cash</option>
                                        </select>
                                   </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="card-title"> PF Information</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">PF contribution</label>
                                        <select class="select">
                                            <option>Select PF contribution</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option>Select PF contribution</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee PF rate</label>
                                        <select class="select">
                                            <option>Select PF contribution</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option>Select additional rate</option>
                                            <option>0%</option>
                                            <option>1%</option>
                                            <option>2%</option>
                                            <option>3%</option>
                                            <option>4%</option>
                                            <option>5%</option>
                                            <option>6%</option>
                                            <option>7%</option>
                                            <option>8%</option>
                                            <option>9%</option>
                                            <option>10%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Total rate</label>
                                        <input type="text" class="form-control" placeholder="N/A" value="11%">
                                    </div>
                                </div>
                           </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee PF rate</label>
                                        <select class="select">
                                            <option>Select PF contribution</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option>Select additional rate</option>
                                            <option>0%</option>
                                            <option>1%</option>
                                            <option>2%</option>
                                            <option>3%</option>
                                            <option>4%</option>
                                            <option>5%</option>
                                            <option>6%</option>
                                            <option>7%</option>
                                            <option>8%</option>
                                            <option>9%</option>
                                            <option>10%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Total rate</label>
                                        <input type="text" class="form-control" placeholder="N/A" value="11%">
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <h3 class="card-title"> ESI Information</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">ESI contribution</label>
                                        <select class="select">
                                            <option>Select ESI contribution</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option>Select ESI contribution</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee ESI rate</label>
                                        <select class="select">
                                            <option>Select ESI contribution</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option>Select additional rate</option>
                                            <option>0%</option>
                                            <option>1%</option>
                                            <option>2%</option>
                                            <option>3%</option>
                                            <option>4%</option>
                                            <option>5%</option>
                                            <option>6%</option>
                                            <option>7%</option>
                                            <option>8%</option>
                                            <option>9%</option>
                                            <option>10%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Total rate</label>
                                        <input type="text" class="form-control" placeholder="N/A" value="11%">
                                    </div>
                                </div>
                           </div>
                            
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Bank Statutory Tab -->
            
        </div>
    </div>
    <!-- /Page Content -->
    
</div>



