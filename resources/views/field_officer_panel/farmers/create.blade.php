@include('field_officer_panel.include.header_include')
<style>
    .progress-indicator {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    #map {
            height: 400px;
            /* Define map container height */
            width: 100%;
            /* Ensure the map takes full width */
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


    .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection--single .select2-selection__rendered{
        line-height: 40px !important;
    }
    .select2-selection--single .select2-selection__arrow{
        top: 8px !important;
    }


    .select2-container--default .select2-selection--multiple {
        padding-top: 5px !important;
    }



    .select2-container--default {
        width: 100% !important;
    }

    .house_type_label{
        margin-right: 2%;
    }

    @media only screen and (max-width: 600px) {
        .step-indicator {
            height: 35px !important;
            width: 35px !important;
            font-size: 7px !important;
        }
        .connector{
            width: 10px !important;
        }

        .house_type_label{
            width: 100% !important;
        }
        .heading-farmer{
            text-align: center;
        }
    }



</style>



 <style>
    .preview {
        display: inline-block;
        margin: 10px;
    }
    .preview img {
        width: 100px;
        height: 100px;
        margin-right: 10px;
    }

    .img-area {
	position: relative;
    /* width: 65%; */
    margin: auto;
    height: 180px;
	/* width: 100%;
	height: 180px; */
	background: #f2f2f2;
	margin-bottom: 10px;
	border-radius: 15px;
	overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.img-area .icon {
	font-size: 100px;
    /* font-size: 60px; */
}
/* .img-area h3 {
	font-size: 20px;
	font-weight: 500;
	margin-bottom: 6px;
} */
.img-area p {
	color: #999;
    width: 80%;
    /* font-size: 10px; */
}
.img-area p span {
	font-weight: 600;
}
.img-area img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	z-index: 100;
}
.img-area::before {
	content: attr(data-img);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, .5);
	color: #fff;
	font-weight: 500;
	text-align: center;
	display: flex;
	justify-content: center;
	align-items: center;
	pointer-events: none;
	opacity: 0;
	transition: all .3s ease;
	z-index: 200;
}
.img-area.active:hover::before {
	opacity: 1;
}
.select-image {
	display: block;
	width: 100%;
	padding: 16px 0;
	border-radius: 15px;
	background: var(--blue);
	color: #fff;
	font-weight: 500;
	font-size: 16px;
	border: none;
	cursor: pointer;
	transition: all .3s ease;
}
.select-image:hover {
	background: var(--dark-blue);
}

.preview{
    max-width: 100%;
    margin: 0;
    margin-bottom: 10px;
    height: 180px;
    border-radius: 10px;
    display: none;
    width: 200px;
    object-fit: contain;
}

