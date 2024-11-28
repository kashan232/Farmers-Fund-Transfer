<!doctype html>
<html lang="en">

<head>
    <title>Online Farmers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="/online_farmers_assets/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('online_farmers_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('online_farmers_assets/css/select2.min.css')}}">
    <meta name="robots" content="noindex, follow">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px; /* Define map container height */
            width: 100%;  /* Ensure the map takes full width */
        }
    </style>
    <style>
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLDz8Z1xlEA.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/poppins/v21/pxiEyp8kv8JHgFVrJJfedw.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLGT9Z1xlEA.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLEj6Z1xlEA.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLCz7Z1xlEA.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLDD4Z1xlEA.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLBT5Z1xlEA.ttf) format('truetype');
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

    </style>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div id="logo">
                <div class="logo-content text-center">
                    <a href="#" class="b-brand text-primary">
                        <img src="{{asset('')}}/assets/images/Sindh_Hari_Card.png" alt="logo image" class="#logo-lg" style="max-width:120px;" />
                    </a>
                    <!-- <span>FARMER REGISTRATION FORM</span> -->
                </div>
            </div>

            <ul class="list-unstyled components mb-5">
                <li class="step-indicator step-indicator-1 active " onclick="showStep(1)">
                    <a href="javascript:void(0)"><span class="fa fa-user mr-3"></span> Personal Information</a>
                </li>
                <li class="step-indicator step-indicator-2" onclick="showStep(2)">
                    <a href="javascript:void(0)"><span class="fa fa-user mr-3"></span> Assets Information</a>
                </li>
                <li class="step-indicator step-indicator-3" onclick="showStep(3)">
                    <a href="javascript:void(0)"><span class="fa fa-sticky-note mr-3"></span>Sources</a>
                </li>
                <li class="step-indicator step-indicator-4" onclick="showStep(4)">
                    <a href="javascript:void(0)"><span class="fa fa-sticky-note mr-3"></span>Bank & Account Details</a>
                </li>
                <li class="step-indicator step-indicator-5" onclick="showStep(5)">
                    <a href="javascript:void(0)"><span class="fa fa-sticky-note mr-3"></span> Upload Documents </a>
                </li>

            </ul>
        </nav>

        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        @if (session()->has('farmers-registered'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" style="width: 95%; margin: auto;">
                            <strong>Success!</strong> Successfully Registered.
                        </div>
                        @endif
                        <div class="card-body">
                            <form id="registrationForm" action="{{ route('store-online-farmers-registration') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="step step-1">
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <h4 class="card-title">Personal Details</h4>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" name="father_name" class="form-control" value="{{ old('father_name') }}">
                                            @error('father_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">CNIC</label>
                                            <input type="text" name="cnic" class="form-control" value="{{ old('cnic') }}">
                                            @error('cnic')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
                                            @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Dictrict</label>
                                            <select id="districts" name="district"  class="form-control">
                                                <option value="" >Select District</option>
                                                @foreach ($districts as $district)
                                                <option value="{{$district->district}}">{{$district->district}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Tehsil</label>
                                            <select id="tehsils" name="tehsil" class="form-control" >
                                                <option value=""  disabled>Select Tehsil</option>
                                                <!-- Options will be populated dynamically -->
                                            </select>
                                            @error('tehsil')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">UC</label>
                                            <select id="ucs" name="uc" class="form-control">
                                                <option value="" selected disabled>Select UC</option>
                                                <!-- Options will be populated dynamically -->
                                            </select>
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Tappa</label>
                                            <select id="tappas" name="tappa" class="form-control">
                                                <option value="" selected disabled>Select Tappa</option>
                                                <!-- Options will be populated dynamically -->
                                            </select>
                                        </div>

                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">DAH</label>
                                            <input type="text" name="dah" class="form-control" value="{{ old('dah') }}">
                                            @error('dah')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Village</label>
                                            <input type="text" name="village" class="form-control" value="{{ old('village') }}">
                                            @error('village')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4 mt-2">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4">
                                            <label class="form-label">House Type</label>
                                            <select name="house_type" id="house_type" class="form-control">
                                                <option value="pakka_house" {{ old('house_type') == 'pakka_house' ? 'selected' : '' }}>Pakka House</option>
                                                <option value="kacha_house" {{ old('house_type') == 'kacha_house' ? 'selected' : '' }}>Kacha House</option>
                                            </select>
                                            @error('house_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4">
                                            <label class="form-label">Owner Type</label>
                                            <select name="owner_type" id="" class="form-control">
                                                <option value="owner" {{ old('owner_type') == 'owner' ? 'selected' : '' }}>Owner</option>
                                                <option value="makandar" {{ old('owner_type') == 'makandar' ? 'selected' : '' }}>Makandar</option>
                                            </select>
                                            @error('owner_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class=" col-md-12">
                                            <h6 class="card-title">Next of Kin</h6>
                                        </div>
                                        <div class="mb-4 col-md-4 ">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="full_name_of_next_kin"   class="form-control" value="{{ old('full_name_of_next_kin') }}">
                                            @error('full_name_of_next_kin')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4 ">
                                            <label class="form-label">CNIC</label>
                                            <input type="text" name="cnic_of_next_kin" class="form-control" value="{{ old('cnic_of_next_kin') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)" >
                                            @error('cnic_of_next_kin')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4 ">
                                            <label class="form-label">Mobile No</label>
                                            <input type="text" name="mobile_of_next_kin" class="form-control" value="{{ old('mobile_of_next_kin') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" >
                                            @error('mobile_of_next_kin')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class=" col-md-12">
                                            <h6 class="card-title">Family Compostion</h6>
                                        </div>
                                        <div class="mb-4 col-md-4 mt-1">
                                            <h6 class="text-center">Gender</h6>
                                            <input type="text" value="Female" readonly name="" class="form-control">
                                        </div>
                                        <div class="mb-4 col-md-4 mt-1">
                                            <h6 class="text-center">Children < 16 </h6>
                                            <input type="text" name="female_children_under16"  value="{{ old('female_children_under16') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            @error('female_children_under16')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4 mt-1">
                                            <h6 class="text-center">Adults > 16 </h6>
                                            <input type="text" name="female_Adults_above16" value="{{ old('female_Adults_above16') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            @error('female_Adults_above16')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4 ">
                                            <input type="text" value="Male" readonly name="" class="form-control">
                                        </div>
                                        <div class="mb-4 col-md-4 ">
                                            <input type="text" name="male_children_under16" value="{{ old('male_children_under16') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            @error('male_children_under16')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-md-4 ">
                                            <input type="text" name="male_Adults_above16" value="{{ old('male_Adults_above16') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            @error('male_Adults_above16')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row" id="">
                                        <div class="mb-12 col-md-12">
                                            <h6>Landholding & Cropping</h6>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Total Landholding (Acre)</label>
                                            <input type="text" name="total_landing_acre" value="{{ old('total_landing_acre') }}" class="form-control">
                                            @error('total_landing_acre')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Total Area with Hari(s)</label>
                                            <input type="text" name="total_area_with_hari" value="{{ old('total_area_with_hari') }}" class="form-control">
                                            @error('total_area_with_hari')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Total self cultivated land</label>
                                            <input type="text" name="total_area_cultivated_land" value="{{ old('total_area_cultivated_land') }}" class="form-control">
                                            @error('total_area_cultivated_land')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Total fallow land</label>
                                            <input type="text" name="total_fallow_land" value="{{ old('total_fallow_land') }}" class="form-control">
                                            @error('total_fallow_land')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row " id="no_title_section">
                                        <div class="mb-12 col-md-12">
                                            <h6>Titleee</h6>
                                        </div>
                                        <div class="col-12">
                                            <table id="title_table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>CNIC Number</th>
                                                        <th>Contact Number</th>
                                                        <th>Total Area (Acre)</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="title_tableBody">
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="title_name[]" value="{{ old('title_name.0') }}" class="form-control">
                                                            @error('title_name.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" name="title_cnic[]" value="{{ old('title_cnic.0') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                                            @error('title_cnic.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" name="title_number[]" value="{{ old('title_number.0') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                                                            @error('title_number.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" name="title_area[]" value="{{ old('title_area.0') }}" class="form-control">
                                                            @error('title_area.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
                                            <h6>Crop Status</h6>
                                        </div>
                                        <div class="col-12">
                                            <table id="crop_table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Crops</th>
                                                        <th>Area</th>
                                                        <th>Average Yeild</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="crop_tableBody">
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="crops[]" value="{{ old('crops.0') }}" class="form-control">
                                                            @error('crops.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" name="crop_area[]" value="{{ old('crop_area.0') }}" class="form-control">
                                                            @error('crop_area.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" name="crop_average_yeild[]"  value="{{ old('crop_average_yeild.0') }}" class="form-control">
                                                            @error('crop_average_yeild.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
                                        <div class="mb-12  col-md-12">
                                            <h6>Physical Assets Currently Owned</h6>
                                        </div>
                                        <div class="mb-8 col-md-8">
                                            <label class="form-label">Items</label>
                                            <select name="physical_asset_item[]" id=""  class="form-control--input js-example-basic-multiple" style="width: 100%" multiple="multiple">
                                                <option value="car/jeep" {{ in_array('car/jeep', old('physical_asset_item', [])) ? 'selected' : '' }} >Car/Jeep </option>
                                                <option value="pickup/loader" {{ in_array('pickup/loader', old('physical_asset_item', [])) ? 'selected' : '' }}>Pickup/loader</option>
                                                <option value="motorcycle" {{ in_array('motorcycle', old('physical_asset_item', [])) ? 'selected' : '' }}>Motorcycle</option>
                                                <option value="bicycles" {{ in_array('bicycles', old('physical_asset_item', [])) ? 'selected' : '' }}>Bicycles</option>
                                                <option value="bullock_cart" {{ in_array('bullock_cart', old('physical_asset_item', [])) ? 'selected' : '' }}>Bullock Cart</option>
                                                <option value="Tractor(4wheels)" {{ in_array('Tractor(4wheels)', old('physical_asset_item', [])) ? 'selected' : '' }}>Tractor (4 wheels)</option>
                                                <option value="disk_harrow" {{ in_array('disk_harrow', old('physical_asset_item', [])) ? 'selected' : '' }}>Disk Harrow</option>
                                                <option value="cultivator" {{ in_array('cultivator', old('physical_asset_item', [])) ? 'selected' : '' }}>Cultivator</option>
                                                <option value="tractor_trolley" {{ in_array('car/jeep', old('physical_asset_item', [])) ? 'selected' : '' }}>Tractor Trolley</option>
                                                <option value="plough" {{ in_array('plough', old('physical_asset_item', [])) ? 'selected' : '' }}>Plough (wood or metal)</option>
                                                <option value="thresher" {{ in_array('thresher', old('physical_asset_item', [])) ? 'selected' : '' }}>Thresher</option>
                                                <option value="harvester" {{ in_array('harvester', old('physical_asset_item', [])) ? 'selected' : '' }}>Harvester</option>
                                                <option value="rotavetor" {{ in_array('rotavetor', old('physical_asset_item', [])) ? 'selected' : '' }}>Rotavetor</option>
                                                <option value="laser_lever" {{ in_array('laser_lever', old('physical_asset_item', [])) ? 'selected' : '' }}>Laser lever</option>
                                            </select>
                                            @error('physical_asset_item')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2 " id="poultry_assets_section">
                                        <div class="mt-3 col-md-12">
                                            <h6>Livestock and Poultry Assets Currently Owned</h6>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <table id="poultry_assets_table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Animal</th>
                                                        <th>Numbers</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="poultry_assets_tableBody">
                                                    <tr>
                                                        <td>
                                                            <input type="text" value="{{ old('animal_name.0') }}" name="animal_name[]" class="form-control">
                                                            @error('animal_name.0')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"  value="{{ old('animal_qty.0') }}"  name="animal_qty[]"   class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)">
                                                            @error('animal_qty.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
                                        <div class="mb-12 col-md-12">
                                            <h6>Source of irrigation</h6>
                                        </div>
                                        <div class="row mb-12 col-md-12" id="source_of_irrigation_section">
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">Source of irrigation</label>
                                                <select name="source_of_irrigation" class="form-control" id="source_of_irrigation">
                                                    <option value="canal_wall" {{ old('source_of_irrigation') == 'canal_wall' ? 'selected' : '' }}>Canal System</option>
                                                    <option value="tube_wall" {{ old('source_of_irrigation') == 'tube_wall' ? 'selected' : '' }}>Tube Wall</option>
                                                </select>
                                                @error('source_of_irrigation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <h6>Status of water</h6>
                                        </div>
                                        <div class="row mb-12 col-md-12" id="status_of_water_section">
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Area length</label>
                                                <input type="text" name="area_length" class="form-control" value="{{ old('area_length') }}">
                                                @error('area_length')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Area length</label>
                                                <select class="form-control" id="lined_unlined" name="line_status">
                                                    <option value="">Select Lined/Unlined</option>
                                                    <option value="lined" {{ old('line_status') == 'lined' ? 'selected' : '' }}>lined</option>
                                                    <option value="unlined" {{ old('line_status') == 'unlined' ? 'selected' : '' }}>Unlind</option>
                                                </select>
                                                @error('line_status')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary " onclick="prevStep(2)">Previous</button>
                                    <button type="button" class="btn btn-primary " onclick="nextStep(4)">Next</button>
                                </div>

                                <div class="step step-4" style="display: none;">
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <h6>Bank & Account Details</h6>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Title of Account</label>
                                            <input type="text" name="account_title" class="form-control" value="{{ old('account_title') }}">
                                            @error('account_title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Account No</label>
                                            <input type="text" name="account_no" class="form-control" value="{{ old('account_no') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)">
                                            @error('account_no')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" name="bank_name" value="{{ old('bank_name') }}" class="form-control">
                                            @error('bank_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Branch Name</label>
                                            <input type="text" name="branch_name" value="{{ old('branch_name') }}"  class="form-control">
                                            @error('branch_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">IBAN</label>
                                            <input type="text" name="IBAN_number" value="{{ old('IBAN_number') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)">
                                            @error('IBAN_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Branch Code</label>
                                            <input type="text" name="branch_code" value="{{ old('branch_code') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)">
                                            @error('branch_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="mb-12 col-md-12">
                                            <button id="gpsButton" class="btn btn-primary">GPS Coordinates</button> &nbsp;
                                            <span id="locationInput"></span>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary mt-3" onclick="prevStep(3)">Previous</button>
                                    <button type="button" class="btn btn-primary mt-3" onclick="nextStep(5)">Next</button>
                                </div>

                                <div class="step step-5" style="display: none;">
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <h6>Uploaded Documents</h6>
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Front ID Card Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                            <input type="file" name="front_id_card" class="form-control">
                                            @error('front_id_card')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Back ID Card Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                            <input type="file" name="back_id_card" class="form-control">
                                            @error('back_id_card')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Land Proof Pic Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                            <input type="file" name="upload_land_proof" class="form-control">
                                            @error('upload_land_proof')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Other Attachments Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                            <input type="file" name="upload_other_attach" class="form-control">
                                            @error('upload_other_attach')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Farmer Picture Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                            <input type="file" name="upload_farmer_pic" class="form-control">
                                            @error('upload_farmer_pic')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Upload Cheque Picture Img <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg"</span> </label>
                                            <input type="file" name="upload_cheque_pic" class="form-control">
                                            @error('upload_cheque_pic')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-3" onclick="prevStep(4)">Previous</button>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            let allTehsils = [];
            let allUcs = [];
            let allTappas = [];

            // Fetch districts from the API
            fetch('http://127.0.0.1:8000/api/get-districts')
                .then(response => response.json())
                .then(data => {
                    const districtSelect = document.getElementById('district');
                    districtSelect.innerHTML = '<option value="" selected disabled>Select District</option>';
                    data.districts.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.district;
                        option.textContent = district.district;
                        districtSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching districts:', error));

            // Fetch all tehsils from the API
            fetch('http://127.0.0.1:8000/api/get-tehsil')
                .then(response => response.json())
                .then(data => {
                    allTehsils = data.tehsils;
                })
                .catch(error => console.error('Error fetching tehsils:', error));

            // Fetch all UCs from the API
            fetch('http://127.0.0.1:8000/api/get-uc')
                .then(response => response.json())
                .then(data => {
                    allUcs = data.Ucs;
                })
                .catch(error => console.error('Error fetching UCs:', error));

            // Fetch all tappas from the API
            fetch('http://127.0.0.1:8000/api/get-tappa')
                .then(response => response.json())
                .then(data => {
                    allTappas = data.tehsils;
                })
                .catch(error => console.error('Error fetching tappas:', error));

            // Populate tehsils based on selected district
            document.getElementById('district').addEventListener('change', function() {
                const selectedDistrict = this.value;
                const tehsilSelect = document.getElementById('tehsil');
                tehsilSelect.innerHTML = '<option value="" selected disabled>Select Tehsil</option>';

                const filteredTehsils = allTehsils.filter(tehsil => tehsil.district === selectedDistrict);
                filteredTehsils.forEach(tehsil => {
                    const option = document.createElement('option');
                    option.value = tehsil.tehsil;
                    option.textContent = tehsil.tehsil;
                    tehsilSelect.appendChild(option);
                });

                // Clear UC and Tappa selects
                document.getElementById('uc').innerHTML = '<option value="" selected disabled>Select UC</option>';
                document.getElementById('tappa').innerHTML = '<option value="" selected disabled>Select Tappa</option>';
            });

            // Populate UCs and tappas based on selected tehsil and district
            document.getElementById('tehsil').addEventListener('change', function() {
                const selectedDistrict = document.getElementById('district').value;
                const selectedTehsil = this.value;

                // Populate UCs
                const ucSelect = document.getElementById('uc');
                ucSelect.innerHTML = '<option value="" selected disabled>Select UC</option>';
                const filteredUcs = allUcs.filter(uc => uc.district === selectedDistrict && uc.tehsil === selectedTehsil);
                filteredUcs.forEach(uc => {
                    const option = document.createElement('option');
                    option.value = uc.uc;
                    option.textContent = uc.uc;
                    ucSelect.appendChild(option);
                });

                // Populate tappas
                const tappaSelect = document.getElementById('tappa');
                tappaSelect.innerHTML = '<option value="" selected disabled>Select Tappa</option>';
                const filteredTappas = allTappas.filter(tappa => tappa.district === selectedDistrict && tappa.tehsil === selectedTehsil);
                filteredTappas.forEach(tappa => {
                    const option = document.createElement('option');
                    option.value = tappa.tappa;
                    option.textContent = tappa.tappa;
                    tappaSelect.appendChild(option);
                });
            });
        });
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('online_farmers_assets/js/popper.js')}}"></script>
    <script src="{{asset('online_farmers_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('online_farmers_assets/js/main.js')}}"></script>
    <script src="{{asset('online_farmers_assets/js/select2.min.js')}}"></script>
    <script>

document.getElementById('gpsButton').addEventListener('focus', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        // Optionally, you can fill the input with coordinates or display elsewhere
                        document.getElementById('locationInput').innerHTML = `${latitude}, ${longitude}`;
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
                $('#source_of_irrigation_section').append(`
            <div class="mb-6 col-md-6" id="source_of_energy_section">
                <label class="form-label">Source of energy</label>
                <select name="source_of_irrigation_engery"  class="form-control" id="source_of_energy">
                    <option value="electricity">Electricity</option>
                    <option value="solar">Solar</option>
                    <option value="fuel">Fuel</option>
                </select>
            </div>
         `);
            } else {
                $('#source_of_energy_section').remove();
            }
        });

        $('#lined_unlined').change(function() {
            if ($(this).val() == 'lined') {
                $('#status_of_water_section').append(`
        <div class="mb-6 col-md-6" id="lined_section" >
            <div class="row">
            <div class="mb-6 col-md-6" >
                <label class="form-label">Lined Length</label>
                <input type="text" name="lined_length" class="form-control">
            </div>
            <div class="mb-6 col-md-6" >
                <label class="form-label">Total Command Area</label>
                <input type="text" name="total_command_area" class="form-control">
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
                <td><input type="text" name="animal_name[]" class="form-control"></td>
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
                    url: '{{ route('get-tehsils') }}',
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
                    url: '{{ route("get-ucs") }}',
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
</body>
<!-- Mirrored from colorlib.com/etc/bootstrap-sidebar/sidebar-04/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 10:27:48 GMT -->

</html>
