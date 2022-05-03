<div>
      	<!-- Page Content -->
          <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Promotion</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Promotion</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_promotion"><i class="fa fa-plus"></i> Add Promotion</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">

                        <!-- Promotion Table -->
                        <table class="table table-striped custom-table mb-0 ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Promoted Employee </th>
                                    <th>Department</th>
                                    <th>Promotion Designation From </th>
                                    <th>Promotion Designation To </th>
                                    <th>Promotion Date </th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promoted_user)

                                    <tr>
                                        <td>{{ ++$loop->index }} </td>
                                        <td>
                                            <h2 class="table-avatar blue-link">
                                                <a href="profile.html" class="avatar">
                                                    <img alt=""
                                                    @if ($promoted_user->user->avatar == '')
                                                    @if ($promoted_user->user->gender  == 'male')
                                                        src="{{asset('assets/img/default_profil/male.jpg')}} "
                                                    @else
                                                        src="{{asset('assets/img/default_profil/female.jpg')}} "
                                                    @endif
                                                @else
                                                    src="{{asset('storage/avatar/'.$promoted_user->avatar)}} "
                                                @endif

                                                    >
                                                </a>
                                                <a href="{{ route('user.profile',[$promoted_user->user->slug]) }} ">{{ $promoted_user->user->last_name }} {{ $promoted_user->user->first_name }} </a>
                                            </h2>
                                        </td>
                                        <td>{{ $promoted_user->user->department->name }} </td>
                                        <td>{{ $promoted_user->promotion_from }} </td>
                                        <td>{{ $promoted_user->promotion_to }}</td>
                                        <td>{{ $promoted_user->date_of_promotion }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_promotion"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_promotion"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                @endforeach
                            </tbody>
                        </table>
                        <!-- /Promotion Table -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Promotion Modal -->
        <div wire:ignore.self id="add_promotion" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Promotion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Promoted User <span class="text-danger">*</span></label>
                                <select wire:change='getUserInfo' class="form-control" wire:model='userID'>
                                    <option value="">Select User </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->last_name }} </option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="form-group">
                                <label>User Department <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ $userDepartment}} " readonly>
                            </div>
                            <div class="form-group">
                                <label>Promotion From <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ $currentPosition }} " readonly>
                            </div>

                            <div class="form-group">
                                <label>Promotion To <span class="text-danger">*</span></label>
                                <input class="form-control"
                                        type="text"
                                        wire:model.defer='promotion_to'>

                                        @error('promotion_to')
                                            <span class="invalid-feedback"> {{$message}}  </span>
                                        @enderror
                            </div>

                            <div class="form-group">
                                <label>Promotion Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="date"
                                            class="form-control"
                                            wire:model.defer='date_of_promotion'>

                                        @error('date_of_promotion')
                                            <span class="invalid-feedback"> {{$message}}  </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary" wire:click.prevent='savePromotion'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Promotion Modal -->

        <!-- Edit Promotion Modal -->
        <div id="edit_promotion" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Promotion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Promotion For <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label>Promotion From <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="Web Developer" readonly>
                            </div>
                            <div class="form-group">
                                <label>Promotion To <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Web Developer</option>
                                    <option>Web Designer</option>
                                    <option>SEO Analyst</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Promotion Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Promotion Modal -->

        <!-- Delete Promotion Modal -->
        <div class="modal custom-modal fade" id="delete_promotion" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Promotion</h3>
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
        <!-- /Delete Promotion Modal -->

         <!-- /Add Resignation Modal -->
         <script>
            window.addEventListener('promotion', event => {
            $('#add_promotion').modal('hide')
        })
        </script>
</div>