.image-upload-card .btn{
    width:50% !important;
}
</style>
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('field_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('field_officer_panel.include.navbar_include')
<!-- [ Header ] end -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />


<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 heading-farmer">
                        <div class="page-header-title">
                            <h2 class="mb-0">Farmer Registration Form</h2>
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
                        <h5>Farmer Registration</h5>
                        @if (session()->has('farmers-registered'))
                            <div class="alert alert-success alert-dismissible fade show mt-4">
                                <strong>Success!</strong> {{ session('farmers-registered') }}.
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger " style="margin-top: 20px">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
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

                            <form id="registrationForm" action="{{ route('farmer-store-by-field-officer') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($data))
                                <input type="hidden" value="{{ $data->id ?? '' }}" name="edit_id">
                                <input type="hidden" value="{{ $data->user_type ?? 'Field_Officer' }}" name="user_type">
                                @endif
                                <div class="step step-1">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Personal Details</h4>
                                        <div class="mb-6 col-md-4">
                                            <label class="form-label">Q1. Name: <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{$data->name ?? ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)">
                                        </div>
                                        <div class="mb-6 col-md-4">
                                            <label class="form-label">Q2.(A) Father/Husband Name: <span class="text-danger">*</span></label>
                                            <input type="text" name="father_name" id="father_name" class="form-control" value="{{$data->father_name ?? ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)">
                                        </div>
                                        <div class="mb-6 col-md-4">
                                            <label class="form-label">Q2.(B) Surname: <span class="text-danger">*</span></label>
                                            <input type="text" name="surname" id="surname" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q3. CNIC No.: <span class="text-danger">*</span></label>
                                            <input type="text" id="cnic" name="cnic" class="form-control" value="{{$data->cnic ?? ''}}"   data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"   >
                                        </div>
                                        <div class="mb-6 col-md-3 py-2">
                                            <label class="form-label">CNIC Issue Date.: <span class="text-danger">*</span></label>
                                            <input type="date" id="cnic_issue_date" name="cnic_issue_date" class="form-control" value="{{$data->cnic_issue_date ?? ''}}"     >
                                        </div>
                                        <div class="mb-6 col-md-3 py-2">
                                            <label class="form-label">CNIC Expiry Date.: <span class="text-danger">*</span></label>
                                            <input type="date" id="cnic_expiry_date" name="cnic_expiry_date" class="form-control" value="{{$data->cnic_expiry_date ?? ''}}"     >
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q4. Mobile No.: <span class="text-danger">*</span></label>
                                            <input type="text" id="mobile" name="mobile" class="form-control" value="{{$data->mobile ?? ''}}"  data-inputmask="'mask': '0399-9999999'" placeholder="XXXX-XXXXXXX"  >
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q5. District</label>
                                            <input type="text" name="district" value="{{ $district }}" value="{{$data->district ?? ''}}" id="district" class="form-control " value="" readonly>
                                        </div>
                                        {{-- <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q6. Taluka: </label>
                                            <select name="tehsil" id="tehsil" class="form-control js-example-basic-single-no-tag" >
                                                <option value="">Select Taluka</option>
                                                    <option value="{{ $tehsil }}" @if(isset($data->tehsil)) {{ ($tehsil == $data->tehsil) ? 'selected':'' }} @endif > {{ $tehsil }} </option>
                                            </select>
                                        </div> --}}

                                        <div class="mb-6 col-md-6 py-2">
                                            <label for="uc">Q7. Union Council: </label>
                                            <select name="uc" id="uc" class="form-control js-example-basic-single">
                                                @if(isset($data->uc) && $data->uc != '')
                                                <option value="{{$data->uc}}">{{$data->uc}}</option>
                                                @endif
                                            </select>
                                        </div>


                                        <div class="mb-6 col-md-6 py-2">
                                            <label for="tappa">Q8. Tappa: </label>
                                            <select name="tappa" id="tappa" class="form-control js-example-basic-single-no-tag">
                                                @if(isset($data->tappa) && $data->tappa != '')
                                                <option value="{{$data->tappa}}">{{$data->tappa}}</option>
                                                @endif
                                            </select>
                                        </div>

{{-- {{dd($data->dah)}} --}}

                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q9. Deh: </label>
                                            <input type="text"  name="dah" value="{{ $data->dah ?? ''}} " class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q10. Village: </label>
                                            <input type="text"  name="village" value="{{$data->village ?? ''}}" class="form-control">
                                        </div>

                                        <div class=" col-md-4 mt-3">
                                            <label class="form-label"><b>Q11. Gender (Tick):</b></label><br>
                                            &nbsp;<label>
                                            <input type="radio" name="gender" value="male" @if(isset($data->gender)) {{ ($data->gender == 'male') ? 'checked':'' }} @endif> Male
                                            </label>
                                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                            <label>
                                            <input type="radio" name="gender" value="female" @if(isset($data->gender)) {{ ($data->gender == 'female') ? 'checked':'' }} @endif> Female
                                            </label>
                                        </div>

{{-- {{asset('public/'.$data->front_id_card)}} --}}

                                        <div class=" col-md-8 mt-3">
                                            <label class="form-label"><b>Q12: Owner Type: </b></label>
                                            <br>

                                            <label>
                                                <input type="checkbox" name="owner_type[]" value="owner" @if(isset($data->owner_type))   @if(is_array(json_decode($data->owner_type))) {{ in_array('owner', json_decode($data->owner_type)) ? 'checked' : '' }}  @endif @endif> 1. Owner
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input type="checkbox" name="owner_type[]" value="makadedar" @if(isset($data->owner_type))  @if(is_array(json_decode($data->owner_type))) {{ in_array('makadedar', json_decode($data->owner_type)) ? 'checked' : '' }}  @endif @endif> 2. Makadedar (Contractor/Leasee)
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input type="checkbox" name="owner_type[]" value="sharecropper" @if(isset($data->owner_type))  @if(is_array(json_decode($data->owner_type))) {{ in_array('sharecropper', json_decode($data->owner_type)) ? 'checked' : '' }}  @endif @endif> 3. Sharecropper/Tenant
                                            </label>
                                        </div>

                                        <div class="row mt-3">

                                            <div class=" col-md-12">
                                                <h6 class="card-title">Q13: Family Compostion and age of dependent:</h6>
                                            </div>
                                            <div style="display:flex">
                                                <div class=" col-md-4 mt-1" style="padding-right: 0 !important;  ">
                                                    <div style="border:1px solid; display:flex;align-items: center; height: 40px; justify-content:center">
                                                        <h6 class="text-center" style="margin: 0 !important;">Gender</h6>
                                                    </div>
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" value="Female" readonly name="" class="form-control" >
                                                    </div>
                                                </div>

                                                <div class=" col-md-4 mt-1" style="padding-right: 0 !important;  padding-left: 0 !important;">
                                                    <div style="border:1px solid; display:flex;align-items: center; height: 40px; justify-content:center">
                                                        <h6 class="text-center" style="margin: 0 !important;">Children < 18 years</h6>
                                                    </div>
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="female_children_under16" value="{{$data->female_children_under16 ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>

                                                <div class=" col-md-4 mt-1" style="  padding-left: 0 !important;">
                                                    <div style="border:1px solid; display:flex;align-items: center; height: 40px; justify-content:center">
                                                        <h6 class="text-center" style="margin: 0 !important;">Adults > 18 years</h6>
                                                    </div>
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="female_Adults_above16" value="{{$data->female_Adults_above16 ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display:flex">
                                                <div class="mb-4 col-md-4 " style="padding-right: 0 !important;  ">
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" value="Male" readonly name="" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="mb-4 col-md-4 " style="padding-right: 0 !important;  padding-left: 0 !important;">
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="male_children_under16" value="{{$data->male_children_under16 ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>

                                                <div class="mb-4 col-md-4 " style="  padding-left: 0 !important;">
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="male_Adults_above16" value="{{$data->male_Adults_above16 ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="mb-4 col-md-4 ">
                                                <label class="form-label"><b>Q14: Next of Kin:  </b>Full Name: </label>
                                                <input type="text" name="full_name_of_next_kin" class="form-control" value="{{$data->full_name_of_next_kin ?? ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <label class="form-label">CNIC NO:<span class="text-danger">*</span></label>
                                                <input type="text" name="cnic_of_next_kin" id="cnic_of_next_kin" class="form-control" value="{{$data->cnic_of_next_kin ?? ''}}" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X" >
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <label class="form-label">Mobile No:</label>
                                                <input type="text" name="mobile_of_next_kin" class="form-control" value="{{$data->mobile_of_next_kin ?? ''}}" data-inputmask="'mask': '0399-9999999'" placeholder="XXXX-XXXXXXX"  >
                                            </div>
                                        </div>

                                        <div class="row" id="">
                                            <div class="mb-12 col-12">
                                                <label class="form-label house_type_label"><b>Q15. House Type:</b></label>
                                                <label>
                                                <input type="radio" name="house_type" value="pakka_house"  @if(isset($data->house_type)) {{ ($data->house_type == 'pakka_house') ? 'checked':'' }} @endif> &nbsp; (1) Pakka House
                                                </label>
                                                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                <label>
                                                <input type="radio" name="house_type" value="kacha_house"  @if(isset($data->house_type)) {{ ($data->house_type == 'kacha_house') ? 'checked':'' }} @endif> &nbsp; (2) Kacha House
                                                </label>
                                                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                <label>
                                                {{-- <input type="radio" name="house_type" value="both_pakka_house_kacha_house"  @if(isset($data->house_type)) {{ ($data->house_type == 'both_pakka_house_kacha_house') ? 'checked':'' }} @endif> &nbsp; (3) Both Pakka & Kacha House --}}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row mt-3" id="">
                                            <div class="mb-12 col-md-12">
                                                <h6>Q16: Landholding:</h6>
                                            </div>
                                            <div class="mb-6 col-md-6 mt-3">
                                                <label class="form-label">(1) Total Landholding (Acres):</label>
                                                <input type="text" name="total_landing_acre" value="{{$data->total_landing_acre ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                            <div class="mb-6 col-md-6 mt-3">
                                                <label class="form-label">(2) Total Area with Hari(s) (Acres):</label>
                                                <input type="text" name="total_area_with_hari" value="{{$data->total_area_with_hari ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <label class="form-label">(3) Total self cultivated land (Acres):</label>
                                                <input type="text" name="total_area_cultivated_land" value="{{$data->total_area_cultivated_land ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <label class="form-label">(4) Total fallow land (Acres):</label>
                                                <input type="text" name="total_fallow_land" value="{{$data->total_fallow_land ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                            <div class="mt-2 col-md-4">
                                                <label class="form-label">(5) Share:</label>
                                                <input type="text" name="land_share" value="{{$data->land_share ?? ''}}" class="form-control" >
                                            </div>
                                            <div class="mt-2 col-md-4">
                                                <label class="form-label">(6) Area as per share:</label>
                                                <input type="text" name="land_area_as_per_share" value="{{$data->land_area_as_per_share ?? ''}}" class="form-control" >
                                            </div>
                                            <div class="mt-2 col-md-4">
                                                <label class="form-label">(7) Survey No(s):</label>
                                                <input type="text" name="survey_no" value="{{$data->survey_no ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)">
                                            </div>
                                        </div>

                                        <div class="row mt-3" class="" id="no_title_section">
                                            <div class=" mt-2 mb-12 col-md-12">
                                                <h6>Particulars of Tenants / Sharecroppers</h6>
                                            </div>
                                            <div class="col-12" style="overflow-x:auto;">
                                                <table id="title_table" class="table table-bordered ">
                                                    <thead>
                                                        <tr>
                                                            <th>Full Name</th>
                                                            <th>Father Name</th>
                                                            <th>CNIC Number</th>
                                                            <th>Contact Number</th>
                                                            <th>Total Area (Acres)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="title_tableBody">


                                                        @if (isset($data) && $data->title_name != '')
                                                        @foreach (json_decode($data->title_name) as $index => $title_name)
                                                        <tr>
                                                            <td><input type="text" name="title_name[]" value="{{$title_name}}" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)"></td>
                                                            <td><input type="text" name="title_father_name[]"  value="{{json_decode($data->title_father_name)[$index]}}" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)"> </td>

                                                            <td><input type="text" name="title_cnic[]" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  value="{{json_decode($data->title_cnic)[$index]}}" class="form-control"></td>
                                                            <td><input type="text" name="title_number[]" data-inputmask="'mask': '0399-9999999'" placeholder="XXXX-XXXXXXX"   value="{{json_decode($data->title_number)[$index]}}" class="form-control"></td>
                                                            <td><input type="text" name="title_area[]" value="{{json_decode($data->title_area)[$index]}}" class="form-control"></td>
                                                            <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="title_name[]" value="" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="title_father_name[]"  value="" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="title_cnic[]" value="" class="form-control" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  >
                                                            </td>
                                                            <td>
                                                                <input type="text" name="title_number[]" value="" class="form-control" data-inputmask="'mask': '0399-9999999'" placeholder="XXXX-XXXXXXX"  >
                                                            </td>
                                                            <td>
                                                                <input type="text" name="title_area[]" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                                            </td>
                                                            <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                        </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12 mt-2" style="justify-content: right; display: flex;">
                                                <button type="button" class="btn btn-primary" id="add_title_row_Btn">Add More</button>
                                            </div>
                                        </div>

                                        <div class="row" id="crops_section">
                                            <h6>Crop Status</h6>
                                            <div class="col-12" style="overflow-x:auto;">
                                                <table id="crop_table" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Season</th>
                                                            <th>Orchard</th>
                                                            <th>Crop(s)</th>
                                                            <th>Area (Acres)</th>
                                                            <th>Average Yield (Mds Per Acres)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="crop_tableBody">

                                                        @if (isset($data) && json_decode($data->crops) != null)
                                                        @foreach (json_decode($data->crops) as $index => $crops)
                                                        <tr>
                                                            <td class="crop_season_td">
                                                                <select name="crop_season[]" style="width:200px" id="" class="crop_season form-control js-example-basic-single">
                                                                    <option value="">Select Season</option>
                                                                    <option value="rabi_season" >Rabi Season</option>
                                                                    <option value="kharif_season">Kharif Season</option>
                                                                    {{-- <option value="orchards">Orchards</option> --}}
                                                                    <option value="{{ json_decode($data->crop_season)[$index] }}" selected>{{ json_decode($data->crop_season)[$index] }}</option>
                                                                </select>

                                                            </td>
                                                            <td class="crops_orchard_td"><input type="text" name="crops_orchard[]" value="{{json_decode($data->crops_orchard)[$index]}}" class="form-control"></td>
                                                            <td>
                                                                <input type="text" name="crops[]" value="{{$crops}}" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="crop_area[]" value="{{json_decode($data->crop_area)[$index]}}" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="crop_average_yeild[]" value="{{json_decode($data->crop_average_yeild)[$index]}}" class="form-control">
                                                            </td>
                                                            <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td class="crop_season_td">
                                                                <select name="crop_season[]" style="width:200px" id="" class="crop_season form-control js-example-basic-single" >
                                                                    <option value="">Select Season</option>
                                                                    <option value="rabi season" >Rabi Season</option>
                                                                    <option value="kharif season">Kharif Season</option>
                                                                    {{-- <option value="orchards">Orchards</option> --}}

                                                                </select>
                                                            </td>
                                                            <td class="crops_orchard_td">
                                                                <input type="text" name="crops_orchard[]" class=" form-control">
                                                            </td>

                                                            <td>
                                                                <input type="text" name="crops[]" value="" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="crop_area[]" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="crop_average_yeild[]" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                                            </td>
                                                            <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                        </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12 mt-2" style="justify-content: right; display: flex;">
                                                <button type="button"  class="btn btn-primary" id="add_crop_row_Btn">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-1" onclick="nextStep(2)">Next</button>
                                </div>

                                <div class="step step-2" style="display: none;">
                                    <div class="row mt-2">
                                        <div class="mb-12  col-md-12 d-flex">
                                            <img src="{{asset('')}}/login_assets/assets.png" alt="" style="height: 25px;width: 25px;">

                                            <h6 class="card-title font-weight-bold" style="line-height: 27px;margin-left: 10px;">
                                                Assets Information</h6>

                                        </div>
                                        <div class="mb-8 col-md-8">
                                            <label class="form-label">Q18: Physical Assets (Farm machinery) - currently owned</label>
                                            <select name="physical_asset_item[]" id="" class="form-control--input js-example-basic-multiple" style="width: 100%" multiple="multiple">
                                                @if (isset($data) && json_decode($data->physical_asset_item) != null)

                                                {{-- @php
                                                    // Decode the JSON and remove duplicates if exists
                                                    $physical_asset_items = json_decode($data->physical_asset_item);
                                                    $unique_items = is_array($physical_asset_items) ? array_unique($physical_asset_items) : [];
                                                    $default_options = [
                                                        'jeep' => 'Jeep',
                                                        'pickup/loader' => 'Pickup/Loader',
                                                        'motorcycle' => 'Motorcycle',
                                                        'bicycles' => 'Bicycles',
                                                        'bullock_cart' => 'Bullock Cart',
                                                        'Tractor(4wheels)' => 'Tractor (4 wheels)',
                                                        'disk_harrow' => 'Disk Harrow',
                                                        'cultivator' => 'Cultivator',
                                                        'tractor_trolley' => 'Tractor Trolley',
                                                        'plough' => 'Plough (wood or metal)',
                                                        'laser_lever' => 'Laser lever',
                                                        'rotavetor' => 'Rotavetor',
                                                        'thresher' => 'Thresher',
                                                        'harvester' => 'Harvester'
                                                    ];
                                                @endphp

                                                @foreach ($default_options as $value => $label)
                                                    <option value="{{ $value }}"
                                                        @if(in_array($value, $unique_items)) selected @endif>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach --}}

                                                <option value="jeep">Jeep </option>
                                                <option value="pickup/loader">Pickup/loader</option>
                                                <option value="motorcycle">Motorcycle</option>
                                                <option value="bicycles">Bicycles</option>
                                                <option value="bullock cart">Bullock Cart</option>
                                                <option value="Tractor(4wheels)">Tractor (4 wheels)</option>
                                                <option value="disk_harrow">Disk Harrow</option>
                                                <option value="cultivator">Cultivator</option>
                                                <option value="tractor trolley">Tractor Trolley</option>
                                                <option value="plough">Plough (wood or metal)</option>
                                                <option value="laser lever">Laser lever</option>
                                                <option value="rotavetor">Rotavetor</option>
                                                <option value="thresher">Thresher</option>
                                                <option value="harvester">Harvester</option>
                                                @foreach (json_decode($data->physical_asset_item) as $physical_asset_item)
                                                    <option value="{{$physical_asset_item}}" selected>{{$physical_asset_item}} </option>
                                                @endforeach
                                                @else
                                                <option value="jeep">Jeep </option>
                                                <option value="pickup/loader">Pickup/loader</option>
                                                <option value="motorcycle">Motorcycle</option>
                                                <option value="bicycles">Bicycles</option>
                                                <option value="bullock cart">Bullock Cart</option>
                                                <option value="Tractor(4wheels)">Tractor (4 wheels)</option>
                                                <option value="disk_harrow">Disk Harrow</option>
                                                <option value="cultivator">Cultivator</option>
                                                <option value="tractor trolley">Tractor Trolley</option>
                                                <option value="plough">Plough (wood or metal)</option>
                                                <option value="laser lever">Laser lever</option>
                                                <option value="rotavetor">Rotavetor</option>
                                                <option value="thresher">Thresher</option>
                                                <option value="harvester">Harvester</option>
                                                <option value="Nill">Nill</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2 " id="poultry_assets_section">
                                        <div class="mt-3 col-md-12">
                                            <label>Q19: Livestock and Poultry - assets currently owned</label>
                                        </div>
                                        <div class="col-12 mt-2" style="overflow-x:auto;">
                                            <table id="poultry_assets_table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Type of Animal</th>
                                                        <th>Number</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="poultry_assets_tableBody">
                                                    @if (isset($data) &&  json_decode($data->animal_name) != null)
                                                    @foreach (json_decode($data->animal_name) as $index => $animal_name)
                                                    <tr>
                                                        <td style="width:400px">

                                                            <select name="animal_name[]" style="width:400px" class="form-control js-example-basic-single">
                                                              <option value="">Select Animal</option>
                                                                <option value="Poultry (chicken , duck, etc.)">Poultry (chicken , duck, etc.)</option>
                                                                <option value="Buffalo">Buffalo</option>
                                                                <option value="Cow">Cow</option>
                                                                <option value="Camel">Camel</option>
                                                                <option value="Goat">Goat</option>
                                                                <option value="Sheep">Sheep</option>
                                                                <option value="Horse / Mules">Horse / Mules</option>
                                                                <option value="Donkey">Donkey</option>
                                                                <option value="{{ json_decode($data->animal_name)[$index] }}" selected>{{ json_decode($data->animal_name)[$index] }}</option>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" value="{{json_decode($data->animal_qty)[$index]}}" name="animal_qty[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)">
                                                        </td>
                                                        <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                    </tr>
                                                    @endforeach

                                                    @else
                                                    <tr>
                                                        <td style="width:300px">
                                                            <select name="animal_name[]" style="width:300px" class="form-control js-example-basic-single_animal">
                                                                <option value="">Select Animal</option>
                                                                <option value="Poultry (chicken , duck, etc.)">Poultry (chicken , duck, etc.)</option>
                                                                <option value="Buffalo">Buffalo</option>
                                                                <option value="Cow">Cow</option>
                                                                <option value="Camel">Camel</option>
                                                                <option value="Goat">Goat</option>
                                                                <option value="Sheep">Sheep</option>
                                                                <option value="Horse / Mule">Horse / Mule</option>
                                                                <option value="Donkey">Donkey</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" value="" name="animal_qty[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)">
                                                        </td>
                                                        <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 mt-2" style="justify-content: right; display: flex;">
                                            <button type="button" class="btn btn-primary" id="add_poultry_assets_row_Btn">Add More</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(1)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(3)">Next</button>
                                </div>

                                <div class="step step-3" style="display: none;">
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12 d-flex">
                                            <img src="{{asset('')}}/login_assets/survey.png" alt="" style="height: 25px;width: 25px;">

                                            <h6 class="card-title font-weight-bold" style="line-height: 27px;margin-left: 10px;">
                                               Source of irrigation</h6>
                                        </div>
                                        <div class="row mb-12 col-md-12" id="source_of_irrigation_section">
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Q20:  Source of irrigation</label>
                                                <select name="source_of_irrigation[]" multiple="multiple" class="form-control js-example-basic-multiple2" id="source_of_irrigation">
                                                    <option value="canal well" @if(isset($data)) @if(is_array(json_decode($data->source_of_irrigation))) {{ in_array('canal well', json_decode($data->source_of_irrigation)) ? 'selected' : '' }}  @endif @endif  >(1) Canal System</option>
                                                    <option value="tube well" @if(isset($data)) @if(is_array(json_decode($data->source_of_irrigation))) {{ in_array('tube well', json_decode($data->source_of_irrigation)) ? 'selected' : '' }}  @endif @endif >(2) Tube Well</option>
                                                    <option value="rain barrani" @if(isset($data)) @if(is_array(json_decode($data->source_of_irrigation))) {{ in_array('rain barrani', json_decode($data->source_of_irrigation)) ? 'selected' : '' }}  @endif @endif  >(3) Rain/Barrani</option>
                                                    <option value="kaccha area" @if(isset($data)) @if(is_array(json_decode($data->source_of_irrigation))) {{ in_array('kaccha area', json_decode($data->source_of_irrigation)) ? 'selected' : '' }}  @endif @endif  >(4) Kaccha/Selabi Area</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="mb-12 col-md-12">

                                            <label class="form-label">Q22: Status of Watercourse,</label>
                                        </div>
                                        <div class="row mb-12 col-md-12" id="status_of_water_section">
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Total length (Meters)</label>
                                                <input type="text" name="area_length" class="form-control" value="{{ $data->area_length ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Total Command Area (Acres)</label>
                                                <input type="text" name="total_command_area" class="form-control" value="{{ $data->total_command_area ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Area length</label>
                                                <select class="form-control" id="lined_unlined" name="line_status">
                                                    <option value="">Select Lined/Unlined</option>
                                                    <option value="lined" @if(isset($data->line_status)) {{ ($data->line_status == 'lined') ? 'selected':'' }} @endif>Lined</option>
                                                    <option value="unlined" @if(isset($data->line_status)) {{ ($data->line_status == 'unlined') ? 'selected':'' }} @endif>Unlined</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-3 partially_line_div">
                                                <label class="form-label">Partially Line </label>
                                                <input type="text" name="partially_line" class="form-control" value="{{ $data->partially_line ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(2)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(4)">Next</button>
                                </div>

                                <div class="step step-4" style="display: none;">
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12 d-flex">
                                            <img src="{{asset('')}}/login_assets/bank.png" alt="" style="height: 25px;width: 25px;">

                                            <h6 class="card-title font-weight-bold" style="line-height: 27px;margin-left: 10px;">
                                                Bank & Account Details</h6>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Q23: Title of Account</label>
                                            <input type="text" name="account_title" class="form-control" value="{{$data->account_title ?? ''}}" >
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Q24: Account No</label>
                                            <input type="text" name="account_no" class="form-control" value="{{$data->account_no ?? ''}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q25: Bank Name</label>
                                            <input type="text" name="bank_name"  class="form-control" value=" {{$data->bank_name ?? ''}}">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q26: Branch Name</label>
                                            <input type="text" name="branch_name" value="{{$data->branch_name ?? ''}}" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q27: IBAN</label>
                                            <input type="text" name="IBAN_number" value="{{$data->IBAN_number ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').slice(0, 24)" >
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q28: Branch Code</label>
                                            <input type="text" name="branch_code" value="{{$data->branch_code ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="mb-6 col-md-6">
                                            <h6>GPS Cordinates <span class="text-danger">*</span></h6>
                                            <label class="form-label">GPS Coordinates of Agriculture land</label><br>
                                            <div class="d-flex"  style="justify-content: space-between; ">

                                                 <a href="javascript:void(0)" id="gpsButton" class="btn btn-primary" style="    display: flex; align-items: center;">GPS</a> &nbsp;

                                                <input type="text" id="locationInput" class="form-control">
                                            </div>
                                            <input type="hidden" name="GpsCordinates" id="GpsCordinates">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <!-- Button trigger modal --><h6>Geo Fencing <span class="text-danger">*</span></h6>
                                            <label class="form-label">Geo Fencing of Agriculture land</label><br>

                                            <div class="d-flex"  style="justify-content: space-between; ">
                                                <input type="hidden" name="FancingCoordinates" id="FancingCoordinates">
                                                <button type="button" class="btn btn-primary " style="    margin-right: 1%;" id="abc" data-toggle="modal" data-target="#exampleModal">
                                                    Click
                                                </button>

                                                <input type="hidden" name="sq_meters_hidden" id="sq_meters_hidden">
                                                <input type="hidden" name="sq_yards_hidden" id="sq_yards_hidden">
                                                <input type="hidden" name="acres_hidden" id="acres_hidden">


                                                <input type="readonly" id="FancingCoordinatesLocationInput"  class="form-control ">
                                            </div>


                                        </div>
                                        <style>
                                            #map {
                                                height: 500px;
                                                width: 100%;
                                            }
                                            .search-container {
                                                position: relative;
                                                max-width: 100%;
                                                /* margin-bottom: 10px; */
                                            }
                                            #locationSearch {
                                                width: 100%;
                                                padding: 8px;
                                                border: 1px solid #ccc;
                                                border-radius: 4px;
                                            }
                                            .search-results {
                                                position: absolute;
                                                width: 94%;
                                                background: white;
                                                /* border: 1px solid #ddd; */
                                                max-height: 200px;
                                                overflow-y: auto;
                                                z-index: 999999999999;
                                            }
                                            .search-item {
                                                padding: 10px;
                                                cursor: pointer;
                                                border-bottom: 1px solid #ddd;
                                            }
                                            .search-item:hover {
                                                background: #f1f1f1;
                                            }


                                            /* Loader CSS */
                                                .mini-loader {
                                                    display: none; /* Hidden by default */
                                                    position: absolute;
                                                    right: 30px;
                                                    top: 30%;
                                                    transform: translateY(-50%);
                                                    width: 18px;
                                                    height: 18px;
                                                    border: 3px solid #f3f3f3;
                                                    border-top: 3px solid #3498db;
                                                    border-radius: 50%;
                                                    animation: spin 1s linear infinite;
                                                }

                                                @keyframes spin {
                                                    0% { transform: rotate(0deg); }
                                                    100% { transform: rotate(360deg); }
                                                }

                                        </style>
                                        <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document" style="        max-width: 600px;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="search-container col-12 col-md-12">
                                                            <input type="text" id="locationSearch" placeholder="Search location...">
                                                            <div id="searchResults" class="search-results"></div>
                                                            <div id="mini-loader" class="mini-loader"></div> <!-- Loader -->
                                                        </div>
                                                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                    </div>
                                                    <div class="modal-body">

                                                        <div id="map"></div> <!-- Map container -->
                                                        <div style="display: flex ;     justify-content: space-between;     font-size: 15px;     margin-top: 2%;     margin-bottom: 0%;">
                                                            <p id="sq_meters" style="    margin-bottom: -2%;"></p>
                                                            <p id="sq_yards" style="    margin-bottom: -2%;"> </p>
                                                            <p id="acres" style="    margin-bottom: -2%;"></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" style="    justify-content: space-between;">
                                                        <button type="button"  id="calculateAreaBtn" class="btn btn-info" onclick="calculateArea()">Calculate Area</button>

                                                        <button type="button" class="btn btn-danger" id="removeMarkerBtn">Remove Last Marker</button>
                                                        <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>

                                                        <button type="button" class="btn btn-primary save-modal" id="geoFancingModalSaveBtn" data-bs-dismiss="modal">Save changes</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(3)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-5" onclick="nextStep(5)">Next</button>
                                </div>

                                <div class="step step-5" style="display: none;">
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12 d-flex">
                                            <img src="{{asset('')}}/login_assets/contract.png" alt="" style="height: 25px;width: 25px;">

                                            <h6 class="card-title" style="line-height: 27px;margin-left: 10px;">
                                                Q29: DOCUMENTS UPLOADED/ COLLECTED</h6>
                                        </div>
                                        {{-- <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">CNIC FRONT <span class="text-danger" > *</span> <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="front_id_card" class="form-control checkfiles" onchange="checkFiles()">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">CNIC BACK <span class="text-danger" > *</span> <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="back_id_card" class="form-control checkfiles" onchange="checkFiles()">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Form VII / Registry from Micro (Mandatory)<span class="text-danger" > *</span> <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="form_seven_pic" class="form-control checkfiles" onchange="checkFiles()">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Forms VII A/ Affidavit/ Heirship (Land Documents)  <span class="text-danger" > *</span> <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="upload_land_proof" class="form-control checkfiles" onchange="checkFiles()">
                                        </div>

                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Photo  <span class="text-danger" > *</span> <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="upload_farmer_pic" class="form-control checkfiles" onchange="checkFiles()">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Others<br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="upload_other_attach" class="form-control " >
                                        </div> --}}


                                        <div class="card mb-4 " style="margin: 1%; width:30%">
                                            <div class="card-body" style="max-width: 400px;width: 100%;background: #fff;padding: 30px;border-radius: 30px;">
                                              <div class="text-center image-upload-card">
                                                  <h6 class="mb-4">CNIC FRONT <span class="text-danger" > *</span></h6>
                                                  @if(isset($data) && $data->front_id_card != null) <input type="hidden"  class="old_image  old_checkfiles old_checkfile_front_id_card" name="old_front_id_card" value="1" > @endif
                                                  <input type="file"  class="image-input checkfiles checkfile_front_id_card" name="front_id_card" accept="image/*" hidden>
                                                  <div class="img-area upload-image" id="img-area" @if(isset($data) && $data->front_id_card != null) style="display: none " @endif   >
                                                      <i class='bx bxs-cloud-upload icon' ></i>
                                                      <p>Image size must be <span>500KB</span></p>
                                                  </div>
                                                  <img class="preview" src=" @if(isset($data) && $data->front_id_card != null) {{asset('').'fa_farmers/front_id_card/'.$data->front_id_card}} @endif"  @if(isset($data) && $data->front_id_card != null) style="display: unset " @endif>
                                                  <button type="button"   class="btn btn-outline-primary w-100 upload-image upload-image-btn" @if(isset($data) && $data->front_id_card != null) style="display: none " @endif>Upload</button>
                                                  <button type="button" class="btn btn-outline-danger w-100 remove-button" @if(isset($data) && $data->front_id_card != null) style="display: unset " @else style="display: none;margin-top:20px" @endif  >Remove</button>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 " style="margin: 1%; width:30%">
                                            <div class="card-body" style="max-width: 400px;width: 100%;background: #fff;padding: 30px;border-radius: 30px;">
                                              <div class="text-center image-upload-card">
                                                  <h6 class="mb-4">CNIC BACK <span class="text-danger" > *</span></h6>
                                                  @if(isset($data) && $data->back_id_card != null) <input type="hidden"  class="old_image old_checkfiles old_checkfile_back_id_card" name="old_back_id_card" value="1" > @endif
                                                  <input type="file"  class="image-input checkfiles checkfile_back_id_card" name="back_id_card" accept="image/*" hidden>
                                                  <div class="img-area upload-image" id="img-area" @if(isset($data) && $data->back_id_card != null) style="display: none " @endif   >
                                                      <i class='bx bxs-cloud-upload icon' ></i>
                                                      <p>Image size must be <span>500KB</span></p>
                                                  </div>
                                                  <img class="preview" src=" @if(isset($data) && $data->back_id_card != null) {{asset('').'fa_farmers/back_id_card/'.$data->back_id_card}} @endif"  @if(isset($data) && $data->back_id_card != null) style="display: unset " @endif>
                                                  <button type="button"   class="btn btn-outline-primary w-100 upload-image upload-image-btn" @if(isset($data) && $data->back_id_card != null) style="display: none " @endif>Upload</button>
                                                  <button type="button" class="btn btn-outline-danger w-100 remove-button" @if(isset($data) && $data->back_id_card != null) style="display: unset " @else style="display: none;margin-top:20px" @endif  >Remove</button>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 " style="margin: 1%; width:30%">
                                            <div class="card-body" style="max-width: 400px;width: 100%;background: #fff;padding: 30px;border-radius: 30px;">
                                              <div class="text-center image-upload-card">
                                                  <h6 class="mb-4">Form VII / Registry from Micro (Mandatory) <span class="text-danger" > *</span></h6>
                                                  @if(isset($data) && $data->form_seven_pic != null) <input type="hidden"  class="old_image old_checkfiles old_checkfile_form_seven_pic" name="old_form_seven_pic" value="1" > @endif
                                                  <input type="file"  class="image-input checkfiles checkfile_form_seven_pic" name="form_seven_pic" accept="image/*" hidden>
                                                  <div class="img-area upload-image" id="img-area" @if(isset($data) && $data->form_seven_pic != null) style="display: none " @endif   >
                                                      <i class='bx bxs-cloud-upload icon' ></i>
                                                      <p>Image size must be <span>500KB</span></p>
                                                  </div>
                                                  <img class="preview" src=" @if(isset($data) && $data->form_seven_pic != null) {{asset('').'fa_farmers/form_seven_pic/'.$data->form_seven_pic}} @endif"  @if(isset($data) && $data->form_seven_pic != null) style="display: unset " @endif>
                                                  <button type="button"   class="btn btn-outline-primary w-100 upload-image upload-image-btn" @if(isset($data) && $data->form_seven_pic != null) style="display: none " @endif>Upload</button>
                                                  <button type="button" class="btn btn-outline-danger w-100 remove-button" @if(isset($data) && $data->form_seven_pic != null) style="display: unset " @else style="display: none;margin-top:20px" @endif  >Remove</button>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 " style="margin: 1%; width:30%">
                                            <div class="card-body" style="max-width: 400px;width: 100%;background: #fff;padding: 30px;border-radius: 30px;">
                                              <div class="text-center image-upload-card">
                                                  <h6 class="mb-4">Forms VIII A/ Affidavit/ Heirship (Land Documents) <span class="text-danger" > </span></h6>
                                                  @if(isset($data) && $data->upload_land_proof != null) <input type="hidden"  class="old_image old_checkfiles old_checkfile_upload_land_proof" name="old_upload_land_proof" value="1" > @endif
                                                  <input type="file"  class="image-input checkfiles checkfile_upload_land_proof" name="upload_land_proof" accept="image/*" hidden>
                                                  <div class="img-area upload-image" id="img-area" @if(isset($data) && $data->upload_land_proof != null) style="display: none " @endif   >
                                                      <i class='bx bxs-cloud-upload icon' ></i>
                                                      <p>Image size must be <span>500KB</span></p>
                                                  </div>
                                                  <img class="preview" src=" @if(isset($data) && $data->upload_land_proof != null) {{asset('').'fa_farmers/upload_land_proof/'.$data->upload_land_proof}} @endif"  @if(isset($data) && $data->upload_land_proof != null) style="display: unset " @endif>
                                                  <button type="button"   class="btn btn-outline-primary w-100 upload-image upload-image-btn" @if(isset($data) && $data->upload_land_proof != null) style="display: none " @endif>Upload</button>
                                                  <button type="button" class="btn btn-outline-danger w-100 remove-button" @if(isset($data) && $data->upload_land_proof != null) style="display: unset " @else style="display: none;margin-top:20px" @endif  >Remove</button>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 " style="margin: 1%; width:30%">
                                            <div class="card-body" style="max-width: 400px;width: 100%;background: #fff;padding: 30px;border-radius: 30px;">
                                              <div class="text-center image-upload-card">
                                                  <h6 class="mb-4">Photo <span class="text-danger" > *</span></h6>
                                                  @if(isset($data) && $data->upload_farmer_pic != null) <input type="hidden"  class="old_image old_checkfiles old_checkfile_upload_farmer_pic" name="old_upload_farmer_pic" value="1" > @endif
                                                  <input type="file"  class="image-input checkfiles checkfile_upload_farmer_pic" name="upload_farmer_pic" accept="image/*" hidden>
                                                  <div class="img-area upload-image" id="img-area" @if(isset($data) && $data->upload_farmer_pic != null) style="display: none " @endif   >
                                                      <i class='bx bxs-cloud-upload icon' ></i>
                                                      <p>Image size must be <span>500KB</span></p>
                                                  </div>
                                                  <img class="preview" src=" @if(isset($data) && $data->upload_farmer_pic != null) {{asset('').'fa_farmers/upload_farmer_pic/'.$data->upload_farmer_pic}} @endif"  @if(isset($data) && $data->upload_farmer_pic != null) style="display: unset " @endif>
                                                  <button type="button"   class="btn btn-outline-primary w-100 upload-image upload-image-btn" @if(isset($data) && $data->upload_farmer_pic != null) style="display: none " @endif>Upload</button>
                                                  <button type="button" class="btn btn-outline-danger w-100 remove-button" @if(isset($data) && $data->upload_farmer_pic != null) style="display: unset " @else style="display: none;margin-top:20px" @endif  >Remove</button>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 " style="margin: 1%; width:30%">
                                            <div class="card-body" style="max-width: 400px;width: 100%;background: #fff;padding: 30px;border-radius: 30px;">
                                              <div class="text-center image-upload-card">
                                                  <h6 class="mb-4">Others</h6>
                                                  @if(isset($data) && $data->upload_other_attach != null) <input type="hidden"  class="old_image " name="old_upload_other_attach" value="1" > @endif
                                                  <input type="file"  class="image-input" name="upload_other_attach" accept="image/*" hidden>
                                                  <div class="img-area upload-image" id="img-area" @if(isset($data) && $data->upload_other_attach != null) style="display: none " @endif   >
                                                      <i class='bx bxs-cloud-upload icon' ></i>
                                                      <p>Image size must be <span>500KB</span></p>
                                                  </div>
                                                  <img class="preview" src=" @if(isset($data) && $data->upload_other_attach != null) {{asset('').'fa_farmers/upload_other_attach/'.$data->upload_other_attach}} @endif"  @if(isset($data) && $data->upload_other_attach != null) style="display: unset " @endif>
                                                  <button type="button"   class="btn btn-outline-primary w-100 upload-image upload-image-btn" @if(isset($data) && $data->upload_other_attach != null) style="display: none " @endif>Upload</button>
                                                  <button type="button" class="btn btn-outline-danger w-100 remove-button" @if(isset($data) && $data->upload_other_attach != null) style="display: unset " @else style="display: none;margin-top:20px" @endif  >Remove</button>
                                              </div>
                                            </div>
                                        </div>


                                        {{--
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Cheque Picture Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                            <input type="file" name="upload_cheque_pic" class="form-control">
                                        </div>
                                        --}}
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(4)">Previous</button>
                                    <button type="submit" class="btn btn-primary mt-5" id="submitbtn"  >Submit</button>

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
    @include('field_officer_panel.include.footer_copyright_include')
