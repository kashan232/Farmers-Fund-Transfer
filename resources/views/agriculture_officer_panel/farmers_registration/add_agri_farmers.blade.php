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
    width: 70px; /* Increased size */
    height: 70px; /* Increased size */
    border-radius: 100%;
    background-color: #f1f1f1;
    color: #333;
    border: 2px solid #ccc;
    font-size: 13px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 0 10px; /* Added spacing */
}

.step-indicator.active {
    background-color: #5bcfc5;
    color: white;
    border-color: #5bcfc5;
}

.connector {
    width: 50px; /* Adjusted to match circle size */
    height: 2px;
    background-color: #ccc;
}

.step-indicator + .connector + .step-indicator.active ~ .step-indicator {
    border-color: #ccc;
    background-color: #f1f1f1;
    color: #333;
}

</style>
@include('agriculture_officer_panel.include.header_include')

<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    @include('agriculture_officer_panel.include.navbar_include')

    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    @include('agriculture_officer_panel.include.sidebar_include')

    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Farmers Registration</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <!-- Progress Indicator -->
                                <div class="progress-indicator mb-4">
                                    <div class="step-indicator-container">
                                        <span class="step-indicator step-indicator-1 active" onclick="nextStep(1)">Step 1</span>
                                        <span class="connector"></span>
                                        <span class="step-indicator step-indicator-2" onclick="nextStep(2)">Step 2</span>
                                        <span class="connector"></span>
                                        <span class="step-indicator step-indicator-3" onclick="nextStep(3)">Step 3</span>
                                        <span class="connector"></span>
                                        <span class="step-indicator step-indicator-4" onclick="nextStep(4)">Step 4</span>
                                        <span class="connector"></span>
                                        <span class="step-indicator step-indicator-5" onclick="nextStep(5)">Step 5</span>
                                    </div>
                                </div>

                                <form id="registrationForm" action="{{ route('store-agri-farmers') }}" method="POST">
                                    @csrf
                                    <div class="step step-1">
                                        <div class="row mt-2">
                                            <h4 class="card-title">Personal Details</h4>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Father Name</label>
                                                <input type="text" name="father_name" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Gender</label>
                                                <select name="gender" id="" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Custom">Custom</option>
                                                </select>
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">CNIC</label>
                                                <input type="text" name="cnic" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Province</label>
                                                <input type="text" name="province" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Dictrict</label>
                                                <input type="text" name="district" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Tehsil</label>
                                                <input type="text" name="tehsil" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">UC</label>
                                                <input type="text" name="uc" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Tappa</label>
                                                <input type="text" name="tappa" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Area</label>
                                                <input type="text" name="area" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Chak Goth Killi</label>
                                                <input type="text" name="chak_goth_killi" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Khasra Survey No 
                                                </label>
                                                <input type="text" name="khasra_survey" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" name="mobile" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Area Category</label>
                                                <input type="text" name="area_category" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Ownership</label>
                                                <input type="text" name="ownership" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Aid Type</label>
                                                <input type="text" name="aid_type" class="form-control">
                                            </div> 
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Is Distributed</label>
                                                <input type="text" name="is_distributed" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Cheque Amount</label>
                                                <input type="text" name="cheque_amount" class="form-control">
                                            </div> 
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Cheque Number</label>
                                                <input type="text" name="cheque_number" class="form-control">
                                            </div>
                                             <div class="mb-6 col-md-6">
                                                <label class="form-label">Created On</label>
                                                <input type="text" name="created_on" class="form-control">
                                            </div> 
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Created By</label>
                                                <input type="text" name="created_by" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Is Verified</label>
                                                <input type="text" name="is_verified" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Rejection Reason</label>
                                                <input type="text" name="rejection_reason" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Verified By</label>
                                                <input type="text" name="verified_by" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Verified On</label>
                                                <input type="text" name="verified_on" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Registration SMS Date Time</label>
                                                <input type="text" name="registration_sms_date_time" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Seed Given SMS Date Time</label>
                                                <input type="text" name="seed_given_sms_date_time" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Receiver Mobile No</label>
                                                <input type="text" name="receiver_mobile_no" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Total Area</label>
                                                <input type="text" name="total_area" class="form-control">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary mt-5" onclick="nextStep(2)">Next</button>
                                    </div>

                                    <div class="step step-2" style="display: none;">
                                        <div class="row mt-2">
                                            <h4 class="card-title">Seed Information</h4>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Seed Required Qty</label>
                                                <input type="text" name="seed_required_qty" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Seed Variety</label>
                                                <input type="text" name="seed_variety" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Seed Given Qty</label>
                                                <input type="text" name="seed_given_qty" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Seed Variety Given</label>
                                                <input type="text" name="seed_variety_given" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Seed Given By</label>
                                                <input type="text" name="seed_given_by" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Seed Given Date</label>
                                                <input type="text" name="seed_given_date" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Is Sent To Bisp</label>
                                                <input type="text" name="is_sent_bisp" class="form-control">
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
                                                <input type="text" name="bank_branch_name" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Bank Branch Code</label>
                                                <input type="text" name="bank_branch_code" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Bank Account Title</label>
                                                <input type="text" name="bank_account_title" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Bank Account Number</label>
                                                <input type="text" name="bank_account_number" class="form-control">
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
                                                <input type="text" name="latitude" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">longitude</label>
                                                <input type="text" name="longitude" class="form-control">
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
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    @include('agriculture_officer_panel.include.footer_copyright_include')
    <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('agriculture_officer_panel.include.footer_include')

<script>
    function nextStep(step) {
        $('.step').hide();
        $('.step-' + step).show();
        updateProgressIndicator(step);
    }

    function prevStep(step) {
        $('.step').hide();
        $('.step-' + step).show();
        updateProgressIndicator(step);
    }

    function updateProgressIndicator(step) {
        $('.step-indicator').removeClass('active');
        for (let i = 1; i <= step; i++) {
            $('.step-indicator-' + i).addClass('active');
        }
    }
</script>

</body>
</html>
