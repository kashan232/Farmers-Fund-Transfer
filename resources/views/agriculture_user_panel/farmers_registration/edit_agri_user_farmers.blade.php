@include('agriculture_user_panel.include.header_include')
<style>
    .progress-indicator {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .step-indicator-container {
        display: flex;
        align-items: center;
    }

    .step-indicator {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 70px;
        /* Increased size */
        height: 70px;
        /* Increased size */
        border-radius: 100%;
        background-color: #f1f1f1;
        color: #333;
        border: 2px solid #ccc;
        font-size: 13px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 0 10px;
        /* Added spacing */
    }

    .step-indicator.active {
        background-color: #5bcfc5;
        color: white;
        border-color: #5bcfc5;
    }

    .connector {
        width: 50px;
        /* Adjusted to match circle size */
        height: 2px;
        background-color: #ccc;
    }

    .step-indicator+.connector+.step-indicator.active~.step-indicator {
        border-color: #ccc;
        background-color: #f1f1f1;
        color: #333;
    }
</style>
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    @include('agriculture_user_panel.include.sidebar_include')
</nav>

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
<header class="pc-header">
    @include('agriculture_user_panel.include.navbar_include')
</header>
<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Agriculture Farmers </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Registration</h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <!-- Progress Indicator -->
                            <div class="progress-indicator mb-4">
                                <div class="step-indicator-container">
                                    <span class="step-indicator step-indicator-1 active" onclick="showStep(1)">Step 1</span>
                                    <span class="connector"></span>
                                    <span class="step-indicator step-indicator-2" onclick="showStep(2)">Step 2</span>
                                    <span class="connector"></span>
                                    <span class="step-indicator step-indicator-3" onclick="showStep(3)">Step 3</span>
                                    <span class="connector"></span>
                                    <span class="step-indicator step-indicator-4" onclick="showStep(4)">Step 4</span>
                                    <span class="connector"></span>
                                    <span class="step-indicator step-indicator-5" onclick="showStep(5)">Step 5</span>
                                </div>
                            </div>

                            <form id="registrationForm" action="{{ route('update-agriuser-farmers',['id'=> $all_agriculture_farmer->id ]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="step step-1">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Personal Details</h4>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $all_agriculture_farmer->name }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" name="father_name" class="form-control" value="{{ $all_agriculture_farmer->father_name }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Custom">Custom</option>
                                            </select>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">CNIC</label>
                                            <input type="text" name="cnic" class="form-control" value="{{ $all_agriculture_farmer->cnic }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Province</label>
                                            <input type="text" name="province" class="form-control" value="{{ $all_agriculture_farmer->province }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Dictrict</label>
                                            <input type="text" name="district" class="form-control" value="{{ $all_agriculture_farmer->district }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Tehsil</label>
                                            <input type="text" name="tehsil" class="form-control" value="{{ $all_agriculture_farmer->tehsil }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">UC</label>
                                            <input type="text" name="uc" class="form-control" value="{{ $all_agriculture_farmer->uc }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Tappa</label>
                                            <input type="text" name="tappa" class="form-control" value="{{ $all_agriculture_farmer->tappa }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Area</label>
                                            <input type="text" name="area" class="form-control" value="{{ $all_agriculture_farmer->area }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Chak Goth Killi</label>
                                            <input type="text" name="chak_goth_killi" class="form-control" value="{{ $all_agriculture_farmer->chak_goth_killi }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Khasra Survey No
                                            </label>
                                            <input type="text" name="khasra_survey" class="form-control" value="{{ $all_agriculture_farmer->khasra_survey }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" name="mobile" class="form-control" value="{{ $all_agriculture_farmer->mobile }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Area Category</label>
                                            <input type="text" name="area_category" class="form-control" value="{{ $all_agriculture_farmer->area_category }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Ownership</label>
                                            <input type="text" name="ownership" class="form-control" value="{{ $all_agriculture_farmer->ownership }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Aid Type</label>
                                            <input type="text" name="aid_type" class="form-control" value="{{ $all_agriculture_farmer->aid_type }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Is Distributed</label>
                                            <input type="text" name="is_distributed" class="form-control" value="{{ $all_agriculture_farmer->is_distributed }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Cheque Amount</label>
                                            <input type="text" name="cheque_amount" class="form-control" value="{{ $all_agriculture_farmer->cheque_amount }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Cheque Number</label>
                                            <input type="text" name="cheque_number" class="form-control" value="{{ $all_agriculture_farmer->cheque_number }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Created On</label>
                                            <input type="text" name="created_on" class="form-control" value="{{ $all_agriculture_farmer->created_on }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Created By</label>
                                            <input type="text" name="created_by" class="form-control" value="{{ $all_agriculture_farmer->created_by }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Is Verified</label>
                                            <input type="text" name="is_verified" class="form-control" value="{{ $all_agriculture_farmer->is_verified }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Rejection Reason</label>
                                            <input type="text" name="rejection_reason" class="form-control" value="{{ $all_agriculture_farmer->rejection_reason }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Verified By</label>
                                            <input type="text" name="verified_by" class="form-control" value="{{ $all_agriculture_farmer->verified_by }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Verified On</label>
                                            <input type="text" name="verified_on" class="form-control" value="{{ $all_agriculture_farmer->verified_on }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Registration SMS Date Time</label>
                                            <input type="text" name="registration_sms_date_time" class="form-control" value="{{ $all_agriculture_farmer->registration_sms_date_time }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Seed Given SMS Date Time</label>
                                            <input type="text" name="seed_given_sms_date_time" class="form-control" value="{{ $all_agriculture_farmer->seed_given_sms_date_time }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Receiver Mobile No</label>
                                            <input type="text" name="receiver_mobile_no" class="form-control" value="{{ $all_agriculture_farmer->receiver_mobile_no }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Total Area</label>
                                            <input type="text" name="total_area" class="form-control" value="{{ $all_agriculture_farmer->total_area }}">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(2)">Next</button>
                                </div>

                                <div class="step step-2" style="display: none;">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Seed Information</h4>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Seed Required Qty</label>
                                            <input type="text" name="seed_required_qty" class="form-control" value="{{ $all_agriculture_farmer->seed_required_qty }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Seed Variety</label>
                                            <input type="text" name="seed_variety" class="form-control" value="{{ $all_agriculture_farmer->seed_variety }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Seed Given Qty</label>
                                            <input type="text" name="seed_given_qty" class="form-control" value="{{ $all_agriculture_farmer->seed_given_qty }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Seed Variety Given</label>
                                            <input type="text" name="seed_variety_given" class="form-control" value="{{ $all_agriculture_farmer->seed_variety_given }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Seed Given By</label>
                                            <input type="text" name="seed_given_by" class="form-control" value="{{ $all_agriculture_farmer->seed_given_by }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Seed Given Date</label>
                                            <input type="text" name="seed_given_date" class="form-control" value="{{ $all_agriculture_farmer->seed_given_date }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Is Sent To Bisp</label>
                                            <input type="text" name="is_sent_bisp" class="form-control" value="{{ $all_agriculture_farmer->is_sent_bisp }}">
                                        </div>

                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(1)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(3)">Next</button>
                                </div>

                                <div class="step step-3" style="display: none;">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Bank & Account Details</h4>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Bank Branch Name</label>
                                            <input type="text" name="bank_branch_name" class="form-control" value="{{ $all_agriculture_farmer->bank_branch_name }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Bank Branch Code</label>
                                            <input type="text" name="bank_branch_code" class="form-control" value="{{ $all_agriculture_farmer->bank_branch_code }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Bank Account Title</label>
                                            <input type="text" name="bank_account_title" class="form-control" value="{{ $all_agriculture_farmer->bank_account_title }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Bank Account Number</label>
                                            <input type="text" name="bank_account_number" class="form-control" value="{{ $all_agriculture_farmer->bank_account_number }}">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(2)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(4)">Next</button>
                                </div>

                                <div class="step step-4" style="display: none;">
                                    <div class="row mt-2">
                                        <h4 class="card-title">GPS Location</h4>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">latitude</label>
                                            <input type="text" name="latitude" class="form-control" value="{{ $all_agriculture_farmer->latitude }}">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">longitude</label>
                                            <input type="text" name="longitude" class="form-control" value="{{ $all_agriculture_farmer->longitude }}">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(3)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(5)">Next</button>
                                </div>

                                <div class="step step-5" style="display: none;">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Uploaded Documents</h4>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Front ID Card Img "jpg/png/jpeg"</label>
                                            <input type="file" name="front_id_card" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Back ID Card Img "jpg/png/jpeg"</label>
                                            <input type="file" name="back_id_card" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Land Proof Pic Img "jpg/png/jpeg"</label>
                                            <input type="file" name="upload_land_proof" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Other Attachments Img "jpg/png/jpeg"</label>
                                            <input type="file" name="upload_other_attach" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Farmer Picture Img "jpg/png/jpeg"</label>
                                            <input type="file" name="upload_farmer_pic" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Cheque Picture Img "jpg/png/jpeg"</label>
                                            <input type="file" name="upload_cheque_pic" class="form-control">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(4)">Previous</button>
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('agriculture_user_panel.include.footer_copyright_include')
</footer>

@include('agriculture_user_panel.include.footer_include')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function nextStep(step) {
        // Hide all steps
        document.querySelectorAll('.step').forEach(function(stepElement) {
            stepElement.style.display = 'none';
        });
        // Show the current step
        document.querySelector('.step-' + step).style.display = 'block';
        updateProgressIndicator(step);
    }

    function prevStep(step) {
        // Hide all steps
        document.querySelectorAll('.step').forEach(function(stepElement) {
            stepElement.style.display = 'none';
        });
        // Show the current step
        document.querySelector('.step-' + step).style.display = 'block';
        updateProgressIndicator(step);
    }

    function showStep(step) {
        nextStep(step);
    }

    function updateProgressIndicator(step) {
        document.querySelectorAll('.step-indicator').forEach(function(indicator, index) {
            if (index < step) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }

    // Initialize the first step
    nextStep(1);
</script>
</body>
</html>