</footer>

@include('field_officer_panel.include.footer_include')

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.min.css
" rel="stylesheet">

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script src="{{asset('assets/js/inputMask.js')}}"></script>
<script>

$(document).ready(function () {
    $("input").inputmask(); // Apply mask only to input fields


    $(":input").inputmask({
    inputEventOnly: true  // Forces Inputmask to work on mobile
});



});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date().toISOString().split("T")[0];
        document.getElementById("cnic_expiry_date").setAttribute("min", today);
    });
</script>


        <script>



        // $(document).on('change','.crop_season', function(event) {
        //     event.preventDefault();
        //     $(this).closest('tr').find('.crops_orchard_td').remove();
        //     if($(this).val() == 'kharif season'){
        //         $(this).closest('tr').find('.crop_season_td').after(`
        //         <td class="crops_orchard_td">
        //             <select name="crops_orchard[]" class=" form-control">
        //                 <option>Select Orchard</option>
        //                 <option value="test1">test1</option>
        //                 <option value="test2">test2</option>
        //             </select>
        //         </td>`);
        //     }
        //     else if($(this).val() == 'rabi season'){
        //        $(this).closest('tr').find('.crop_season_td').after(`
        //         <td class="crops_orchard_td">
        //             <select name="crops_orchard[]" class=" form-control">
        //                 <option>Select Orchard</option>
        //                 <option value="test1">test1</option>
        //                 <option value="test2">test2</option>
        //             </select>
        //         </td>`);
        //     }
        //     else{
        //        $(this).closest('tr').find('.crop_season_td').after(`
        //         <td class="crops_orchard_td">
        //             <input type="text" name="crops_orchard[]" class=" form-control">
        //         </td>`);
        //     }
        // });


         $('#registrationForm').on('submit', function(event) {
            $('#submitbtn').attr('disabled', true); // Disable the submit button
            event.preventDefault();
                var url = $(this).attr('action');
                var formData = new FormData(this);
                // data =
                $.ajax({
                    url: url,
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    complete: function () {
                    },
                    success: function (data) {
                        if (data['errors'] !== undefined) {
                            errors = data['errors']
                            $_html = "";
                            for (error in errors) {
                                $_html += "<p class='m-1 text-danger'><strong>" + errors[error][0] + "</strong></p>";
                            }
                            Swal.fire({
                                title: "Errors!",
                                // text: "You clicked the button!",
                                icon: "error",
                                html: $_html
                            });
                        }

                        if(data['success'] !== undefined){
                            Swal.fire({
                                title: "Success!",
                                text: data['success'],
                                icon: "success",
                            });
                            setTimeout(function () {
                                window.location.reload(true);
                            }, 600);
                        }
                    }
                });
            $('#submitbtn').attr('disabled', false); // Disable the submit button

            });

            // // Initialize map to Hyderabad, Pakistan with zoom level 13
            // var map = L.map('map').setView([25.3960, 68.3578], 13); // Coordinates for Hyderabad, Pakistan

            // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            // }).addTo(map);

            // var markers = [];
            // var lineCoordinates = [];
            // var polyline;

            // // Function to update hidden input field with coordinates
            // function updateCoordinatesInput() {
            //     document.getElementById('FancingCoordinates').value = JSON.stringify(lineCoordinates);
            // }

            // map.on('click', function(e) {
            //     var lat = e.latlng.lat;
            //     var lng = e.latlng.lng;

            //     var marker = L.marker([lat, lng]).addTo(map);
            //     marker.bindPopup('<b>You clicked at:</b><br>Latitude: ' + lat.toFixed(4) + '<br>Longitude: ' + lng.toFixed(4)).openPopup();

            //     markers.push(marker);
            //     lineCoordinates.push([lat, lng]);

            //     // If a polyline exists, remove it
            //     if (polyline) {
            //         map.removeLayer(polyline);
            //     }

            //     // If there are at least two markers, draw a polyline
            //     if (lineCoordinates.length > 1) {
            //         polyline = L.polyline(lineCoordinates, {
            //             color: 'blue',
            //             weight: 4
            //         }).addTo(map);
            //     }
            //     updateCoordinatesInput();
            // });

            // // Bootstrap modal 'shown' event triggers map resizing
            // $('#exampleModal').on('shown.bs.modal', function() {

            //     map.invalidateSize(); // This will force the map to recalculate its size once the modal is fully shown
            // });

            // // Add functionality to remove the last marker
            // document.getElementById('removeMarkerBtn').addEventListener('click', function() {
            //     // If there are markers, remove the last one
            //     if (markers.length > 0) {
            //         var lastMarker = markers.pop(); // Remove the last marker from the array
            //         map.removeLayer(lastMarker); // Remove it from the map

            //         lineCoordinates.pop(); // Remove the corresponding coordinate from the polyline

            //         // If there are remaining markers, redraw the polyline
            //         if (lineCoordinates.length > 1) {
            //             // Remove old polyline if it exists
            //             if (polyline) {
            //                 map.removeLayer(polyline);
            //             }

            //             // Redraw polyline with remaining markers
            //             polyline = L.polyline(lineCoordinates, {
            //                 color: 'blue',
            //                 weight: 4
            //             }).addTo(map);
            //         } else if (polyline) {
            //             // If only one marker remains, remove the polyline
            //             map.removeLayer(polyline);
            //             polyline = null;
            //         }
            //         updateCoordinatesInput();
            //     }
            // });
        </script>

