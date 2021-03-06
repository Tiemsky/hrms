<div class="content container-fluid">

    	<!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Holidays 2019</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Holidays</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add Holiday</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title </th>
                                <th>Holiday Date</th>
                                <th>Day</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($holidays as $holiday)
                            <tr class="holiday-completed">
                                <td>{{ ++$loop->index }} </td>
                                <td>{{ $holiday->name }} </td>
                                <td>{{ $holiday->date }} </td>
                                <td>{{ date('l',strtotime($holiday->date)) }} </td>
                                <td></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        	<!-- Add Holiday Modal -->
				<div wire:ignore.self class="modal custom-modal fade" id="add_holiday" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Holiday</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>Holiday Name <span class="text-danger">*</span></label>
										<input class="form-control"
                                                type="text"
                                                wire:model.defer='name'>
                                                @error('name')
                                                    <span class="invalid-feedback"> {{ $message }}</span>
                                                @enderror
									</div>
									<div class="form-group">
										<label>Holiday Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
                                            <input class="form-control"
                                                    type="date"
                                                    wire:model.defer='date'>
                                                    @error('date')
                                                    <span class="invalid-feedback"> {{ $message }}</span>
                                                @enderror
                                        </div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary" wire:click.prevent='create'>Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Holiday Modal -->

				<!-- Edit Holiday Modal -->
				<div class="modal custom-modal fade" id="edit_holiday" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Holiday</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>Holiday Name <span class="text-danger">*</span></label>
										<input class="form-control" value="New Year" type="text">
									</div>
									<div class="form-group">
										<label>Holiday Date <span class="text-danger">*</span></label>
										<div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2019" type="text"></div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Holiday Modal -->
            <!-- Delete Holiday Modal -->
            <div class="modal custom-modal fade" id="delete_holiday" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Holiday</h3>
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
            <!-- /Delete Holiday Modal -->
				<!-- Delete Holiday Modal -->

</div>


<script>
    window.addEventListener('holidays', event => {
    $('#add_holiday').modal('hide')
    $('#edit_education_info').modal('hide')
    $('#create_experience_info').modal('hide')
    $('#edit_experience_info').modal('hide')





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
