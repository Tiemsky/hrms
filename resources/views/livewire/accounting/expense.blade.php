<div>
    	<!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Budgets Expenses</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn"
                                    data-toggle="modal"
                                    data-target="#converter">
                                    <i class="fa fa-money"></i>
                                    Currency =>
                        </a>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn"
                                    data-toggle="modal"
                                    data-target="#add_categories">
                                    <i class="fa fa-plus"></i>
                                    Add Expenses
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            	<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Item Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
							<div class="form-group ">
								<select class="form-control">
									<option> -- Select -- </option>
									<option>Loren Gatlin</option>
									<option>Tarah Shropshire</option>
								</select>
								<label class="focus-label">Purchased By</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
							<div class="">
								<select class="form-control ">
									<option> -- Select -- </option>
									<option> Cash </option>
									<option> Cheque </option>
								</select>
								<label class="focus-label">Paid By</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
							<div class="">

									<input class="form-control  " type="date">

								<label class="focus-label">From</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
							<div class="">
									<input class="form-control" type="date">
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
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Added By</th>
                                    <th>Article</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Note</th>
                                    <th>Expense date</th>
                                    <th>Created_at</th>
                                    <th>Convert</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $expense->user->last_name }} </td>
                                    <td>{{ $expense->article }} </td>
                                    <td>@if($convertTo && $expense->id == $currentItemID){{ $convertTo }}@else {{$expense->amount }}  @endif</td>
                                    <td>{{ $expense->currency }} </td>
                                    <td>{{ $expense->note }} </td>
                                    <td>{{ $expense->date }} </td>
                                    <td>{{ $expense->created_at->diffForHumans() }} </td>
                                    <td>

                                        <select wire:ignore.self  class="form-control convert-currency" wire:model='toBeConverted'>
                                            <option value="" selected>ConvertTo</option>
                                            @foreach ($currencies as $key => $currency)

                                                <option value="{{$expense->amount }} {{$expense->currency }} {{ $key }} {{ $expense->id }}">{{ $expense->currency == $key ? $key : $currency }} </option>
                                            @endforeach

                                    </select>

                                    @if ( $expense->id == $currentItemID)
                                    <svg wire:loading class="loader animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4335 4335" width="100" height="100">
                                        <path fill="#008DD2" d="M3346 1077c41,0 75,34 75,75 0,41 -34,75 -75,75 -41,0 -75,-34 -75,-75 0,-41 34,-75 75,-75zm-1198 -824c193,0 349,156 349,349 0,193 -156,349 -349,349 -193,0 -349,-156 -349,-349 0,-193 156,-349 349,-349zm-1116 546c151,0 274,123 274,274 0,151 -123,274 -274,274 -151,0 -274,-123 -274,-274 0,-151 123,-274 274,-274zm-500 1189c134,0 243,109 243,243 0,134 -109,243 -243,243 -134,0 -243,-109 -243,-243 0,-134 109,-243 243,-243zm500 1223c121,0 218,98 218,218 0,121 -98,218 -218,218 -121,0 -218,-98 -218,-218 0,-121 98,-218 218,-218zm1116 434c110,0 200,89 200,200 0,110 -89,200 -200,200 -110,0 -200,-89 -200,-200 0,-110 89,-200 200,-200zm1145 -434c81,0 147,66 147,147 0,81 -66,147 -147,147 -81,0 -147,-66 -147,-147 0,-81 66,-147 147,-147zm459 -1098c65,0 119,53 119,119 0,65 -53,119 -119,119 -65,0 -119,-53 -119,-119 0,-65 53,-119 119,-119z"
                                        />
                                    </svg>
                                    @endif



                            </td>

                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a wire:click.prevent="editExpense('{{$expense->id}}')"
                                                    class="dropdown-item" href="#"
                                                    data-toggle="modal"
                                                    data-target="#edit_categories">
                                                    <i class="fa fa-pencil m-r-5"></i>
                                                     Edit
                                                    </a>
                                        <a wire:click.prevent="getExpenseInfo('{{$expense->id}}')"
                                                    class="dropdown-item"
                                                    href="#" data-toggle="modal"
                                                    data-target="#delete">
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

        <!-- Add Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="add_categories" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Expenses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Amount
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control"
                                        placeholder="800.00"
                                        wire:model.defer="amount">

                                        @error('amount')
										<span class="invalid-feedback"> {{$message}}  </span>
									    @enderror
                            </div>
                            <div class="col-lg-6">
                                <select name="currency_symbol" class="form-control" wire:model.defer='currency' >
                                    <option value="">Choose Currency</option>
                                    @foreach ($currencies as $key => $currency)
                                    <option value="{{ $key }}">{{ $currency }} </option>
                                @endforeach

                                </select>
                                @error('currency')
									<span class="invalid-feedback"> {{$message}}  </span>
								@enderror
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Article
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input class="form-control"
                                        wire:model.defer="article">
                                    @error('article')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                            </div>
                        </div>


                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Notes <span class="text-danger"></span></label>
                            <div class="col-lg-12">
                                <textarea class="form-control ta"
                                            wire:model.defer="note">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Expense Date <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input class="form-control"
                                        type="date"
                                        wire:model.defer='date'>

                                        @error('date')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary"
                                    wire:click.prevent='addExpense'>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Modal -->


        <!-- Edit Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="edit_categories" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                @if (Auth::user()->isAdmin >= 2)
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Expenses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Amount
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control"
                                        placeholder="800.00"
                                        wire:model.defer="amount">

                                        @error('amount')
										<span class="invalid-feedback"> {{$message}}  </span>
									    @enderror
                            </div>
                            <div class="col-lg-6">
                                <select name="currency_symbol" class="form-control" wire:model.defer='currency' >
                                    <option value="">Choose Currency</option>
                                    @foreach ($currencies as $key => $currency)
                                    <option value="{{ $key }}">{{ $currency }} </option>
                                @endforeach

                                </select>
                                @error('currency')
									<span class="invalid-feedback"> {{$message}}  </span>
								@enderror
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Article
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-12">
                                <input class="form-control"
                                        wire:model.defer="article">
                                    @error('article')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                            </div>
                        </div>


                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Notes <span class="text-danger"></span></label>
                            <div class="col-lg-12">
                                <textarea class="form-control ta"
                                            wire:model.defer="note">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-lg-12 control-label">Expense Date <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input class="form-control"
                                        type="date"
                                        wire:model.defer='date'>

                                        @error('date')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary"
                                    wire:click.prevent='updateExpense'>Submit</button>
                        </div>
                    </div>
                </div>
                @else
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Permission Required</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <span class="text-center">You are not allowed to make any changes</span>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- /Edit Modal -->

        <!-- Delete Holiday Modal -->
        <div class="modal custom-modal fade" id="delete" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete </h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);"
                                        class="btn btn-primary continue-btn"
                                        wire:click.prevent='deleteExpense'>Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);"
                                        data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Holiday Modal -->
        <script>
            window.addEventListener('expense', event => {
            $('#add_categories').modal('hide')
            $('#edit_categories').modal('hide')
            $('#delete').modal('hide')
        })
        </script>
</div>