<script>

// $(document).ready(function() {
//     $('body').on('change','.crop_season', function() {
//         const selectedValue = $(this).val();
//         const $selectElement = $(this);

//         // Find the closest <td> element (the one containing the <select>)
//         const $closestTd = $selectElement.closest('td');

//         // Find the appended input field inside the <td>
//         let $nextInput = $closestTd.find('input');

//         // Clear any existing input field if the selection is not 'any_other'
//         if (selectedValue !== 'any_other') {
//             if ($nextInput.length) {
//                 $nextInput.remove(); // Remove the appended input if it exists
//             }
//         }

//         // If 'any_other' is selected, append a new input field in the same <td>
//         if (selectedValue === 'any_other') {
//             // If an input field is already appended, don't append again
//             if (!$nextInput.length) {
//                 const inputField = $('<input>', {
//                     type: 'text',
//                     name: 'other_crop_season[]',
//                     class: 'form-control mt-2',
//                     placeholder: 'Please specify other season'
//                 });

//                 // Append the new input field in the same <td> as the <select>
//                 $closestTd.append(inputField);
//             }
//         }
//     });
// });


$('.js-example-basic-single-no-tag').select2({

});

$('.js-example-basic-single').select2({
                    tags: true, // Enable typing custom values
                    placeholder: "Select or type to add a new option", // Optional placeholder
                });


            checkFiles();


            @if (!isset($data))
            function checkFiles() {
                // Get all the file input elements
                const fileInputs = document.querySelectorAll('.checkfiles');
                let allFilesSelected = true;
                // Check if all file inputs have files selected
                fileInputs.forEach(input => {
                    if (!input.files.length) {
                        allFilesSelected = false;
                    }
                });
                // Enable or disable the submit button based on file selection
                const submitButton = document.getElementById('submitbtn');
                if (allFilesSelected) {
                    submitButton.disabled = false; // Enable the submit button
                } else {
                    submitButton.disabled = true; // Keep the submit button disabled
                }
            }

            @else

            function checkFiles() {
                const old_fileInputs = document.querySelectorAll('.old_checkfiles');
                let old_allFilesSelected = true;
                old_fileInputs.forEach(old_input => {
                    if (old_input.value != '1') {
                        id = '.checkfile_'+$(old_input).attr('name').substring(4);
                        // Ensure the element exists and is a file input
                        let fileInput = $(id)[0]; // Get the DOM element directly
                        // Check if fileInput is valid and has files
                        if (fileInput && fileInput.files) {
                            if (fileInput.files.length == 0) {
                                old_allFilesSelected = false;
                            }
                        }
                    }
                });
                // Enable or disable the submit button based on file selection
                const submitButton = document.getElementById('submitbtn');
                if (old_allFilesSelected) {
                    submitButton.disabled = false; // Enable the submit button
                } else {
                    submitButton.disabled = true; // Keep the submit button disabled
                }
            }
            @endif





            document.getElementById('gpsButton').addEventListener('focus', function(e) {
                e.preventDefault();

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;
                            // Optionally, you can fill the input with coordinates or display elsewhere
                            document.getElementById('locationInput').value = `${latitude}, ${longitude}`;
                            document.getElementById('GpsCordinates').value = `${latitude}, ${longitude}`;
                        },
                        function(error) {
                            console.error('Error getting location:', error);
                        }
                    );
                } else {
                    console.error('Geolocation is not supported by this browser.');
                }
            });

