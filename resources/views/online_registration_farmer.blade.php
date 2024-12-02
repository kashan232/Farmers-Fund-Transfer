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
        body
{
  font-family: 'Laila', sans-serif!important;
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
    </style>
</head>

<body style="background-color: white;">

    <div class="container-fluid">
        <div class="wrapper d-flex align-items-stretch col-lg-11 m-auto">

            <div class="row">
                <div class="div ">
                    <div class="logo-container ">
                        <img src="{{asset('')}}/assets/images/Sindh_Hari_Card.png" alt="logo image" class="#logo-lg" style="max-width:120px;" />

                        <h4 class="mt-2 font-weight-bold">Benazir Hari Card</h4>
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
                    <div class="alert alert-success alert-dismissible fade show ">
                        <strong>Success!</strong> {{ session('farmers-registered') }}.
                    </div>
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
                                    <form id="registrationForm" action="{{ route('store-online-farmers-registration') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="step step-1">
                                            <div class="row mt-2">
                                                <div class="mb-12 col-md-12 d-flex ">
                                                    <img src="{{asset('')}}/login_assets/account.png" alt="" style="height: 25px;width: 25px;">

                                                    <h4 class="card-title font-weight-bold" style="line-height: 27px;margin-left: 10px;">Personal Details</h4>
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">Q1. Name: <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" value="">
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">Q2. Father/Husband Name: <span class="text-danger">*</span></label>
                                                    <input type="text" name="father_name" class="form-control" value="">
                                                </div>
                                                <div class="mb-6 col-md-6 py-2">
                                                    <label class="form-label">Q3. CNIC No.: <span class="text-danger">*</span></label>
                                                    <input type="text" name="cnic" class="form-control" value="">
                                                </div>
                                                <div class="mb-6 col-md-6 py-2">
                                                    <label class="form-label">Q4. Mobile No.: <span class="text-danger">*</span></label>
                                                    <input type="text" name="mobile" class="form-control" value="">
                                                </div>
                                                <div class="mb-6 col-md-6 py-2">
                                                    <label class="form-label">Q5. District</label>
                                                    <select id="districts" name="district" class="form-control">
                                                        <option value="">Select District</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{$district->district}}">{{$district->district}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-6 col-md-6 py-2">
                                                    <label class="form-label">Q6. Taluka: </label>
                                                    <select id="tehsils" name="tehsil" class="form-control">
                                                        <option value="" disabled>Select Taluka</option>
                                                        <!-- Options will be populated dynamically -->
                                                    </select>
                                                </div>
                                                <div class="mb-6 col-md-6 py-2">
                                                    <label class="form-label">Q7. Union Council: </label>
                                                    <select id="ucs" name="uc" class="form-control">
                                                        <option value="" selected disabled>Select UC</option>
                                                        <!-- Options will be populated dynamically -->
                                                    </select>
                                                </div>
                                                <div class="mb-2 col-md-6 py-2">
                                                    <label class="form-label">Q8. Tappa: </label>
                                                    <select id="tappas" name="tappa" class="form-control">
                                                        <option value="" selected disabled>Select Tappa</option>
                                                        <!-- Options will be populated dynamically -->
                                                    </select>
                                                </div>

                                                <div class="mb-2 col-md-6 py-2">
                                                    <label class="form-label">Q9. Deh: </label>
                                                    <input type="text" name="dah" class="form-control" value="">
                                                </div>
                                                <div class="mb-2 col-md-6 mt-2">
                                                    <label class="form-label">Q10. Village: </label>
                                                    <input type="text" name="village" class="form-control" value="">
                                                </div>
                                                <div class="mb-4 col-md-4 mt-2">
                                                    <label class="form-label"><b>Q11. Gender (Tick):</b></label><br>
                                                     &nbsp;<label>
                                                        <input type="radio" name="gender" value="male"> Male
                                                      </label>
                                                      &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                      <label>
                                                        <input type="radio" name="gender" value="female"> Female
                                                      </label>
                                                </div>

                                                <div class="mb-2 col-md-8">
                                                    <label class="form-label"><b>Q12: Owner Type: </b></label>
                                                        <br>
                                                        &nbsp;
                                                        <label>
                                                            <input type="radio" name="owner_type" value="owner"> 1. Owner
                                                        </label>
                                                        &nbsp;
                                                        <label>
                                                            <input type="radio" name="owner_type" value="makadedar"> 2. Makadedar (Contractor/leasee)
                                                        </label>
                                                        &nbsp;
                                                        <label>
                                                            <input type="radio" name="owner_type" value="sharecropper"> 3. sharecropper/Tenant
                                                        </label>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class=" col-md-12">
                                                    <h6 class="card-title">Q13: Family Compostion and age of respondent:</h6>
                                                </div>

                                                <div class=" col-md-4 mt-1" style="padding-right: 0 !important;  ">
                                                    <div style="border:1px solid; display:flex;align-items: center; height: 40px; justify-content:center">
                                                        <h6 class="text-center" style="margin: 0 !important;">Gender</h6>
                                                    </div>
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" value="Female" readonly name="" class="form-control">
                                                    </div>
                                                </div>

                                                <div class=" col-md-4 mt-1" style="padding-right: 0 !important;  padding-left: 0 !important;">
                                                    <div style="border:1px solid; display:flex;align-items: center; height: 40px; justify-content:center">
                                                        <h6 class="text-center" style="margin: 0 !important;">Children < 18 years</h6>
                                                    </div>
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="female_children_under16" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>

                                                <div class=" col-md-4 mt-1" style="  padding-left: 0 !important;">
                                                    <div style="border:1px solid; display:flex;align-items: center; height: 40px; justify-content:center">
                                                        <h6 class="text-center" style="margin: 0 !important;">Adults > 18 years</h6>
                                                    </div>
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="female_Adults_above16" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>

                                                <div class="mb-4 col-md-4 " style="padding-right: 0 !important;  ">
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" value="Male" readonly name="" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="mb-4 col-md-4 " style="padding-right: 0 !important;  padding-left: 0 !important;">
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="male_children_under16" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>

                                                <div class="mb-4 col-md-4 " style="  padding-left: 0 !important;">
                                                    <div style="border:1px solid; padding: 2%;">
                                                        <input type="text" name="male_Adults_above16" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="mb-4 col-md-4 ">
                                                    <label class="form-label">Q14: Next of Kin:  Full Name: </label>
                                                    <input type="text" name="full_name_of_next_kin" class="form-control" value="">
                                                </div>
                                                <div class="mb-4 col-md-4 ">
                                                    <label class="form-label">CNIC NO:</label>
                                                    <input type="text" name="cnic_of_next_kin" class="form-control" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                                </div>
                                                <div class="mb-4 col-md-4 ">
                                                    <label class="form-label">Mobile No:</label>
                                                    <input type="text" name="mobile_of_next_kin" class="form-control" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                                                </div>
                                            </div>


                                            <div class="row" id="">
                                                <div class="mb-6 col-6">
                                                    <label class="form-label"><b>Q15. House Type:</b></label> &nbsp; &nbsp; &nbsp;
                                                    <label>
                                                    <input type="radio" name="house_type" value="pakka_house"> &nbsp; (1) Pakka House
                                                    </label>
                                                    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                    <label>
                                                    <input type="radio" name="house_type" value="kacha_house"> &nbsp; (2) Kacha House
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="row" id="">
                                                <div class="mb-12 col-md-12">
                                                    <h6>Q16: Landholding:</h6>
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">(1) Total Landholding (Acres):</label>
                                                    <input type="text" name="total_landing_acre" value="" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">(2) Total Area with Hari(s) (Acres):</label>
                                                    <input type="text" name="total_area_with_hari" value="" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">(3) Total self cultivated land (Acres):</label>
                                                    <input type="text" name="total_area_cultivated_land" value="" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">(4) Total fallow land (Acres):</label>
                                                    <input type="text" name="total_fallow_land" value="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row " class="" id="no_title_section">
                                                <div class=" mt-2 mb-12 col-md-12">
                                                    <h6>Particulars of Teuants / Sharecroppers</h6>
                                                </div>
                                                <div class="col-12">
                                                    <table id="title_table" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Full Name</th>
                                                                <th>CNIC Number</th>
                                                                <th>Contact Number</th>
                                                                <th>Total Area (Acre)</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="title_tableBody">
                                                            <tr>
                                                                <td>
                                                                    <input type="text" name="title_name[]" value="" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="title_cnic[]" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="title_number[]" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="title_area[]" value="" class="form-control">
                                                                </td>
                                                                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12" style="justify-content: right; display: flex;">
                                                    <button type="button" class="btn btn-primary" id="add_title_row_Btn">Add More</button>
                                                </div>
                                            </div>
                                            <div class="row" id="crops_section">
                                                <div class="mb-12 col-md-12">
                                                    <label>Q17: B. Crops Status</label>
                                                </div>
                                                <div class="col-12">
                                                    <table id="crop_table" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Season</th>
                                                                <th>Crop(s)</th>
                                                                <th>Area (Acres)</th>
                                                                <th>Average Yield (Per Acre)</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="crop_tableBody">
                                                            <tr>
                                                                <td>
                                                                    <select name="crop_season[]" id="" class="form-control">
                                                                        <option value="">Select Season</option>
                                                                        <option value="Rabi Season">Rabi Season</option>
                                                                        <option value="Kharif Season">Kharif Season</option>
                                                                        <option value="Orchards">Orchards</option>

                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="crops[]" value="" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="crop_area[]" value="" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="crop_average_yeild[]" value="" class="form-control">
                                                                </td>
                                                                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12" style="justify-content: right; display: flex;">
                                                    <button type="button" class="btn btn-primary" id="add_crop_row_Btn">Add More</button>
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
                                                        <option value="car/jeep">Car/Jeep </option>
                                                        <option value="pickup/loader">Pickup/loader</option>
                                                        <option value="motorcycle">Motorcycle</option>
                                                        <option value="bicycles">Bicycles</option>
                                                        <option value="bullock_cart">Bullock Cart</option>
                                                        <option value="Tractor(4wheels)">Tractor (4 wheels)</option>
                                                        <option value="disk_harrow">Disk Harrow</option>
                                                        <option value="cultivator">Cultivator</option>
                                                        <option value="tractor_trolley">Tractor Trolley</option>
                                                        <option value="plough">Plough (wood or metal)</option>
                                                        <option value="laser_lever">Laser lever</option>
                                                        <option value="rotavetor">Rotavetor</option>
                                                        <option value="thresher">Thresher</option>
                                                        <option value="harvester">Harvester</option>
                                                        <option value="Any Other">Any Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2 " id="poultry_assets_section">
                                                <div class="mt-3 col-md-12">
                                                    <label>Q19: Livestock and Poultry - assets currently owned</label>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <table id="poultry_assets_table" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Type of Animal</th>
                                                                <th>Numbers NOW</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="poultry_assets_tableBody">
                                                            <tr>
                                                                <td>
                                                                    <select name="animal_name[]" id="" class="form-control">
                                                                        <option value="">Select Animal</option>
                                                                        <option value="Poultry (chicken , ducks, etc.)">Poultry (chicken , ducks, etc.)</option>
                                                                        <option value="Buffalo">Buffalo</option>
                                                                        <option value="Cows">Cows</option>
                                                                        <option value="Camels">Camels</option>
                                                                        <option value="Goals">Goals</option>
                                                                        <option value="Sheep">Sheep</option>
                                                                        <option value="Horse / Mules">Horse / Mules</option>
                                                                        <option value="Donkeys">Donkeys</option>
                                                                        <option value="Any Other">Any Other</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="" name="animal_qty[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)">
                                                                </td>
                                                                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12" style="justify-content: right; display: flex;">
                                                    <button type="button" class="btn btn-primary" id="add_poultry_assets_row_Btn">Add More</button>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary mt-3 " onclick="prevStep(1)">Previous</button>
                                            <button type="button" class="btn btn-primary  mt-3" onclick="nextStep(3)">Next</button>
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
                                                        <select name="source_of_irrigation" class="form-control" id="source_of_irrigation">
                                                            <option value="canal_wall">(1) Canal System</option>
                                                            <option value="tube_wall">(2) Tube Wall</option>
                                                            <option value="Rain/Barrani">(3) Rain/Barrani</option>
                                                            <option value="Kaccha Area">(4) Kaccha Area</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="mb-12 col-md-12">

                                                    <label class="form-label">Q22: Status of water course,</label>
                                                </div>
                                                <div class="row mb-12 col-md-12" id="status_of_water_section">
                                                    <div class="mb-3 col-md-3">
                                                        <label class="form-label">Total length (Meter)</label>
                                                        <input type="text" name="area_length" class="form-control" value="">
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <label class="form-label">Total Command Area (Acres)</label>
                                                        <input type="text" name="total_command_area" class="form-control" value="">
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <label class="form-label">Area length</label>
                                                        <select class="form-control" id="lined_unlined" name="line_status">
                                                            <option value="">Select Lined/Unlined</option>
                                                            <option value="lined">lined</option>
                                                            <option value="unlined">Unlind</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary " onclick="prevStep(2)">Previous</button>
                                            <button type="button" class="btn btn-primary " onclick="nextStep(4)">Next</button>
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
                                                    <input type="text" name="account_title" class="form-control" >
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">Q24: Account No</label>
                                                    <input type="text" name="account_no" class="form-control" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-2">
                                                    <label class="form-label">Q25: Bank Name</label>
                                                    <input type="text" name="bank_name"  class="form-control" value="Sindh Bank">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-2">
                                                    <label class="form-label">Q26: Branch Name</label>
                                                    <input type="text" name="branch_name" value="" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-2">
                                                    <label class="form-label">Q27: IBAN</label>
                                                    <input type="text" name="IBAN_number" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-2">
                                                    <label class="form-label">Q28: Branch Code</label>
                                                    <input type="text" name="branch_code" value="" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="mb-12 col-md-12">
                                                    <h6>GPS Cordinates</h6>
                                                </div>

                                                <div class="mb-6 col-md-6">
                                                    <label class="form-label">GPS Coordinates</label><br>
                                                    <a href="javascript::void()" id="gpsButton" class="btn btn-primary">GPS</a> &nbsp;
                                                    <span id="locationInput"></span>
                                                    <input type="hidden" name="GpsCordinates" id="GpsCordinates">
                                                </div>
                                                <div class="mb-6 col-md-6">
                                                    <!-- Button trigger modal -->
                                                    <label class="form-label">Geo Fencing (Optional)</label><br>
                                                    <input type="hidden" name="FancingCoordinates" id="FancingCoordinates">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        Click here
                                                    </button>
                                                </div>


                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Geofencing</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="map"></div> <!-- Map container -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" id="removeMarkerBtn">Remove Last Marker</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="button" class="btn btn-secondary mt-3" onclick="prevStep(3)">Previous</button>
                                            <button type="button" class="btn btn-primary mt-3" onclick="nextStep(5)">Next</button>
                                        </div>

                                        <div class="step step-5" style="display: none;">
                                            <div class="row mt-2">
                                                <div class="mb-12 col-md-12 d-flex">
                                                    <img src="{{asset('')}}/login_assets/contract.png" alt="" style="height: 25px;width: 25px;">

                                                    <h6 class="card-title" style="line-height: 27px;margin-left: 10px;">
                                                        Q29: DOCUMENTS UPLOADED/ COLLECTED</h6>
                                                </div>
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">CNIC FRONT <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="front_id_card" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">CNIC BACK<br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="back_id_card" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">Forms VII/ VIII A/ Affidavit/ Heirship / Registry from Micro (Land Documents) <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="upload_land_proof" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">Photo<br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="upload_farmer_pic" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">Others<br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="upload_other_attach" class="form-control">
                                                </div>
                                                {{-- <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">Upload Farmer Picture Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="upload_farmer_pic" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6 mt-3">
                                                    <label class="form-label">Upload Cheque Picture Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                                    <input type="file" name="upload_cheque_pic" class="form-control">
                                                </div> --}}
                                            </div>
                                            <button type="button" class="btn btn-secondary mt-3" onclick="prevStep(4)">Previous</button>
                                            <button type="submit" class="btn btn-primary mt-3" id="submitbtn">Submit</button>
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
        <script>

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

            $('#source_of_irrigation').change(function() {
                if ($(this).val() == 'tube_wall') {
                    $('#source_of_energy_section').remove();
                    $('#source_of_irrigation_section').append(`
            <div class="mb-6 col-md-6" id="source_of_energy_section">
                <label class="form-label">Q21: Source of energy</label>
                <select name="source_of_irrigation_engery"  class="form-control" id="source_of_energy">
                    <option value="electricity">Electricity</option>
                    <option value="solar">Solar</option>
                    <option value="Petrol/Diesel/Gas">Petrol/Diesel/Gas</option>
                    <option value="Any Other">Other</option>
                </select>
            </div>
         `);
                } else {
                    $('#source_of_energy_section').remove();
                }
            });

            $('#lined_unlined').change(function() {
                if ($(this).val() == 'lined') {
                    $('#lined_section').remove();
                    $('#status_of_water_section').append(`
                    <div class="mb-3 col-md-3" id="lined_section" >
                        <div class="row">
                            <div class="mb-12 col-md-12" >
                                <label class="form-label">Line length in (Meter)</label>
                                <input type="text" name="lined_length" class="form-control">
                            </div>
                        </div>
                    </div>
                    `);
                } else {
                    $('#lined_section').remove();
                }
            });


            $('#add_title_row_Btn').click(function() {
                const newRow = `
            <tr>
                <td><input type="text" name="title_name[]" class="form-control"></td>
                <td><input type="text" name="title_cnic[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)"></td>
                <td><input type="text" name="title_number[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)"></td>
                <td><input type="text" name="title_area[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
            </tr>
        `;
                $('#title_tableBody').append(newRow);
            });

            // Delete row on clicking "Delete" button
            $('#title_tableBody').on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
            });

            $('#add_crop_row_Btn').click(function() {
                const newRow = `
            <tr>
                <td>
                    <select name="crop_season[]" id="" class="form-control">
                        <option value="" >Select Season</option>
                        <option value="Rabi Season">Rabi Season</option>
                        <option value="Kharif Season">Kharif Season</option>
                        <option value="Orchards">Orchards</option>
                    </select>
                </td>
                <td><input type="text" name="crops[]" class="form-control"></td>
                <td><input type="text" name="crop_area[]" class="form-control"></td>
                <td><input type="text" name="crop_average_yeild[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
            </tr>
        `;
                $('#crop_tableBody').append(newRow);
            });

            // Delete row on clicking "Delete" button
            $('#crop_tableBody').on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
            });


            $('#add_poultry_assets_row_Btn').click(function() {
                const newRow = `
            <tr>
                <td>
                    <select name="animal_name[]" id="" class="form-control">
                        <option value="">Select Animal</option>
                        <option value="Poultry (chicken , ducks, etc.)">Poultry (chicken , ducks, etc.)</option>
                        <option value="Buffalo">Buffalo</option>
                        <option value="Cows">Cows</option>
                        <option value="Camels">Camels</option>
                        <option value="Goals">Goals</option>
                        <option value="Sheep">Sheep</option>
                        <option value="Horse / Mules">Horse / Mules</option>
                        <option value="Donkeys">Donkeys</option>
                        <option value="Any Other">Any Other</option>
                    </select>
                </td>
                <td><input type="text" name="animal_qty[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
            </tr>
        `;
                $('#poultry_assets_tableBody').append(newRow);
            });

            // Delete row on clicking "Delete" button
            $('#poultry_assets_tableBody').on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
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
                $('#districts').on('change', function() {
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
                    var district = $('#districts').val();
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
