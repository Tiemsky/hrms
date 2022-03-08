<div>
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Payslip</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payslip</li>
                    </ul>
                </div>
              
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

    <h4 class="payslip-title">Leave Request For:  </h4>
                        <div class="row">
                            <div class="col-sm-6 m-b-20">
                                <img src="assets/img/logo2.png" class="inv-logo" alt="">
                                <ul class="list-unstyled mb-0">
                                    <li>{{ $user->country ? $user->country->name : ' '  }} </li>
                                    <li>{{ $user->address }} </li>
                                 
                                </ul>
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    <h3 class="text-uppercase">Payslip #49029</h3>
                                    <ul class="list-unstyled">
                                        <li>Salary Month: <span>March, 2019</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 m-b-20">
                                <ul class="list-unstyled">
                                    <li><h5 class="mb-0"><strong>{{ $user->last_name }} {{ $user->first_name }} </strong></h5></li>
                                    <li><span>{{ $user->department->name }} </span></li>
                                    <li>Employee ID: {{ $user->employee_id }} </li>
                                    <li>Joining Date: {{ $user->joindate }} </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Leave details</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Leave Name</strong>
                                                    <span class="float-right">
                                                        {{ $leave->name }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">$55</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Conveyance</strong> <span class="float-right">$55</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Other Allowance</strong> <span class="float-right">$55</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Earnings</strong> <span class="float-right"><strong>$55</strong></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">$0</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Provident Fund</strong> <span class="float-right">$0</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>ESI</strong> <span class="float-right">$0</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Loan</strong> <span class="float-right">$300</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Deductions</strong> <span class="float-right"><strong>$59698</strong></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p><strong>Net Salary: $59698</strong> (Fifty nine thousand six hundred and ninety eight only.)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