$('#abc').on('click',function(){
    $('#exampleModal').modal('show');
})
    $('#add_title_row_Btn').click(function() {
        const newRow = `
            <tr>
                <td><input type="text" name="title_name[]" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)"></td>
                <td><input type="text" name="title_father_name[]"   class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').slice(0, 30)"></td>
                <td><input type="text" name="title_cnic[]" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  class="form-control"></td>
                <td><input type="text" name="title_number[]" data-inputmask="'mask': '0399-99999999'" maxlength="12" class="form-control"></td>
                <td><input type="text" name="title_area[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
            </tr>
        `;
        $('#title_tableBody').append(newRow);
        $(":input").inputmask();
    });

    // Delete row on clicking "Delete" button
    $('#title_tableBody').on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
    });

    $('#add_crop_row_Btn').click(function() {
        const newRow = `
            <tr>
                <td class="crop_season_td">
                    <select name="crop_season[]" id="" style="width:200px" class="crop_season form-control js-example-basic-single">
                        <option value="" >Select Season</option>
                        <option value="rabi season" >Rabi Season</option>
                        <option value="kharif season">Kharif Season</option>
                    </select>
                </td>
                <td class="crops_orchard_td"><input type="text" name="crops_orchard[]" class="form-control"></td>
                <td><input type="text" name="crops[]" class="form-control"></td>
                <td><input type="text" name="crop_area[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)"></td>
                <td><input type="text" name="crop_average_yeild[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
            </tr>
        `;
        $('#crop_tableBody').append(newRow);
        $('#crop_tableBody').find('.js-example-basic-single').last().select2({
            tags: true, // Enable the user to add custom tags
        });
    });

    // Delete row on clicking "Delete" button
    $('#crop_tableBody').on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
    });


    let selectedValues = [];

