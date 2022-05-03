<div>
      	<!-- Page Content -->
          <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Resignation</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Resignation</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_resignation"><i class="fa fa-plus"></i> Add Resignation</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Resigning Employee </th>
                                    <th>Department </th>
                                    <th>Reason </th>
                                    <th>Notice Date </th>
                                    <th>Resignation Date </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resignations as $resignation)
                                    <tr>
                                        <td>{{ ++$loop->index }} </td>
                                        <td>
                                            <h2 class="table-avatar blue-link">
                                                <a href="{{ route('user.profile',[$resignation->user->slug]) }} "
                                                    class="avatar">
                                                    <img alt="avatar"

                                                    @if ($resignation->user->avatar == '')
                                                        @if ($resignation->user->gender  == 'male')
                                                            src="{{asset('assets/img/default_profil/male.jpg')}} "
                                                        @else
                                                            src="{{asset('assets/img/default_profil/female.jpg')}} "
                                                        @endif
                                                    @else
                                                        src="{{asset('storage/avatar/'.$user->avatar)}} "
                                                    @endif
                                                        >
                                                    </a>
                                                <a href="{{ route('user.profile',[$resignation->user->slug]) }}">
                                                    {{ $resignation->user->last_name }} {{ $resignation->user->first_name }}
                                                </a>
                                            </h2>
                                        </td>
                                        <td>{{ $resignation->user->department->name }} </td>
                                        <td>{{ $resignation->reason }} </td>
                                        <td>{{ $resignation->notice_date }} </td>
                                        <td>{{ $resignation->resignation_date }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Resignation Modal -->
        <div wire:ignore.self id="add_resignation" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Resignation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Resigning Employee <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select class="form-control" wire:model.defer='user_id'>
                                        <option>Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id  }} ">{{ $user->last_name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>




                            <div class="form-group">
                                <label>Notice Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="date"
                                            class="form-control"
                                            wire:model.defer='notice_date'>
                                            @error('notice_date')
                                                <span class="invalid-feedback"> {{$message}}  </span>
                                            @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Resignation Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="date"
                                            class="form-control"
                                            wire:model.defer='resignation_date'>
                                            @error('resignation_date')
                                                <span class="invalid-feedback"> {{$message}}  </span>
                                            @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Reason <span class="text-danger">*</span></label>
                                <textarea class="form-control"
                                            rows="4"
                                            wire:model.defer='reason'></textarea>
                                            @error('reason')
                                                <span class="invalid-feedback"> {{$message}}  </span>
                                            @enderror
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn"
                                        wire:click.prevent='createResignation'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Resignation Modal -->
        <script>
            window.addEventListener('resignation', event => {
            $('#add_resignation').modal('hide')
        })
        </script>
</div>
