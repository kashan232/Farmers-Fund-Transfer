<!doctype html>
<html lang="en">

<head>
    <title>Online Farmers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="/online_farmers_assets/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cms.benazirharicard.gos.pk/online_farmers_assets/css/style.css">
    <link rel="stylesheet" href="https://cms.benazirharicard.gos.pk/online_farmers_assets/css/select2.min.css">
    <meta name="robots" content="noindex, follow">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none !important;
        }

        body {
            font-family: 'Laila', sans-serif !important;
        }

        #map {
            height: 400px;
            /* Define map container height */
            width: 100%;
            /* Ensure the map takes full width */
        }

        #sidebar {
            background: #fff !important;
            width: 400px !important;
            max-width: 400px !important;
        }

        #logo {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            height: 100px;
            /* Adjust height as needed */
        }

        .logo-content {
            font-weight: 700;
            display: flex;
            justify-content: center;
            /* Places items at each end of the flex container */
            align-items: center;
            /* Centers items vertically within the flex container */
            width: 100%;
            /* Adjust width as needed */
            max-width: 100%;
            /* Adjust max-width as needed */
        }

        .logo-content img {
            margin-right: 10px;
            width: 90px;
            height: 90px;
            margin-bottom: 15px;
        }

        #sidebar.active {
            margin-left: -400px !important;
        }


        #sidebar ul li a:hover {
            color: #fff;
            background: #3f8a5c !important;
            border-bottom: 1px solid #3f8a5c !important;
        }

        .active {
            color: #fff;
            background: #3f8a5c !important;
            border-bottom: 1px solid #3f8a5c !important;
        }

        .form-control {
            border: 1px solid #ced4da !important;
        }

        h6 {
            font-weight: 600 !important;
        }

        #content {
            padding: 5rem !important;
        }

        @media (max-width: 768px) {
            #content {
                padding: 0 !important;
            }

            #sidebar {
                display: none !important;
            }
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
            /* margin-left: 300px; */
        }

        .div {
            margin: auto;
        }

        .nav-item button {
            margin-left: 10px;
            border-radius: 40px !important;
            border: none;
            background-color: rgb(223, 255, 223);
            color: green;
            font-weight: 600;
            z-index: 1000;
            margin-top: 10px;
        }

        .button-back-line {
            background-color: green;
            width: 500px;
            height: 3px;
            position: absolute;
            top: 260px;
            left: 470px;
            z-index: -1;
        }

        @media(min-width:200px) and (max-width:1550px) {
            .button-back-line {
                display: none;
            }
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
</head>

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css
" rel="stylesheet">

<body style="background-color: white;">

    <div class="container-fluid">
        <div class="wrapper d-flex align-items-stretch col-lg-11 m-auto">

            <div class="row">
                <div class="div ">
                    <div class="logo-container ">
                        <img src="{{asset('')}}/assets/images/Sindh_Hari_Card.png" alt="logo image" class="#logo-lg" style="max-width:120px;" />

                        <h4 class="mt-2 font-weight-bold">Benazir Hari Card</h4>
                        <h5 class="mt-2 font-weight-bold">Registration Form</h5>
                        <p>Please provide the following information to register for the Benazir Hari Card</p>
                    </div>
                    <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                        <div class="button-back-line"></div>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active step-indicator  step-indicator-1" id="personal-tab" data-bs-toggle="pill" data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info" aria-selected="true" onclick="showStep(1)">Personal Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link step-indicator  step-indicator-2" id="assets-tab" data-bs-toggle="pill" data-bs-target="#assets-info" type="button" role="tab" aria-controls="assets-info" aria-selected="false" onclick="showStep(2)">Assets Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link step-indicator  step-indicator-3" id="sources-tab" data-bs-toggle="pill" data-bs-target="#sources-info" type="button" role="tab" aria-controls="sources-info" aria-selected="false" onclick="showStep(3)">Sources</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link step-indicator  step-indicator-4" id="bank-tab" data-bs-toggle="pill" data-bs-target="#bank-info" type="button" role="tab" aria-controls="bank-info" aria-selected="false" onclick="showStep(4)">Bank & Account Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link step-indicator  step-indicator-5" id="uploads-tab" data-bs-toggle="pill" data-bs-target="#uploads-info" type="button" role="tab" aria-controls="uploads-info" aria-selected="false" onclick="showStep(5)">Uploads Documents</button>
                        </li>
                    </ul>
                </div>

                <div id="content" class="p-4 p-md-5 pt-5">
                    @if (session()->has('farmers-registered'))
                    <script>
                        Swal.fire({
                            title: "Success!",
                            text: "Farmer Registered Succesfully!",
                            icon: "success"
                        });
                    </script>

                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h5>Registration</h5>

                                </div>
                                <div class="card-body">
                                    <form id="registrationForm" action="{{ route('farmer-store-by-field-officer') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($data))
                                        <input type="hidden" value="{{ $data->id ?? '' }}" name="edit_id">
                                        <input type="hidden" value="{{ $data->user_type ?? 'Online' }}" name="user_type">
                                        @endif
                                        <div class="step step-1">
                                            <div class="row mt-2">
                                                <div class="mb-6 col-md-12">
                                                <h4 class="card-title">Personal Details</h4></div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">Q1. Name: <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" value="{{$data->name ?? ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '').slice(0, 30)" >
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">Q2. Father/Husband Name: <span class="text-danger">*</span></label>
                                                    <input type="text" name="father_name" class="form-control" value="{{$data->father_name ?? ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '').slice(0, 30)" >
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
                                                    <input type="text" id="mobile" name="mobile" class="form-control" value="{{$data->mobile ?? ''}}"  data-inputmask="'mask': '0399-99999999'" placeholder="XXXX-XXXXXXX" maxlength="12" >
                                                </div>


                                                <div class="mb-6 col-md-6 py-2">
                                                    <label class="form-label">Q5. District</label>
                                                    <select name="district" id="district" class="form-control" >
                                                        <option value="">Select District</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{ $district->district }}" > {{ $district->district }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="mb-6 col-md-6 py-2">
                                                    <label class="form-label">Q6. Taluka: </label>
                                                    <select name="tehsil" id="tehsils" class="form-control" >
                                                        <option value="">Select Taluka</option>
                                                        {{-- @foreach(json_decode($tehsils) as $tehsil)
                                                            <option value="{{ $tehsil }}" @if(isset($data->tehsil)) {{ ($tehsil == $data->tehsil) ? 'selected':'' }} @endif > {{ $tehsil }} </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>

                                                <div class="mb-6 col-md-6 py-2">
                                                    <label for="uc">Q7. Union Council: </label>
                                                    <select name="uc" id="ucs" class="form-control">
                                                        @if(isset($data->uc) && $data->uc != '')
                                                        <option value="{{$data->uc}}">{{$data->uc}}</option>
                                                        @endif
                                                    </select>
                                                </div>


                                                <div class="mb-6 col-md-6 py-2">
                                                    <label for="tappa">Q8. Tappa: </label>
                                                    <select name="tappa" id="tappas" class="form-control">
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
                                                        <input type="checkbox" name="owner_type[]" value="owner" @if(isset($data->owner_type)) {{ ($data->owner_type == 'owner') ? 'checked':'' }} @endif> 1. Owner
                                                    </label>
                                                    &nbsp;
                                                    <label>
                                                        <input type="checkbox" name="owner_type[]" value="makadedar" @if(isset($data->owner_type)) {{ ($data->owner_type == 'makadedar') ? 'checked':'' }} @endif> 2. Makadedar (Contractor/Leasee)
                                                    </label>
                                                    &nbsp;
                                                    <label>
                                                        <input type="checkbox" name="owner_type[]" value="sharecropper" @if(isset($data->owner_type)) {{ ($data->owner_type == 'sharecropper') ? 'checked':'' }} @endif> 3. Sharecropper/Tenant
                                                    </label>
                                                </div>

                                                <div class=" col-md-12 mt-3 row" style="width:100%" >

                                                    <div class=" col-md-12">
                                                        <h6 class="card-title">Q13: Family Compostion and age of dependent:</h6>
                                                    </div>
                                                    <div style="display:flex"  class=" col-md-12">
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
                                                    <div style="display:flex"  class=" col-md-12">
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

                                                <div class=" col-md-12  row" >

                                                    <div class="mb-4 col-md-4 ">
                                                        <label class="form-label"><b>Q14: Next of Kin:  </b>Full Name: </label>
                                                        <input type="text" name="full_name_of_next_kin" class="form-control" value="{{$data->full_name_of_next_kin ?? ''}}">
                                                    </div>
                                                    <div class="mb-4 col-md-4 ">
                                                        <label class="form-label">CNIC NO: <span class="text-danger">*</span></label>
                                                        <input type="text" name="cnic_of_next_kin" class="form-control" value="{{$data->cnic_of_next_kin ?? ''}}" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X" >
                                                    </div>
                                                    <div class="mb-4 col-md-4 ">
                                                        <label class="form-label">Mobile No:</label>
                                                        <input type="text" name="mobile_of_next_kin" class="form-control" value="{{$data->mobile_of_next_kin ?? ''}}" data-inputmask="'mask': '0399-99999999'" maxlength="12">
                                                    </div>
                                                </div>

                                                <div class="" id="">
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

                                                <div class=" row col-md-12  mt-3" id="" style="width:100%">
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

                                                <div class="row col-md-12 mt-3" class="" id="no_title_section">
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
                                                                    <td><input type="text" name="title_name[]" value="{{$title_name}}" class="form-control"></td>
                                                                    <td><input type="text" name="title_father_name[]"  value="{{json_decode($data->title_father_name)[$index]}}" class="form-control"></td>

                                                                    <td><input type="text" name="title_cnic[]" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  value="{{json_decode($data->title_cnic)[$index]}}" class="form-control"></td>
                                                                    <td><input type="text" name="title_number[]" data-inputmask="'mask': '0399-99999999'"  placeholder="XXXX-XXXXXXX"  maxlength="12" value="{{json_decode($data->title_number)[$index]}}" class="form-control"></td>
                                                                    <td><input type="text" name="title_area[]" value="{{json_decode($data->title_area)[$index]}}" class="form-control"></td>
                                                                    <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                                </tr>
                                                                @endforeach
                                                                @else
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" name="title_name[]" value="" class="form-control">
                                                                    </td>
                                                                    <td><input type="text" name="title_father_name[]"  value="" class="form-control"></td>

                                                                    <td>
                                                                        <input type="text" name="title_cnic[]" value="" class="form-control" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  >
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="title_number[]" value="" class="form-control" data-inputmask="'mask': '0399-99999999'" placeholder="XXXX-XXXXXXX" maxlength="12">
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

                                                <div class="row col-md-12" id="crops_section">
                                                    <div class="col-12" ><h6>Crop Status</h6></div>
                                                    <div class="col-12" style="overflow-x:auto;">
                                                        <table id="crop_table" class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Season</th>
                                                                    <th>Orchard</th>
                                                                    <th>Crop(s)</th>
                                                                    <th>Area (Acres)</th>
                                                                    <th>Average Yield (Per Acres)</th>
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
                                                                            <option value="rabi_season" >Rabi Season</option>
                                                                            <option value="kharif_season">Kharif Season</option>
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
                                                                'car/jeep' => 'Car/Jeep',
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

                                                        <option value="car/jeep">Car/Jeep </option>
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
                                                        <option value="car/jeep">Car/Jeep </option>
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
                                                                        <option value="Poultry (chicken , ducks, etc.)">Poultry (chicken , ducks, etc.)</option>
                                                                        <option value="Buffalo">Buffalo</option>
                                                                        <option value="Cows">Cows</option>
                                                                        <option value="Camels">Camels</option>
                                                                        <option value="Goats">Goats</option>
                                                                        <option value="Sheep">Sheep</option>
                                                                        <option value="Horse / Mules">Horse / Mules</option>
                                                                        <option value="Donkeys">Donkeys</option>
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
                                                                    <select name="animal_name[]" style="width:300px" class="form-control js-example-basic-single">
                                                                        <option value="">Select Animal</option>
                                                                        <option value="Poultry (chicken , ducks, etc.)">Poultry (chicken , ducks, etc.)</option>
                                                                        <option value="Buffalo">Buffalo</option>
                                                                        <option value="Cows">Cows</option>
                                                                        <option value="Camels">Camels</option>
                                                                        <option value="Goats">Goats</option>
                                                                        <option value="Sheep">Sheep</option>
                                                                        <option value="Horse / Mules">Horse / Mules</option>
                                                                        <option value="Donkeys">Donkeys</option>
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
                                                    <input type="text" name="account_no" class="form-control" value="{{$data->account_no ?? ''}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)">
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
                                                    <input type="text" name="branch_code" value="{{$data->branch_code ?? ''}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="mb-12 col-md-12">
                                                    <h6>GPS Cordinates</h6>
                                                </div>

                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">GPS Coordinates of Agriculture land</label><br>
                                                    <div class="d-flex"  style="justify-content: space-between; ">
                                                        <a href="javascript::void()" id="gpsButton" class="btn btn-primary" style="    display: flex; align-items: center;">GPS</a> &nbsp;
                                                        <input type="text" id="locationInput" class="form-control">
                                                    </div>
                                                    <input type="hidden" name="GpsCordinates" id="GpsCordinates">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <!-- Button trigger modal -->
                                                    <label class="form-label">Geo Fencing (Optional)</label><br>
                                                    <input type="hidden" name="FancingCoordinates" id="FancingCoordinates">
                                                    <button type="button" class="btn btn-primary" id="abc" data-toggle="modal" data-target="#exampleModal">
                                                        Click here
                                                    </button>
                                                </div>

                                                <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLiveLabel">Farmers Verification</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="map"></div> <!-- Map container -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" id="removeMarkerBtn">Remove Last Marker</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save changes</button>

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
                                                <div class="mb-6 col-md-6 mt-3">
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
                                                </div>

                                                {{--
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">Upload Cheque Picture Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="upload_cheque_pic" class="form-control">
                                                </div>
                                                --}}
                                            </div>
                                            <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(4)">Previous</button>
                                            <button type="submit" class="btn btn-primary mt-5" id="submitbtn" disabled >Submit</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cms.benazirharicard.gos.pk/online_farmers_assets/js/popper.js"></script>
        <script src="https://cms.benazirharicard.gos.pk/online_farmers_assets/js/bootstrap.min.js"></script>
        <script src="https://cms.benazirharicard.gos.pk/online_farmers_assets/js/main.js"></script>
        <script src="https://cms.benazirharicard.gos.pk/online_farmers_assets/js/select2.min.js"></script>
        <script src="{{asset('assets/js/inputMask.js')}}"></script>

       <script>


$(document).ready(function () {
    $("input").inputmask(); // Apply mask only to input fields


    $(":input").inputmask({
    inputEventOnly: true  // Forces Inputmask to work on mobile
});



});



            // $(":input").inputmask();
            document.addEventListener("DOMContentLoaded", function () {
                let today = new Date().toISOString().split("T")[0];
                document.getElementById("cnic_expiry_date").setAttribute("min", today);
            });
        </script>

        <script>
            $(document).ready(function() {
                $('body').on('change', '.crop_season', function() {
                    const selectedValue = $(this).val();
                    const $selectElement = $(this);

                    // Find the closest <td> element (the one containing the <select>)
                    const $closestTd = $selectElement.closest('td');

                    // Find the appended input field inside the <td>
                    let $nextInput = $closestTd.find('input');

                    // Clear any existing input field if the selection is not 'any_other'
                    if (selectedValue !== 'any_other') {
                        if ($nextInput.length) {
                            $nextInput.remove(); // Remove the appended input if it exists
                        }
                    }

                    // If 'any_other' is selected, append a new input field in the same <td>
                    if (selectedValue === 'any_other') {
                        // If an input field is already appended, don't append again
                        if (!$nextInput.length) {
                            const inputField = $('<input>', {
                                type: 'text',
                                name: 'other_crop_season[]',
                                class: 'form-control mt-2',
                                placeholder: 'Please specify other season'
                            });

                            // Append the new input field in the same <td> as the <select>
                            $closestTd.append(inputField);
                        }
                    }
                });
            });




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


            $('#registrationForm').on('submit', function(event) {
                $('#submitbtn').attr('disabled', true); // Disable the submit button
            });


            document.getElementById('gpsButton').addEventListener('focus', function(e) {
                e.preventDefault();

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;
                            // Optionally, you can fill the input with coordinates or display elsewhere
                            document.getElementById('locationInput').innerHTML = `${latitude}, ${longitude}`;
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


            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });


        // $(document).on('change','.crop_season', function(event) {
        //     event.preventDefault();
        //     $(this).closest('tr').find('.crops_orchard_td').remove();
        //     if($(this).val() == 'kharif_season'){
        //         $(this).closest('tr').find('.crop_season_td').after(`
        //         <td class="crops_orchard_td">
        //             <select name="crops_orchard[]" class=" form-control">
        //                 <option>Select Orchard</option>
        //             </select>
        //         </td>`);
        //     }
        //     else if($(this).val() == 'rabi_season'){
        //        $(this).closest('tr').find('.crop_season_td').after(`
        //         <td class="crops_orchard_td">
        //             <select name="crops_orchard[]" class=" form-control">
        //                 <option>Select Orchard</option>
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



        $('#abc').on('click',function(){
    $('#exampleModal').modal('show');
})
    $('#add_title_row_Btn').click(function() {
        const newRow = `
            <tr>
                <td><input type="text" name="title_name[]" class="form-control"></td>
                <td><input type="text" name="title_father_name[]"  value="" class="form-control"></td>
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
                        <option value="rabi_season" >Rabi Season</option>
                        <option value="kharif_season">Kharif Season</option>
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


    $('#add_poultry_assets_row_Btn').click(function() {
        const newRow = `
            <tr>
                 <td>
                    <select name="animal_name[]" style="width:300px" class="form-control js-example-basic-single">
                       <option value="">Select Animal</option>
                        <option value="Poultry (chicken , ducks, etc.)">Poultry (chicken , ducks, etc.)</option>
                        <option value="Buffalo">Buffalo</option>
                        <option value="Cows">Cows</option>
                        <option value="Camels">Camels</option>
                        <option value="Goats">Goals</option>
                        <option value="Sheep">Sheep</option>
                        <option value="Horse / Mules">Horse / Mules</option>
                        <option value="Donkeys">Donkeys</option>
                    </select>
                </td>
                <td><input type="text" name="animal_qty[]"  class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5)"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
            </tr>
        `;
        $('#poultry_assets_tableBody').append(newRow);
        $('#poultry_assets_tableBody').find('.js-example-basic-single').last().select2({
            tags: true, // Enable the user to add custom tags
        });
    });

    // Delete row on clicking "Delete" button
    $('#poultry_assets_tableBody').on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
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


            function nextStep(step) {
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

            function prevStep(step) {
                // Hide all steps
                document.querySelectorAll('.step').forEach(function(stepElement) {
                    stepElement.style.display = 'none';
                });
                // Show the current step
                document.querySelector('.step-' + step).style.display = 'block';
                updateProgressIndicator(step);
            }

            function updateProgressIndicator(step) {
                document.querySelectorAll('.step-indicator').forEach(function(indicator) {
                    indicator.classList.remove('active');
                });
                $('.step-indicator-' + step).addClass('active');
            }



            $(document).ready(function() {
                $('#district').on('change', function() {
                    var district = $(this).val();
                    if (district) {
                        $.ajax({
                            url: '{{route("get-tehsils")}}',
                            type: 'GET',
                            data: {
                                district: district
                            },
                            success: function(data) {
                                $('#tehsils').empty();
                                $.each(data, function(key, value) {
                                    $('#tehsils').append('<option value="' +
                                        value + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#tehsils').empty();
                    }
                });

                $('#tehsils').on('change', function() {
                    var district = $('#district').val();
                    var tehsil = $(this).val();

                    if (district && tehsil) {
                        $.ajax({
                            url: '{{route("get-ucs")}}',
                            type: 'GET',
                            data: {
                                district: district,
                                tehsil: tehsil
                            },
                            success: function(response) {
                                // Populate UC dropdown
                                var ucSelect = $('#ucs');
                                ucSelect.empty();
                                $.each(response.ucs, function(index, value) {
                                    ucSelect.append('<option value="' + value + '">' + value + '</option>');
                                });

                                // Populate Tappa dropdown
                                var tappaSelect = $('#tappas');
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
                        $('#ucs').empty();
                        $('#tappas').empty();
                    }
                });
            });
        </script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <script src="{{asset('select2.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                // $('.js-example-basic-multiple').select2();

                $('.js-example-basic-multiple').select2({
                    tags: true, // Enable typing custom values
                    placeholder: "Select or type to add a new option", // Optional placeholder
                    tokenSeparators: [',', ' '] // Optional, allows separation by comma or space
                });

                $('.js-example-basic-multiple2').select2({

                });

                $('.js-example-basic-single').select2({
                    tags: true, // Enable typing custom values
                    placeholder: "Select or type to add a new option", // Optional placeholder
                });
            });
        </script>
        <script>
            // Initialize map to Hyderabad, Pakistan with zoom level 13
            var map = L.map('map').setView([25.3960, 68.3578], 13); // Coordinates for Hyderabad, Pakistan

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var markers = [];
            var lineCoordinates = [];
            var polyline;

            // Function to update hidden input field with coordinates
            function updateCoordinatesInput() {
                // Convert coordinates array to a JSON string and update the hidden input
                document.getElementById('FancingCoordinates').value = JSON.stringify(lineCoordinates);
            }

            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                var marker = L.marker([lat, lng]).addTo(map);
                marker.bindPopup('<b>You clicked at:</b><br>Latitude: ' + lat.toFixed(4) + '<br>Longitude: ' + lng.toFixed(4)).openPopup();

                markers.push(marker);
                lineCoordinates.push([lat, lng]);

                // If a polyline exists, remove it
                if (polyline) {
                    map.removeLayer(polyline);
                }

                // If there are at least two markers, draw a polyline
                if (lineCoordinates.length > 1) {
                    polyline = L.polyline(lineCoordinates, {
                        color: 'blue',
                        weight: 4
                    }).addTo(map);
                }
                updateCoordinatesInput();
            });

            // Bootstrap modal 'shown' event triggers map resizing
            $('#exampleModal').on('shown.bs.modal', function() {
                map.invalidateSize(); // This will force the map to recalculate its size once the modal is fully shown
            });

            // Add functionality to remove the last marker
            document.getElementById('removeMarkerBtn').addEventListener('click', function() {
                // If there are markers, remove the last one
                if (markers.length > 0) {
                    var lastMarker = markers.pop(); // Remove the last marker from the array
                    map.removeLayer(lastMarker); // Remove it from the map

                    lineCoordinates.pop(); // Remove the corresponding coordinate from the polyline

                    // If there are remaining markers, redraw the polyline
                    if (lineCoordinates.length > 1) {
                        // Remove old polyline if it exists
                        if (polyline) {
                            map.removeLayer(polyline);
                        }

                        // Redraw polyline with remaining markers
                        polyline = L.polyline(lineCoordinates, {
                            color: 'blue',
                            weight: 4
                        }).addTo(map);
                    } else if (polyline) {
                        // If only one marker remains, remove the polyline
                        map.removeLayer(polyline);
                        polyline = null;
                    }
                    updateCoordinatesInput();
                }
            });
        </script>
</body>

</html>