// Function to handle the selection of animals
function updateSelectedValues() {
    selectedValues = [];
    $('.js-example-basic-single_animal').each(function() {
        let val = $(this).val();
        if (val && !selectedValues.includes(val)) {
            selectedValues.push(val);
        }
    });
}
$('#poultry_assets_tableBody').find('.js-example-basic-single_animal').last().select2({
            tags: true, // Enable the user to add custom tags
        });
// Add new row on button click
$('#add_poultry_assets_row_Btn').click(function() {
    const newRow = `
        <tr>
            <td>
                <select name="animal_name[]" style="width:300px" class="form-control js-example-basic-single_animal">
                    <option value="">Select Animal</option>
                    <option value="Poultry (chicken , duck, etc.)">Poultry (chicken , duck, etc.)</option>
                    <option value="Buffalo">Buffalo</option>
                    <option value="Cow">Cow</option>
                    <option value="Camel">Camel</option>
                    <option value="Goat">Goat</option>
                    <option value="Sheep">Sheep</option>
                    <option value="Horse / Mule">Horse / Mule</option>
                    <option value="Donkey">Donkey</option>
                </select>
            </td>
            <td><input type="text" name="animal_qty[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5)"></td>
            <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
        </tr>
    `;
    $('#poultry_assets_tableBody').append(newRow);

    // Re-initialize select2
    $('#poultry_assets_tableBody').find('.js-example-basic-single_animal').last().select2({
        tags: true,
    });

    // Update selected values after adding the row
    updateSelectedValues();

    // Disable already selected options in the new row
    $('#poultry_assets_tableBody').find('.js-example-basic-single_animal').last().find('option').each(function() {
        let optionValue = $(this).val();
        if (selectedValues.includes(optionValue)) {
            $(this).prop('disabled', true);
        } else {
            $(this).prop('disabled', false);
        }
    });
});

