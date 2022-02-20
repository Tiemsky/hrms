
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Company Settings</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input class="form-control" 
                                    type="text"
                                    value="Google"
                                    wire:model.defer='company_name' 
                                    >
                                    @error('company_name')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input class="form-control " 
                                    type="text"
                                    value="Gate Junior III"
                                    wire:model='hr_name'>
                                    @error('hr_name')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control " 
                                    value="3864 Quiet Valley Lane, Sherman Oaks, CA, 91403" 
                                    type="text"
                                    wire:model.defer='address'>
                                    @error('address')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                    </div>
                  
                    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" 
                                    value="danielporter@example.com" 
                                    type="email"
                                    wire:model.defer='company_email'>
                                    @error('company_email')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" 
                                    value="818-978-7102" 
                                    type="text"
                                    wire:model.defer='phone_number'>
                                    @error('phone_number')
                                        <span class="invalid-feedback"> {{$message}}  </span>
                                    @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" 
                                    value="818-635-5579" 
                                    type="text"
                                    wire:model.defer='mobile_number'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fax</label>
                            <input class="form-control" 
                                    value="818-978-7102" 
                                    type="text"
                                    wire:model.defer='fax'>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Website Url</label>
                            <input class="form-control" 
                                    value="https://www.example.com" 
                                    type="text"
                                    wire:model.defer='web_site'>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn"
                            wire:click.prevent="createCompanyInfo()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> {{-- The Master doesn't talk, he acts. --}}

