@include('agriculture_officer_panel.include.header_include')
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
        background-color: #5bcfc5 !important;
        color: white !important;
        border-color: #5bcfc5 !important;
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
    @include('agriculture_officer_panel.include.sidebar_include')
</nav>

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
<header class="pc-header">
    @include('agriculture_officer_panel.include.navbar_include')
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
                            <h2 class="mb-0">Farmer Registration</h2>
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
                        @if (session()->has('farmer-added'))
                            <div class="alert alert-success alert-dismissible fade show mt-4">
                                <strong>Success!</strong> {{ session('farmer-added') }}.
                            </div>
                        @endif
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

                            <form id="registrationForm" action="{{ route('store-agri-farmers') }}" method="POST" enctype="multipart/form-data">
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
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">CNIC</label>
                                            <input type="text" name="cnic" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" name="mobile" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Dictrict</label>
                                            <input type="text" name="district" id="district" class="form-control" value="{{ $district }}" readonly>
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Tehsil</label>
                                            <select name="tehsil" id="tehsil" class="form-control">
                                                <option value="">Please Select Tehsil</option>
                                                @foreach(json_decode($tehsil) as $tehsil)
                                                <option value="{{ $tehsil }}">{{ $tehsil }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if(Auth::check())
                                        @php
                                        $userUcArray = json_decode(Auth::user()->ucs);
                                        @endphp
                                        @if(is_array($userUcArray))
                                        <div class="mb-3 col-md-6 py-2">
                                            <label for="uc">UC</label>
                                            <select name="uc" id="uc" class="form-control">
                                                {{-- @foreach($userUcArray as $uc)
                                                <option value="{{ $uc }}">{{ $uc }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        @else
                                        <div class="mb-3 col-md-6 py-2">
                                            <label for="uc">UC</label>
                                            <select name="uc" id="uc" class="form-control">
                                                {{-- <option value="" selected disabled>No UCS Assigned</option> --}}
                                            </select>
                                        </div>
                                        @endif
                                        @endif


                                        @if(Auth::check())
                                        @php
                                        $usertappasArray = json_decode(Auth::user()->tappas);
                                        @endphp
                                        @if(is_array($usertappasArray))
                                        <div class="mb-3 col-md-6 py-2">
                                            <label for="tappa">tappa</label>
                                            <select name="tappa" id="tappa" class="form-control">
                                                {{-- @foreach($usertappasArray as $tappa)
                                                <option value="{{ $tappa }}">{{ $tappa }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        @else
                                        {{-- <div class="mb-3 col-md-6">
                                            <label for="tappa">tappa</label>
                                            <select name="tappa" id="tappa" class="form-control">
                                                <option value="" selected disabled>No tappas Assigned</option>
                                            </select>
                                        </div> --}}
                                        @endif
                                        @endif
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">DAH</label>
                                            <input type="text" name="dah" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Village</label>
                                            <input type="text" name="village" class="form-control">
                                        </div>
                                        <div class="mb-4 col-md-4 mt-3">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-4 col-md-4 mt-3">
                                            <label class="form-label">House Type</label>
                                            <select name="house_type" id="house_type" class="form-control">
                                                <option value="Pakka House">Pakka House</option>
                                                <option value="Kacha House">Kacha House</option>
                                            </select>
                                        </div>
                                        <div class="mb-4 col-md-4 mt-3">
                                            <label class="form-label">Owner Type</label>
                                            <select name="owner_type" id="owner_type" class="form-control">
                                                <option value="Owner">Owner</option>
                                                <option value="Makandar">Makandar</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="row mt-2">
                                            <h5>Family Composition</h5>
                                            <div class="mb-4 col-md-4 mt-3">
                                                <h6 class="text-center">Gender</h6>
                                                <input type="text" value="Female" readonly name="family_composition_female" class="form-control">
                                            </div>
                                            <div class="mb-4 col-md-4 mt-3">
                                                <h6 class="text-center">Children < 16 </h6>
                                                <input type="text" name="female_children_under16" class="form-control">
                                            </div>
                                            <div class="mb-4 col-md-4 mt-3">
                                                <h6 class="text-center">Adults > 16 </h6>
                                                <input type="text" name="female_Adults_above16" class="form-control">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <input type="text" value="Male" readonly name="family_composition_male" class="form-control">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <input type="text" name="male_children_under16" class="form-control">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <input type="text" name="male_Adults_above16" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-3" id="">
                                            <h5>Landholding & Cropping</h5>
                                            <div class="row mt-3">
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total Landholding (Acre)</label>
                                                    <input type="text" name="total_landing_acre" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total Area with Hari(s)</label>
                                                    <input type="text" name="total_area_with_hari" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total self cultivated land</label>
                                                    <input type="text" name="total_area_cultivated_land" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total fallow land</label>
                                                    <input type="text" name="total_fallow_land" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row " id="no_title_section">
                                            <h6>Title</h6>
                                            <div class="row no_title-default-row" >
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="title_name[]" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">CNIC Number </label>
                                                    <input type="text" name="title_cnic[]" class="form-control">
                                                </div>
                                                <div class="mb-2 col-md-2">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" name="title_number[]" class="form-control">
                                                </div>
                                                <div class="mb-2 col-md-2">
                                                    <label class="form-label">Total Area (Acre)</label>
                                                    <input type="text" name="title_area[]" class="form-control">
                                                </div>
                                                <div class="mb-2 col-md-2">
                                                    <label class="form-label" style="color:transparent">.</label>
                                                    <br><button class="btn btn-success" id="add_no_title_btn">ADD</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="crops_section">
                                            <h6>Crop Status</h6>
                                            <div class="row crop-default-row" >
                                                <div class="mb-4 col-md-4">
                                                    <label class="form-label">Crops</label>
                                                    <input type="text" name="crops[]" class="form-control">
                                                </div>
                                                <div class="mb-4 col-md-4">
                                                    <label class="form-label">Area</label>
                                                    <input type="text" name="crop_area[]" class="form-control">
                                                </div>
                                                <div class="mb-2 col-md-2">
                                                    <label class="form-label">Average Yeild</label>
                                                    <input type="text" name="crop_average_yeild[]" class="form-control">
                                                </div>
                                                <div class="mb-2 col-md-2">
                                                    <label class="form-label" style="color:transparent">.</label>
                                                    <br><button class="btn btn-success" id="add_crops_btn">ADD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-1" onclick="nextStep(2)">Next</button>
                                </div>

                                <div class="step step-2" style="display: none;">
                                    <div class="row mt-2">
                                        <div class="row py-2" id="physical_assets_section">
                                            <h6>Physical Assets Currently Owned </h6>
                                            <div class="row physical_asset-default-row" >
                                                <div class="mb-8 col-md-8">
                                                    <label class="form-label">Items</label>
                                                    <input type="text" name="physical_asset_item[]" class="form-control">
                                                </div>
                                                <div class="mb-2 col-md-2">
                                                    <label class="form-label" style="color:transparent">.</label>
                                                    <br><button class="btn btn-success" id="add_physical_assets_btn">ADD</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row py-2" id="poultry_assets_section">
                                            <h6>Livestock and Poultry Assets Currently Owned</h6>
                                            <div class="row poultry_asset-default-row" >
                                                <div class="mb-4 col-md-4">
                                                    <label class="form-label">Animal Name</label>
                                                    <input type="text" name="animal_name[]" class="form-control">
                                                </div>
                                                <div class="mb-4 col-md-4">
                                                    <label class="form-label">Numbers</label>
                                                    <input type="text" name="animal_qty[]" class="form-control">
                                                </div>
                                                <div class="mb-2 col-md-2">
                                                    <label class="form-label" style="color:transparent">.</label>
                                                    <br><button class="btn btn-success" id="add_poultry_assets_btn">ADD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(1)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(3)">Next</button>
                                </div>

                                <div class="step step-3" style="display: none;">
                                    <div class="row mt-2">
                                        <h6>Source of irrigation</h6>
                                        <div class="row" id="source_of_irrigation_section">
                                            <div class="mb-6 col-md-6" >
                                                <label class="form-label">Source of irrigation</label>
                                                <select name="source_of_irrigation"  class="form-control" id="source_of_irrigation">
                                                    <option value="canal_wall">Canal System</option>
                                                    <option value="tube_wall">Tube Wall</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <h6>Status of water</h6>
                                        <div class="row" id="status_of_water_section">
                                            <div class="mb-3 col-md-3" >
                                                <label class="form-label">Area length</label>
                                                <input type="text" name="area_length" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-3" >
                                                <label class="form-label">line Status</label>
                                                <select class="form-control" aria-multiline="" name="line_status" id="line_status">
                                                    <option>Select Lined/Unlined</option>
                                                    <option value="lined">lined</option>
                                                    <option value="unlined">Unlind</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(2)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(4)">Next</button>
                                </div>

                                <div class="step step-4" style="display: none;">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Bank & Account Details</h4>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Title of Account</label>
                                            <input type="text" name="bank_branch_name" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Account No</label>
                                            <input type="text" name="bank_branch_code" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" name="bank_branch_name" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Branch Name</label>
                                            <input type="text" name="bank_branch_code" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">IBAN</label>
                                            <input type="text" name="bank_account_title" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Branch Code</label>
                                            <input type="text" name="bank_account_number" class="form-control">
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
    @include('agriculture_officer_panel.include.footer_copyright_include')
</footer>

@include('agriculture_officer_panel.include.footer_include')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$('#source_of_irrigation').change(function() {
    if($(this).val() == 'tube_wall')
    {
         $('#source_of_irrigation_section').append(`
         <div class="mb-6 col-md-6" id="source_of_energy_section">
            <label class="form-label">Source of energy</label>
            <select name=""  class="form-control" id="source_of_energy">
                <option value="">Electricity</option>
                <option value="">Solar</option>
                <option value="">Fuel</option>
            </select>
            </div>
         `);
    }
    else{
        $('#source_of_energy_section').remove();
    }
});

$('#lined_unlined').change(function() {
    if($(this).val() == 'lined')
    {
        $('#status_of_water_section').append(`
        <div class="mb-6 col-md-6" id="lined_section" >
            <div class="row">
            <div class="mb-6 col-md-6" >
                <label class="form-label">Lined Length</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="mb-6 col-md-6" >
                <label class="form-label">Total Command Area</label>
                <input type="text" name="" class="form-control">
            </div>
            </div>
        </div>
        `);
    }
    else{
        $('#lined_section').remove();
    }
});


crop_row_id=0;
$('#add_crops_btn').click(function(e) {
    e.preventDefault();
    $('.crop-default-row').before(`
    <div class="row " id="crops_row${crop_row_id}">
        <div class="mb-4 col-md-4">
            <label class="form-label">Crops</label>
            <input type="text" name="crops[]" class="form-control">
        </div>
        <div class="mb-4 col-md-4">
            <label class="form-label">Area</label>
            <input type="text" name="crop_area[]" class="form-control">
        </div>
        <div class="mb-2 col-md-2">
            <label class="form-label">Average Yeild</label>
            <input type="text" name="crop_average_yeild[]" class="form-control">
        </div>
        <div class="mb-2 col-md-2">
            <label class="form-label" style="color:transparent">.</label>
            <br><button class="remove_crop_row btn btn-danger" id="${crop_row_id}">Delete</button>
        </div>
    </div>`);
    crop_row_id++;
});

//Remove rows dynamically form
$(document).on('click', '.remove_crop_row', function(e) {
    e.preventDefault();
    var button_id = $(this).attr("id");
    $('#crops_row' + button_id + '').remove();
});



no_title_row_id=0;
$('#add_no_title_btn').click(function(e) {
    e.preventDefault();
    $('.no_title-default-row').before(`
    <div class="row " id="no_title_row${no_title_row_id}">
        <div class="mb-3 col-md-3">
            <label class="form-label">Name</label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="mb-3 col-md-3">
            <label class="form-label">CNIC Number </label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="mb-2 col-md-2">
            <label class="form-label">Contact Number</label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="mb-2 col-md-2">
            <label class="form-label">Total Area (Acre)</label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="mb-2 col-md-2">
            <label class="form-label" style="color:transparent">.</label>
            <br><button class="remove_no_title_row btn btn-danger" id="${no_title_row_id}">Delete</button>
        </div>
    </div>`);
    no_title_row_id++;
});

//Remove rows dynamically form
$(document).on('click', '.remove_no_title_row', function(e) {
    e.preventDefault();
    var button_id = $(this).attr("id");
    $('#no_title_row' + button_id + '').remove();
});





physical_assets_row_id=0;
$('#add_physical_assets_btn').click(function(e) {
    e.preventDefault();
    $('.physical_asset-default-row').before(`
    <div class="row " id="physical_assets_row${physical_assets_row_id}">
        <div class="mb-8 col-md-8">
            <label class="form-label">Items</label>
            <input type="text" name="physical_asset_item[]" class="form-control">
        </div>
        <div class="mb-2 col-md-2">
            <label class="form-label" style="color:transparent">.</label>
            <br><button class="remove_physical_assets_row btn btn-danger" id="${physical_assets_row_id}">Delete</button>
        </div>
    </div>`);
    physical_assets_row_id++;
});

//Remove rows dynamically form
$(document).on('click', '.remove_physical_assets_row', function(e) {
    e.preventDefault();
    var button_id = $(this).attr("id");
    $('#physical_assets_row' + button_id + '').remove();
});


poultry_assets_row_id=0;
$('#add_poultry_assets_btn').click(function(e) {
    e.preventDefault();
    $('.poultry_asset-default-row').before(`
    <div class="row " id="poultry_assets_row${poultry_assets_row_id}">
        <div class="mb-4 col-md-4">
            <label class="form-label">Animal Name</label>
            <input type="text" name="animal_name[]" class="form-control">
        </div>
        <div class="mb-4 col-md-4">
            <label class="form-label">Numbers</label>
            <input type="text" name="animal_qty[]" class="form-control">
        </div>
        <div class="mb-2 col-md-2">
            <label class="form-label" style="color:transparent">.</label>
            <br><button class="remove_poultry_assets_row btn btn-danger" id="${poultry_assets_row_id}">Delete</button>
        </div>
    </div>`);
    poultry_assets_row_id++;
});

//Remove rows dynamically form
$(document).on('click', '.remove_poultry_assets_row', function(e) {
    e.preventDefault();
    var button_id = $(this).attr("id");
    $('#poultry_assets_row' + button_id + '').remove();
});




$('select[name="tehsil"]').on('change', function() {
            var district = $('input[name="district"]').val();

            var tehsil = [$(this).val()];

            if (district && tehsil) {

                $.ajax({
                    url: '{{ route("get-ucs") }}',
                    type: 'GET',
                    data: {
                        district: district,
                        tehsil: tehsil
                    },
                    success: function(response) {
                        // Populate UC dropdown
                        var ucSelect = $('select[name="uc"]');
                        ucSelect.empty();
                        $.each(response.ucs, function(index, value) {
                            ucSelect.append('<option value="' + value + '">' + value + '</option>');
                        });

                        // Populate Tappa dropdown
                        var tappaSelect = $('select[name="tappa"]');
                        tappaSelect.empty();
                        $.each(response.Tappas, function(index, value) {
                            tappaSelect.append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $('select[name="uc"]').empty();
                $('select[name="tappa"]').empty();
            }
        });


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
