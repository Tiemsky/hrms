<div class="content container-fluid">
    <!-- Page Content -->
    <div>

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Training Type</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Training Type</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_type"><i class="fa fa-plus"></i> Add Type</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Type </th>
                                <th>Description </th>
                                <th>Status </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($training_types as $training_type)
                            <tr>
                                <td>{{ ++$loop->index }} </td>
                                <td>{{ $training_type->type }} </td>
                                <td>{{ $training_type->description }}  </td>
                                <td>
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-{{ $training_type->status == 1? 'success' : 'danger' }}"></i> 
                                            {{ $training_type->status == 1? 'Active' : 'Inactive' }}
                                        </a>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" type="button" wire:click.prevent='changeStatus({{ "$training_type->id" }}, {{ "$training_type->status" }} ) '>
                                                <i class="fa fa-dot-circle-o text-{{ $training_type->status == 1? 'danger' : 'success' }}"></i> {{ $training_type->status == 1? 'Inactive' : 'Active' }}</a>
                                        
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" 
                                                href="#" data-toggle="modal" 
                                                data-target="#edit_type"
                                                wire:click.prevent='getInfo({{"$training_type->id"}})'>
                                                <i class="fa fa-pencil m-r-5"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" 
                                                href="#" data-toggle="modal"
                                                data-target="#delete_type"
                                                wire:click.prevent='getInfo({{"$training_type->id"}})'>
                                                <i class="fa fa-trash-o m-r-5"></i> 
                                                Delete
                                            </a>
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

    <!-- Add Training Type Modal -->
    <div wire:ignore.self ignore id="add_type" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Type <span class="text-danger">*</span></label>
                            <input class="form-control" 
                                    type="text"
                                    wire:model.defer='type'>
                                    @error('type')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" 
                                        rows="4"
                                        wire:model.defer='description'>
                                    </textarea>
                                    @error('description')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" wire:click.prevent='addType'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Training Type Modal -->
    
    <!-- Edit Training Type Modal -->
    <div id="edit_type" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Type <span class="text-danger">*</span></label>
                            <input class="form-control" 
                                    wire:model.defer='type'>
                                    @error('type')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4"
                            wire:model.defer='description'>
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback"> {{$message}}  </span>
                            @enderror
                        </div>
                  
                        <div class="submit-section">
                            <button class="btn btn-primary" wire:click.prevent='update'>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Training Type Modal -->
    
    <!-- Delete Training Type Modal -->
    <div wire:ignore.self  class="modal custom-modal fade" id="delete_type" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Training Type</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a type="button" wire:click.prevent='delete()' class="btn btn-primary continue-btn">Delete</a>
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
    <!-- /Delete Training Type Modal -->



    <script>
        window.addEventListener('trainingTypeCreated', event => {
                $('#add_type').modal('hide');
                $('#edit_type').modal('hide');
        })
        {{-- window.addEventListener('closeModal', event => {
            $('#openDeleteModal').modal('hide')
        }) --}}
</script>
</div>