// Delete row on clicking "Delete" button
$('#poultry_assets_tableBody').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
    updateSelectedValues(); // Update selected values when a row is deleted
});

// Disable options on select change
$('#poultry_assets_tableBody').on('change', '.js-example-basic-single_animal', function() {
    updateSelectedValues();

    // Disable options that are already selected elsewhere
    $('.js-example-basic-single_animal').each(function() {
        let currentSelect = $(this);
        let currentValue = currentSelect.val();

        currentSelect.find('option').each(function() {
            let optionValue = $(this).val();

            if (optionValue && selectedValues.includes(optionValue) && optionValue !== currentValue) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }
        });

        // Trigger select2 update
        currentSelect.trigger('change.select2');
    });
});






$('#source_of_irrigation').change(function() {


    if($(this).val().includes('tube well'))
    {
        var oldValues = $('#source_of_energy').val() || [];
        $('#source_of_energy_section').remove();
         $('#source_of_irrigation_section').append(`
         <div class="mb-6 col-md-6" id="source_of_energy_section">
                <label class="form-label">Q21: Source of energy</label>
                <select multiple="multiple" name="source_of_irrigation_engery[]"  class="form-control js-example-basic-multiple" id="source_of_energy">
                    <option value="electricity" >Electricity</option>
                    <option value="solar">Solar</option>
                    <option value="Petrol/Diesel/Gas">Petrol/Diesel/Gas</option>
                </select>
            </div>
         `);
         if (oldValues.length > 0) {
            $('#source_of_energy').val(oldValues).trigger('change');
        }
         $('#source_of_energy_section').find('.js-example-basic-multiple').last().select2({
            tags: true, // Enable the user to add custom tags
        });
    }
    else{
        $('#source_of_energy_section').remove();

    }
});

@if(isset($data))

if('{{$data->source_of_irrigation}}'.includes('tube well')){
    $('#source_of_irrigation_section').append(`
        <div class="mb-6 col-md-6" id="source_of_energy_section">
            <label class="form-label">Q21: Source of energy</label><br>
            <select name="source_of_irrigation_engery[]" multiple="multiple"  class="form-control js-example-basic-multiple" id="source_of_energy">
            @if(is_array(json_decode($data->source_of_irrigation_engery)))
            @foreach (json_decode($data->source_of_irrigation_engery) as $source_of_irrigation_engery)
                <option value=" {{$source_of_irrigation_engery}}" selected> {{$source_of_irrigation_engery}}</option>
            @endforeach
            @endif
            </select>
        </div>
     `);
     $('#source_of_energy_section').find('.js-example-basic-single').last().select2({
        tags: true, // Enable the user to add custom tags
    });
}


if('{{$data->line_status}}' == 'lined'){
    $('#status_of_water_section').append(`
    <div class="mb-3 col-md-3" id="lined_section" >
        <div class="row">
            <div class="mb-12 col-md-12" >
                <label class="form-label">Line length in (Meters)</label>
                <input type="text" name="lined_length" value="{{$data->lined_length}}" class="form-control">
            </div>
        </div>
    </div>
    `);
}

@endif


