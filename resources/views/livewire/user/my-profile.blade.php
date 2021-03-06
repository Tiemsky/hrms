<div class="content container-fluid">
    <!-- Page Content -->
    <div>

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
                                            <h6 class="text-muted">{{ $user->department->name }} </h6>
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
                            <div class="pro-edit">
                                <a data-target="#profile_info"
                                    data-toggle="modal"
                                    class="edit-icon"
                                    type="button" wire:click.prevent='editUserInfo'>
                                    <i class="fa fa-pencil">
                                    </i>
                                </a>
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
                                    <a href="#" class="edit-icon"
                                                data-toggle="modal"
                                                data-target="#personal_info_modal"
                                                wire:click.prevent=editPersonalInfo()>
                                        <i class="fa fa-pencil"></i>
                                    </a>
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
                                        <div class="text">{{ $user->marital_status ?  $user->marital_status  : 'N/A'}} </div>
                                    </li>

                                    <li>
                                        <div class="title">No. of children</div>
                                        <div class="text">{{ isset($user->number_of_children) ?  $user->number_of_children   : 'N/A' }} </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Emergency Contact
                                    <a type="button" class="edit-icon"
                                                data-toggle="modal"
                                                data-target="#emergency_contact_modal"
                                                wire:click.prevent='editEmergencyContact'
                                        ><i class="fa fa-pencil"></i>
                                    </a>
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
                                    <a href="#" class="edit-icon"
                                                data-toggle="modal"
                                                data-target="#create_education_info">
                                                <i class="fa fa-plus-circle"></i>
                                    </a>


                                </h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                    @foreach ($user->educations as $education)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <a type="button"
                                                class="delete-icon"
                                                data-toggle="modal"
                                                data-target="#delete"
                                                wire:click.prevent="getElementId('education', {{ $education->id }}) ">

                                                <i class="fa fa-trash-o"></i>
                                                </a>

                                                <a type="button" class="edit-icon"
                                                    data-toggle="modal"
                                                    data-target="#edit_education_info"
                                                    wire:click.prevent="editEducationExperience('education', {{ $education->id }}) ">
                                                    <i class="fa fa-pencil"></i>
                                                </a>


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
                                    <a href="#"
                                        class="edit-icon"
                                        data-toggle="modal"
                                        data-target="#create_experience_info"
                                        >
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                </h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                    @foreach ($user->experiences as $experience)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <a type="button"
                                                class="delete-icon"
                                                data-toggle="modal"
                                                data-target="#delete"
                                                wire:click.prevent="getElementId('experience', {{ $experience->id }}) ">

                                                <i class="fa fa-trash-o"></i>
                                                </a>

                                                <a type="button" class="edit-icon"
                                                    data-toggle="modal"
                                                    data-target="#edit_experience_info"
                                                    wire:click.prevent="editEducationExperience('experience', {{ $experience->id }}) ">
                                                    <i class="fa fa-pencil"></i>
                                                </a>


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

    <!-- Profile Modal -->
    <div wire:ignore.self id="profile_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div   class="modal-body">
                    <form >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap edit-img">
                                    @if ($avatar)
                                        <img src="{{ $avatar->temporaryUrl() }}">
                                    @endif
                                    <img class="inline-block" alt="avatar"

                                    @if ($user->avatar == '')
                                        @if ($user->gender  == 'male')
                                            src="{{asset('assets/img/default_profil/male.jpg')}} "
                                        @else
                                            src="{{asset('assets/img/default_profil/female.jpg')}} "
                                        @endif
                                    @else
                                        src="{{asset('storage/avatar/'.$user->avatar)}} "
                                    @endif>

                                    <div class="fileupload btn">
                                        <span class="btn-text">edit</span>
                                        <input class="upload"
                                                type="file"

                                                wire:model.defer='avatar'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text"
                                                    class="form-control"
                                                    wire:model.defer=first_name>
                                        </div>

                                        @error('first_name')
										    <span class="invalid-feedback"> {{$message}}  </span>
									    @enderror

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text"
                                                    class="form-control"
                                                    wire:model.defer='last_name'>
                                        </div>
                                        @error('last_name')
										    <span class="invalid-feedback"> {{$message}}  </span>
									    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control date"
                                                        id="date"
                                                        type="text"
                                                        placeholder="01 Jan 2010"
                                                        wire:model.lazy='date_of_birth'
                                                        >
                                            </div>
                                            @error('date_of_birth')
										        <span class="invalid-feedback"> {{$message}}  </span>
									        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="select form-control" wire:model.defer='gender'>
                                                <option value="male {{ $user->gender == 'male' ? 'selected' :'' }} ">Male</option>
                                                <option value="female" {{ $user->gender == 'female' ? 'selected' :'' }} >Female</option>
                                            </select>
                                        </div>
                                        @error('gender')
                                            <span class="invalid-feedback"> {{$message}}  </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text"
                                            class="form-control"
                                            wire:model.defer='address'>
                                </div>
                                @error('address')
                                    <span class="invalid-feedback"> {{$message}}  </span>
                                @enderror
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text"
                                            class="form-control"
                                            wire:model.defer='phone'>
                                </div>
                                @error('phone')
                                    <span class="invalid-feedback"> {{$message}}  </span>
                                @enderror
                            </div>


                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent='userUpdate'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Profile Modal -->

    <!-- Personal Info Modal -->
    <div wire:ignore.self  id="personal_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport No | Any other valide ID Card</label>
                                    <input type="text"
                                            class="form-control"
                                            placeholder="20AC5447657"
                                            wire:model.defer='document_number'>
                                        @error('document_number')
                                            <span class="invalid-feedback"> {{$message}}  </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport Expiry Date</label>

                                        <div class="cal-icon">
                                            <input class="form-control"
                                                    type="date"
                                                    placeholder="01 Jan 2010"
                                                    wire:model.defer='expiration_date'
                                                    >
                                        </div>
                                        @error('expiration_date')
                                            <span class="invalid-feedback"> {{$message}}  </span>
                                        @enderror

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nationality <span class="text-danger">*</span></label>
                                    <input class="form-control"
                                            type="text"
                                            placeholder="Ivorian"
                                            wire:model.defer='nationality'>
                                        @error('nationality')
                                            <span class="invalid-feedback"> {{$message}}  </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Religion</label>
                                    <select class="form-control" wire:model.defer='religion'>
                                        <option>-</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Atheist">Atheist</option>

                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Buddhism">Buddhism</option>


                                        <option value="Hinduism">Hinduism</option>

                                        <option value="Chinese traditional religion">Chinese traditional religion</option>

                                        <option value="African traditional religions">African traditional religions</option>
                                        <option value="Sikhism">Sikhism</option>
                                        <option value="Spiritism">Spiritism</option>

                                        <option value="Judaism">Judaism</option>
                                        <option value="Jainism">Jainism</option>
                                        <option value="Tenrikyo">Tenrikyo</option>

                                        <option value="Animism">Animism</option>
                                        <option value="Neo-Paganism">Neo-Paganism</option>
                                        <option value="Rastafari">Rastafari</option>
                                    </select>
                                    @error('religion')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Marital status <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model.defer='marital_status'>
                                        <option>-</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>

                                    @error('matrial_status')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. of children </label>
                                    <input class="form-control"
                                            type="text"
                                            placeholder="0"
                                            wire:model.defer='number_of_children'>
                                            @error('number_of_children')
                                                <span class="invalid-feedback"> {{$message}}  </span>
                                            @enderror
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent='updatePersonalInfo'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Personal Info Modal -->

    <!-- Family Info Modal -->
    <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Family Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of birth <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of birth <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
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
    <!-- /Family Info Modal -->

    <!-- Emergency Contact Modal -->
    <div wire:ignore.self id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Primary Contact</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                    class="form-control"
                                                    wire:model.defer='name_one'>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                    type="text"
                                                    wire:model.defer='relationship_one'>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                    type="text"
                                                    wire:model.defer='phone_one'>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Primary Contact</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                    class="form-control"
                                                    wire:model.defer='name_two'>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                    type="text"
                                                    wire:model.defer='relationship_two'>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                    type="text"
                                                    wire:model.defer='phone_two'>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent='emergencyContact'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Emergency Contact Modal -->

    <!-- Education Modal -->
    <div wire:ignore.self id="create_education_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Education Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Oxford University"
                                                        class="form-control floating"
                                                        wire:model.defer='university'>
                                                        @error('university')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Institution</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Computer Science"
                                                        class="form-control floating"
                                                        wire:model.defer='course'>
                                                        @error('course')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                    <input type="month"
                                                            class="form-control
                                                            floating"
                                                            wire:model.defer='yearIn'>
                                                            @error('yearIn')
                                                                <span class="invalid-feedback">{{ $message }} </span>
                                                            @enderror

                                                <label class="focus-label">Starting Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                    <input type="month"
                                                     class="form-control
                                                     floating "
                                                     wire:model.defer='yearOut'>
                                                     @error('yearOut')
                                                        <span class="invalid-feedback">{{ $message }} </span>
                                                    @enderror
                                                <label class="focus-label">Complete Date</label>
                                            </div>
                                        </div>



                                         <div wire:ignore class="col-md-6">

                                                <div class="form-group form-focus focused">

                                                    <select wire:model.defer="country"  class="form-control">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->name }} ">{{ $country->name }} </option>
                                                        @endforeach

                                                    </select>
                                                    @error('country')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror
                                                </div>


                                            </div>



                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Oxford University"
                                                        class="form-control floating"
                                                        wire:model.defer='state'>
                                                        @error('state')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror
                                                <label class="focus-label">State</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Oxford University"
                                                        class="form-control floating"
                                                        wire:model.defer='city'>
                                                        @error('city')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">City</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent='createEducationExperience("education")'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Education Modal -->

       <!-- Education Modal -->
       <div id="edit_education_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Education Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Oxford University"
                                                        class="form-control floating"
                                                        wire:model.defer='university'>
                                                        @error('university')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Institution</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Computer Science"
                                                        class="form-control floating"
                                                        wire:model.defer='course'>
                                                        @error('course')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                    <input type="month"
                                                            class="form-control
                                                            floating"
                                                            wire:model.defer='yearIn'>
                                                            @error('yearIn')
                                                                <span class="invalid-feedback">{{ $message }} </span>
                                                            @enderror

                                                <label class="focus-label">Starting Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                    <input type="month"
                                                     class="form-control
                                                     floating "
                                                     wire:model.defer='yearOut'>
                                                     @error('yearOut')
                                                        <span class="invalid-feedback">{{ $message }} </span>
                                                    @enderror
                                                <label class="focus-label">Complete Date</label>
                                            </div>
                                        </div>



                                         <div wire:ignore class="col-md-6">

                                                <div class="form-group form-focus focused">

                                                    <select wire:model.defer="country"  class="form-control">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->name }} ">{{ $country->name }} </option>
                                                        @endforeach

                                                    </select>
                                                    @error('country')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror
                                                </div>


                                            </div>



                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Oxford University"
                                                        class="form-control floating"
                                                        wire:model.defer='state'>
                                                        @error('state')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror
                                                <label class="focus-label">State</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text"
                                                        placeholder="Oxford University"
                                                        class="form-control floating"
                                                        wire:model.defer='city'>
                                                        @error('city')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">City</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent="updateEducationExperience('education')">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Education Modal -->

    <!-- Experience Modal -->
    <div wire:ignore.self id="create_experience_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Experience Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Experience Informations </h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text"
                                                        class="form-control floating"
                                                        placeholder="Web Developer"
                                                        wire:model.defer='title'>

                                                        @error('title')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Job Position</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <select wire:model.defer="employmentType"  class="form-control">
                                                    <option value="">Select Employement Type</option>
                                                    @foreach ($employmentTypes as $employement)
                                                        <option value="{{ $employement['type'] }} ">{{ $employement['type'] }} </option>
                                                    @endforeach

                                                </select>
                                                @error('location')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text"
                                                        class="form-control floating"
                                                        placeholder="Digital Devlopment Inc"
                                                        wire:model.defer='company'>
                                                        @error('company')
                                                            <span class="invalid-feedback" >{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Company Name</label>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <select wire:model.defer="location"  class="form-control">
                                                    <option value="">Select Location</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }} ">{{ $country->name }} </option>
                                                    @endforeach

                                                </select>
                                                @error('location')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-12 ">

                                            <div class="form-group form-focus custom-control custom-switch custom-switch-md">
                                                <input type="checkbox" class="custom-control-input"  wire:click='switchPosition' id="switch-position">
                                                <label class="custom-control-label" for="switch-position">Current Position</label>
                                              </div>

                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="month"
                                                        class="form-control floating"
                                                        wire:model.defer='from_period'>
                                                        @error('from_period')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror

                                                <label class="focus-label">Period From</label>
                                            </div>
                                        </div>

                                        @if (!$isCurrentPosition)
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="month"
                                                        class="form-control floating"
                                                        wire:model.defer='to_period'>

                                                <label class="focus-label">Period To</label>
                                            </div>
                                        </div>
                                        @endif


                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <textarea  cols="80" rows="10" wire:model.defer='jobDescription'></textarea>

                                                        @error('jobDescription')
                                                            <span class="invalid-feedback" >{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Job Description</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent="createEducationExperience('experience') ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Experience Modal -->
     <div wire:ignore.self id="edit_experience_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Experience Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Experience Informations</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text"
                                                placeholder="Oxford University"
                                                        class="form-control floating"
                                                        wire:model.defer='title'>

                                                        @error('title')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Job Position</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <select wire:model.defer="employmentType"  class="form-control">

                                                    @foreach ($employmentTypes as $employement)
                                                        <option value="{{ $employement['type'] }} ">{{ $employement['type'] }} </option>
                                                    @endforeach

                                                </select>
                                                @error('location')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text"
                                                        class="form-control floating"

                                                        wire:model.defer='company'>
                                                        @error('company')
                                                            <span class="invalid-feedback" >{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Company Name</label>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <select wire:model.defer="location"  class="form-control">

                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }} ">{{ $country->name }} </option>
                                                    @endforeach

                                                </select>
                                                @error('location')
                                                    <span class="invalid-feedback">{{ $message }} </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-12 ">

                                            <div class="form-group form-focus custom-control custom-switch custom-switch-md">
                                                <input type="checkbox" class="custom-control-input" {{ $isCurrentPosition == 1 ? 'checked': '' }}   wire:click='switchPosition' id="edit-switch-position">
                                                <label class="custom-control-label" for="edit-switch-position">Current Position</label>
                                              </div>

                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="month"
                                                        class="form-control floating"
                                                        wire:model.defer='from_period'>
                                                        @error('from_period')
                                                            <span class="invalid-feedback">{{ $message }} </span>
                                                        @enderror

                                                <label class="focus-label">Period From</label>
                                            </div>
                                        </div>

                                        @if (!$isCurrentPosition)
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="month"
                                                        class="form-control floating"
                                                        wire:model.defer='to_period'>

                                                <label class="focus-label">Period To</label>
                                            </div>
                                        </div>
                                        @endif


                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <textarea  cols="80" rows="10" wire:model.defer='jobDescription'></textarea>

                                                        @error('jobDescription')
                                                            <span class="invalid-feedback" >{{ $message }} </span>
                                                        @enderror
                                                <label class="focus-label">Job Description</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent="updateEducationExperience('experience')">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Delete Employee Modal -->
     <div class="modal custom-modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">

                            <div class="col-6">
                                <a href="javascript:void(0);"
                                    data-dismiss="modal"
                                    class="btn btn-primary cancel-btn">Cancel</a>
                            </div>

                            <div class="col-6">
                                <a href="javascript:void(0);"
                                    class="btn btn-primary continue-btn"
                                    wire:click.prevent='delete()'>Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /Experience Modal -->
</div>
@section('DateScript')
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
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


        window.addEventListener('userUpdatedSuccessfully', event => {
        $('#profile_info').modal('hide')
    })
    window.addEventListener('userPersonalInfoUpdatedSuccessfully', event => {
        $('#personal_info_modal').modal('hide')
    })

    window.addEventListener('emergencyUpdatedSuccessfully', event => {
        $('#emergency_contact_modal').modal('hide')
    })

    window.addEventListener('education-experience', event => {
        $('#create_education_info').modal('hide')
        $('#edit_education_info').modal('hide')
        $('#create_experience_info').modal('hide')
        $('#edit_experience_info').modal('hide')





    })

    window.addEventListener('closeModal', event => {
        $('#delete').modal('hide')
    })


    $(document).ready(function () {
        $('.select').select2();
        $('.select').on('change', function (e) {
            var data = $('.select').select2("val");
            @this.set('country', data);
        });
    });
    </script>






@endsection