$('#lined_unlined').change(function() {
    if($(this).val() == 'lined')
    {
        $('#status_of_water_section').append(`
        <div class="mb-3 col-md-3" id="lined_section" >
            <div class="row">
                <div class="mb-12 col-md-12" >
                    <label class="form-label">Line length in (Meters)</label>
                    <input type="text" name="lined_length" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                </div>
            </div>
        </div>
        `);
    }
    else{
        $('#lined_section').remove();
    }
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

formstep = step - 1;
errors = '';

let step1_formdata = {
    name: $('#name').val(),
    father_name: $('#father_name').val(),
    surname: $('#surname').val(),
    cnic: $('#cnic').val(),
    cnic_issue_date: $('#cnic_issue_date').val(),
    cnic_expiry_date: $('#cnic_expiry_date').val(),
    mobile: $('#mobile').val(),
    cnic_of_next_kin: $('#cnic_of_next_kin').val(),
};


if (formstep == 1) {

    // Check if any field is empty
    for (const key in step1_formdata) {
        if (step1_formdata[key] === "" || step1_formdata[key] === null) {
            let formattedKey = key.replace(/_/g, " ");
            errors += `<b><span class="text-danger" > ${formattedKey} field is required. </span> </b> <br>`;

        }
    }

    if (step1_formdata.cnic.includes('_')) {
        errors += `<b><span class="text-danger">CNIC NUMBER IS INVALID.</span></b><br>`;
    }

    if (step1_formdata.mobile.includes('_')) {
        errors += `<b><span class="text-danger">MOBILE NUMBER IS INVALID</span></b><br>`;
    }

    if (step1_formdata.cnic_of_next_kin.includes('_')) {
        errors += `<b><span class="text-danger">CNIC OF NEXT KIN IS INVALID</span></b><br>`;
    }


       // Validate mobile number (should not have more than one '-')
        // let mobileHyphenCount = (step1_formdata.mobile.match(/-/g) || []).length;
        // if (mobileHyphenCount > 1) {
        //     errors += `<b><span class="text-danger">Mobile number should not contain more than one '-' symbol.</span></b><br>`;
        // }

        // // Validate CNIC format (should have exactly two '-')
        // let cnicHyphenCount = (step1_formdata.cnic.match(/-/g) || []).length;
        // if (cnicHyphenCount !== 2) {
        //     errors += `<b><span class="text-danger">CNIC should contain exactly two '-' symbols.</span></b><br>`;
        // }

         // Ensure CNIC does not contain '_'

    if(errors != '')
    {
        Swal.fire({
            title: "Errors!",
            // text: "You clicked the button!",
            icon: "error",
            html: errors
        });
    }


}

let step4_formdata = {
    FancingCoordinates: $('#FancingCoordinates').val(),
    GpsCordinates: $('#GpsCordinates').val(),
};

if (formstep == 4) {


    // Check if any field is empty
    for (const key in step4_formdata) {
        if (step4_formdata[key] === "" || step1_formdata[key] === null) {
            let formattedKey = key.replace(/_/g, " ");
            errors += `<b><span class="text-danger" > ${formattedKey} field is required. </span> </b> <br>`;

        }
    }
    if(errors != '')
    {
        Swal.fire({
            title: "Errors!",
            // text: "You clicked the button!",
            icon: "error",
            html: errors
        });
    }


}




let step5_formdata = {
    front_id_card: $('#front_id_card').val(),
    back_id_card: $('#back_id_card').val(),
    upload_farmer_pic: $('#upload_farmer_pic').val(),
    form_seven_pic: $('#form_seven_pic').val(),
};

if (formstep == 5) {


    // Check if any field is empty
    for (const key in step5_formdata) {
        if (step5_formdata[key] === "" || step1_formdata[key] === null) {
            let formattedKey = key.replace(/_/g, " ");
            errors += `<b><span class="text-danger" > ${formattedKey} field is required. </span> </b> <br>`;

        }
    }
    if(errors != '')
    {
        Swal.fire({
            title: "Errors!",
            // text: "You clicked the button!",
            icon: "error",
            html: errors
        });
    }


}








if(errors == ''){

     // Hide all steps
document.querySelectorAll('.step').forEach(function(stepElement) {
    stepElement.style.display = 'none';
});
// Show the current step
document.querySelector('.step-' + step).style.display = 'block';
updateProgressIndicator(step);

}


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
    // nextStep(1);
</script>





<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/6.5.0/turf.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var map = L.map('map').setView([25.3960, 68.3578], 20); // Hyderabad, Pakistan

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var markers = [];
    var lineCoordinates = [];
    var polyline;

    function updateCoordinatesInput() {
        document.getElementById('FancingCoordinates').value = JSON.stringify(lineCoordinates);
    }

    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // var marker = L.marker([lat, lng]).addTo(map);

           // Create small circle marker
    var marker = L.circleMarker([lat, lng], {
        radius: 5,  // Small circle size
        color: 'blue',
        fillColor: 'blue',
        fillOpacity: 1
    }).addTo(map);

        // marker.bindPopup('<b>You clicked at:</b><br>Latitude: ' + lat.toFixed(4) + '<br>Longitude: ' + lng.toFixed(4)).openPopup();

        markers.push(marker);
        lineCoordinates.push([lat, lng]);

        if (polyline) {
            map.removeLayer(polyline);
        }

        if (lineCoordinates.length > 1) {
            polyline = L.polyline(lineCoordinates, { color: 'blue', weight: 4 }).addTo(map);
        }
        updateCoordinatesInput();
    });

    document.getElementById('locationSearch').addEventListener('input', function () {
            var query = this.value.trim();
            if (query.length < 3) return; // Minimum 3 characters to search

            var bbox = "60.872,23.634,71.180,28.468"; // Sindh's approximate bounding box


            var loader = document.getElementById('mini-loader'); // Get loader element
            loader.style.display = 'inline-block'; // Show loader


            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}&countrycodes=PK&viewbox=${bbox}&bounded=1`)
                .then(response => response.json())
                .then(data => {
                    var resultList = document.getElementById('searchResults');
                    resultList.innerHTML = ''; // Clear previous results

                    data.forEach(place => {
                        var listItem = document.createElement('div');
                        listItem.textContent = place.display_name;
                        listItem.classList.add('search-item');
                        listItem.dataset.lat = place.lat;
                        listItem.dataset.lon = place.lon;

                        listItem.addEventListener('click', function () {
                            var lat = parseFloat(this.dataset.lat);
                            var lon = parseFloat(this.dataset.lon);

                            // Move the map to the selected location
                            map.setView([lat, lon], 20);

                            // Add marker
                            // var marker = L.marker([lat, lon]).addTo(map);
                            // marker.bindPopup(`<b>${place.display_name}</b>`).openPopup();

                            // markers.push(marker);
                            // lineCoordinates.push([lat, lon]);

                            // if (polyline) {
                            //     map.removeLayer(polyline);
                            // }

                            // if (lineCoordinates.length > 1) {
                            //     polyline = L.polyline(lineCoordinates, { color: 'blue', weight: 4 }).addTo(map);
                            // }
                            // updateCoordinatesInput();

                            resultList.innerHTML = ''; // Clear search results
                            document.getElementById('locationSearch').value = ''; // Clear input field
                        });

                        resultList.appendChild(listItem);
                    });
                    setTimeout(() => {
                        loader.style.display = 'none'; // Hide loader after results are loaded
                    }, 10000); // 200ms delay before closing

            })
            .catch(error => {
                console.error('Error fetching locations:', error);
                loader.style.display = 'none'; // Hide loader if there's an error
            });
        });

     // Fix Map Issue When Modal Opens
     $('#exampleModal').on('shown.bs.modal', function() {
        setTimeout(function() {
            map.invalidateSize();
        }, 300); // Delay to allow modal transition
    });

    function calculateArea() {
    if (lineCoordinates.length < 3) {
        alert("At least 3 points are required to calculate the area!");
        return;
    }

    // Close the shape (first point same as last point)
    let closedCoordinates = [...lineCoordinates, lineCoordinates[0]];

    // Convert to GeoJSON format
    let polygon = turf.polygon([closedCoordinates]);

    // Calculate area in square meters
    let areaSqMeters = turf.area(polygon);

    // Convert area to acres and square yards
    let areaAcres = areaSqMeters * 0.000247105; // 1 sq meter = 0.000247105 acres
    let areaSqYards = areaSqMeters * 1.19599; // 1 sq meter = 1.19599 square yards


    $('#sq_meters').html('Sq Meters: '+areaSqMeters.toFixed(2));
    $('#sq_yards').html('Sq Yards: '+areaSqYards.toFixed(2));
    $('#acres').html('Acres: '+areaAcres.toFixed(4));


    $('#sq_meters_hidden').val(areaSqMeters.toFixed(2));
    $('#sq_yards_hidden').val(areaSqYards.toFixed(2));
    $('#acres_hidden').val(areaAcres.toFixed(4));

    // // Show result
    // alert(`Calculated Area:
    //  ${areaSqMeters.toFixed(2)} sq meters
    //  ${areaAcres.toFixed(4)} acres
    //  ${areaSqYards.toFixed(2)} square yards`);
}


$('#geoFancingModalSaveBtn').on('click', function(){

    calculateArea();
    if($('#sq_meters').html() != ''){

        $('#FancingCoordinatesLocationInput').val($('#sq_meters').html()+' , '+$('#sq_yards').html()+' , '+$('#acres').html());
    }
})


    // Remove last marker functionality
    document.getElementById('removeMarkerBtn').addEventListener('click', function() {
        if (markers.length > 0) {
            var lastMarker = markers.pop();
            map.removeLayer(lastMarker);
            lineCoordinates.pop();

            if (lineCoordinates.length > 1) {
                if (polyline) {
                    map.removeLayer(polyline);
                }
                polyline = L.polyline(lineCoordinates, { color: 'blue', weight: 4 }).addTo(map);
            } else if (polyline) {
                map.removeLayer(polyline);
                polyline = null;
            }
            updateCoordinatesInput();
        }
    });


    document.querySelector(".close-modal").addEventListener("click", function() {
        var modal = document.getElementById('exampleModal');

    // Hide modal
    var bootstrapModal = bootstrap.Modal.getInstance(modal);
    if (bootstrapModal) {
        bootstrapModal.hide();
    }

    // Remove backdrop manually
    document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
    document.body.classList.remove('modal-open'); // Remove the body scroll lock
    });


    document.querySelector(".save-modal").addEventListener("click", function() {
        var modal = document.getElementById('exampleModal');

    // Hide modal
    var bootstrapModal = bootstrap.Modal.getInstance(modal);
    if (bootstrapModal) {
        bootstrapModal.hide();
    }

    // Remove backdrop manually
    document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
    document.body.classList.remove('modal-open'); // Remove the body scroll lock
    });


</script>

</body>

</html>
