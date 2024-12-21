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
    .select2-container{
        width: 100% !important;
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
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Farmer Registration By FA</h2>
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

                                <input type="hidden" value="{{ $data->id }}" name="edit_id">
                                <input type="hidden" value="{{ $data->user_type }}" name="user_type">
                                <div class="step step-1">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Personal Details</h4>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Q1. Name: <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{$data->name}}" class="form-control" required>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Q2. Father/Husband Name: <span class="text-danger">*</span></label>
                                            <input type="text" name="father_name" value="{{$data->father_name}}" class="form-control" required>
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q3. CNIC No.: <span class="text-danger">*</span></label>
                                            <input type="text" id="cnic" name="cnic" value="{{$data->cnic}}" class="form-control" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)"  >
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q4. Mobile No.: <span class="text-danger">*</span></label>
                                            <input type="text" id="mobile" name="mobile" class="form-control" value="{{$data->mobile}}" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" >
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q5. District</label>
                                            <input type="text" name="district" value="{{ $district }}" id="district" class="form-control" value="" readonly>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Q6. Taluka: </label>
                                            <select name="tehsil" id="tehsil" class="form-control" required>
                                                @foreach(json_decode($tehsil) as $option)
                                                <option value="{{ $option }}" {{ ($data->tehsil == $option) ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>

                                         @if(Auth::check())
                                        @php
                                        $userUcArray = json_decode(Auth::user()->ucs);
                                        @endphp
                                        @if(is_array($userUcArray))
                                        <div class="mb-3 col-md-6">
                                            <label for="uc">UC</label>
                                            <select name="uc" id="uc" class="form-control">
                                                <option  value="{{ $data->uc }}" selected >{{ $data->uc }}</option>
                                            </select>
                                        </div>
                                        @endif
                                        @endif
                                        @if(Auth::check())
                                        @php
                                        $usertappasArray = json_decode(Auth::user()->tappas);
                                        @endphp
                                        @if(is_array($usertappasArray))
                                        <div class="mb-3 col-md-6">
                                            <label for="tappa">tappa</label>
                                            <select name="tappa" id="tappa" class="form-control">
                                                <option  value="{{ $data->tappa }}" selected >{{ $data->tappa }}</option>
                                            </select>
                                        </div>
                                        @else
                                        @endif
                                        @endif



                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q9. Deh: </label>
                                            <input type="text" value="{{$data->dah}}" name="dah" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Q10. Village: </label>
                                            <input type="text" value="{{$data->village}}" name="village" class="form-control">
                                        </div>

                                        <div class="mb-4 col-md-4 mt-3">
                                            <label class="form-label"><b>Q11. Gender (Tick):</b></label><br>
                                            &nbsp;<label>
                                            <input type="radio" name="gender" value="male" {{($data->gender == 'male') ? 'checked':''}}> Male
                                            </label>
                                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                            <label>
                                            <input type="radio" name="gender" value="female" {{($data->gender == 'female') ? 'checked':''}}> Female
                                            </label>
                                        </div>



                                        <div class="mb-8 col-md-8 mt-3">
                                            <label class="form-label"><b>Q12: Owner Type: </b></label>
                                            <br>
                                            &nbsp;
                                            <label>
                                                <input type="radio" name="owner_type" value="owner" {{($data->owner_type == 'owner') ? 'checked':''}}> 1. Owner
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input type="radio" name="owner_type" value="makadedar" {{($data->owner_type == 'makadedar') ? 'checked':''}}> 2. Makadedar (Contractor/leasee)
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input type="radio" name="owner_type" value="sharecropper" {{($data->owner_type == 'sharecropper') ? 'checked':''}}> 3. sharecropper/Tenant
                                            </label>
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
                                                    <input type="text" name="female_children_under16" value="{{$data->female_children_under16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                </div>
                                            </div>

                                            <div class=" col-md-4 mt-1" style="  padding-left: 0 !important;">
                                                <div style="border:1px solid; display:flex;align-items: center; height: 40px; justify-content:center">
                                                    <h6 class="text-center" style="margin: 0 !important;">Adults > 18 years</h6>
                                                </div>
                                                <div style="border:1px solid; padding: 2%;">
                                                    <input type="text" name="female_Adults_above16" value="{{$data->female_Adults_above16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                </div>
                                            </div>

                                            <div class="mb-4 col-md-4 " style="padding-right: 0 !important;  ">
                                                <div style="border:1px solid; padding: 2%;">
                                                    <input type="text" value="Male" readonly name="" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-4 col-md-4 " style="padding-right: 0 !important;  padding-left: 0 !important;">
                                                <div style="border:1px solid; padding: 2%;">
                                                    <input type="text" name="male_children_under16" value="{{$data->male_children_under16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                </div>
                                            </div>

                                            <div class="mb-4 col-md-4 " style="  padding-left: 0 !important;">
                                                <div style="border:1px solid; padding: 2%;">
                                                    <input type="text" name="male_Adults_above16" value="{{$data->male_Adults_above16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="mb-4 col-md-4 ">
                                                <label class="form-label">Q14: Next of Kin:  Full Name: </label>
                                                <input type="text" name="full_name_of_next_kin" class="form-control" value="{{$data->full_name_of_next_kin}}">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <label class="form-label">CNIC NO:</label>
                                                <input type="text" name="cnic_of_next_kin" class="form-control" value="{{$data->cnic_of_next_kin}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <label class="form-label">Mobile No:</label>
                                                <input type="text" name="mobile_of_next_kin" class="form-control" value="{{$data->mobile_of_next_kin}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                                            </div>
                                        </div>

                                        <div class="row" id="">
                                            <div class="mb-12 col-12">
                                                <label class="form-label"><b>Q15. House Type:</b></label> &nbsp; &nbsp; &nbsp;
                                                <label>
                                                <input type="radio" name="house_type" value="pakka_house" {{($data->house_type == 'pakka_house') ? 'checked':''}}> &nbsp; (1) Pakka House
                                                </label>
                                                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                <label>
                                                <input type="radio" name="house_type" value="kacha_house" {{($data->house_type == 'kacha_house') ? 'checked':''}}> &nbsp; (2) Kacha House
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row" id="">
                                            <div class="mb-12 col-md-12">
                                                <h6>Q16: Landholding:</h6>
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">(1) Total Landholding (Acres):</label>
                                                <input type="text" name="total_landing_acre" value="{{$data->total_landing_acre}}" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">(2) Total Area with Hari(s) (Acres):</label>
                                                <input type="text" name="total_area_with_hari" value="{{$data->total_area_with_hari}}" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">(3) Total self cultivated land (Acres):</label>
                                                <input type="text" name="total_area_cultivated_land" value="{{$data->total_area_cultivated_land}}" class="form-control">
                                            </div>
                                            <div class="mb-6 col-md-6">
                                                <label class="form-label">(4) Total fallow land (Acres):</label>
                                                <input type="text" name="total_fallow_land" value="{{$data->total_fallow_land}}" class="form-control">
                                            </div>
                                            <div class="mt-2 col-md-4">
                                                <label class="form-label">(5) Share:</label>
                                                <input type="text" name="land_share" value="{{$data->land_share}}" class="form-control" >
                                            </div>
                                            <div class="mt-2 col-md-4">
                                                <label class="form-label">(6) Area as per share:</label>
                                                <input type="text" name="land_area_as_per_share" value="{{$data->land_area_as_per_share}}" class="form-control" >
                                            </div>
                                            <div class="mt-2 col-md-4">
                                                <label class="form-label">(7) Survey No:</label>
                                                <input type="text" name="survey_no" value="{{$data->survey_no}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
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
                                                            <th>Total Area (Acres)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="title_tableBody">
                                                        @foreach (json_decode($data->title_name) as $index => $title_name)
                                                        <tr>
                                                            <td><input type="text" name="title_name[]" value="{{$title_name}}" class="form-control"></td>
                                                            <td><input type="text" name="title_cnic[]" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)" value="{{json_decode($data->title_cnic)[$index]}}" class="form-control"></td>
                                                            <td><input type="text" name="title_number[]" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" value="{{json_decode($data->title_number)[$index]}}" class="form-control"></td>
                                                            <td><input type="text" name="title_area[]" value="{{json_decode($data->title_area)[$index]}}" class="form-control"></td>
                                                            <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12" style="justify-content: right; display: flex;">
                                                <button type="button" class="btn btn-primary" id="add_title_row_Btn">Add More</button>
                                            </div>
                                        </div>

                                        <div class="row" id="crops_section">
                                            <h6>Crop Status</h6>
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
                                                        @foreach (json_decode($data->crops) as $index => $crops)
                                                        <tr>
                                                            <td>
                                                                <select name="crop_season[]" style="width:200px" id="" class="crop_season form-control js-example-basic-single">
                                                                    <option value="">Select Season</option>
                                                                    <option value="rabi season" >Rabi Season</option>
                                                                    <option value="kharif season">Kharif Season</option>
                                                                    <option value="orchards">Orchards</option>

                                                                    <option value="{{ json_decode($data->crop_season)[$index] }}" selected>{{ json_decode($data->crop_season)[$index] }}</option>

                                                                    {{-- @foreach (json_decode($data->crop_season) as $crop_season)
                                                                        @if($crop_season != 'rabi_season' || $crop_season != 'kharif_season' || $crop_season != 'orchards')
                                                                            <option value="{{$crop_season}}">{{$crop_season}}</option>
                                                                        @endif
                                                                    @endforeach --}}
                                                                </select>
                                                                {{-- @if(is_array(json_decode($data->crop_season)))
                                                                @if(!in_array(json_decode($data->crop_season)[$index], ['rabi_season', 'kharif_season', 'orchards']))
                                                                    <input type="text" name="other_crop_season[]" value="{{ json_decode($data->crop_season)[$index] }}" id="" class='form-control mt-2' placeholder='Please specify other season'>
                                                                @endif
                                                                @endif --}}
                                                            </td>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12" style="justify-content: right; display: flex;">
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

{{--
                                                <option value="car/jeep" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('car_jeep', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Car/Jeep</option>
                                                <option value="pickup/loader" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('pickup_loader', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Pickup/loader</option>
                                                <option value="motorcycle" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('motorcycle', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Motorcycle</option>
                                                <option value="bicycles" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('bicycles', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Bicycles</option>
                                                <option value="bullock_cart" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('bullock_cart', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Bullock Cart</option>
                                                <option value="Tractor(4wheels)" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('tractor_4wheels', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Tractor (4 wheels)</option>
                                                <option value="disk_harrow" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('disk_harrow', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Disk Harrow</option>
                                                <option value="cultivator" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('cultivator', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Cultivator</option>
                                                <option value="tractor_trolley" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('tractor_trolley', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Tractor Trolley</option>
                                                <option value="plough" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('plough', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Plough (wood or metal)</option>
                                                <option value="laser_lever" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('laser_lever', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Laser lever</option>
                                                <option value="rotavetor" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('rotavetor', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Rotavetor</option>
                                                <option value="thresher" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('thresher', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Thresher</option>
                                                <option value="harvester" @if(is_array(json_decode($data->physical_asset_item))) {{ in_array('harvester', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Harvester</option> --}}
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

                                                <option value="{{ $physical_asset_item }}" selected>{{ $physical_asset_item }}</option>
                                                @endforeach



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
                                                    @foreach (json_decode($data->animal_name) as $index => $animal_name)
                                                    <tr>
                                                        <td>

                                                            <select name="animal_name[]" id="" class="form-control">
                                                                {{-- <option value="">Select Animal</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('poultry_chicken_ducks_etc', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif   value="Poultry_(chicken_ducks_etc)">Poultry (chicken , ducks, etc.)</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('buffalo', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="Buffalo">Buffalo</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('cows', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="Cows">Cows</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('camels', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="Camels">Camels</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('goals', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="Goals">Goals</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('sheep', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="Sheep">Sheep</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('horse_mules', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="Horse_Mules">Horse / Mules</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('donkeys', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="Donkeys">Donkeys</option>
                                                                <option @if(is_array(json_decode($data->animal_name))) {{ in_array('any_other', json_decode($data->animal_name)) ? 'selected' : '' }}  @endif value="any_other">Any Other</option> --}}
                                                                <option value="">Select Animal</option>
                                                                <option value="Poultry (chicken , ducks, etc.)">Poultry (chicken , ducks, etc.)</option>
                                                                <option value="Buffalo">Buffalo</option>
                                                                <option value="Cows">Cows</option>
                                                                <option value="Camels">Camels</option>
                                                                <option value="Goals">Goals</option>
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
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12" style="justify-content: right; display: flex;">
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
                                                <select name="source_of_irrigation" class="form-control" id="source_of_irrigation">
                                                    <option value="canal_well" {{ ($data->source_of_irrigation == 'canal_well') ? 'selected':''}}>(1) Canal System</option>
                                                    <option value="tube_well" {{ ($data->source_of_irrigation == 'tube_well') ? 'selected':''}}>(2) Tube Well</option>
                                                    <option value="rain_barrani" {{ ($data->source_of_irrigation == 'rain_barrani') ? 'selected':''}}>(3) Rain/Barrani</option>
                                                    <option value="kaccha_area" {{ ($data->source_of_irrigation == 'kaccha_area') ? 'selected':''}}>(4) Kaccha Area</option>
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
                                                <input type="text" name="area_length"  class="form-control" value="{{$data->area_length}}">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Total Command Area (Acres)</label>
                                                <input type="text" name="total_command_area" class="form-control" value="{{$data->total_command_area}}">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Area length</label>
                                                <select class="form-control" id="lined_unlined" name="line_status" value="">
                                                    <option value="">Select Lined/Unlined</option>
                                                    <option value="lined" {{($data->line_status == 'lined') ? 'selected':''}}>lined</option>
                                                    <option value="unlined" {{($data->line_status == 'unlined') ? 'selected':''}}>Unlind</option>
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
                                            <input type="text" name="account_title" value="{{$data->account_title}}" class="form-control" >
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Q24: Account No</label>
                                            <input type="text" name="account_no" class="form-control" value="{{$data->account_no}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q25: Bank Name</label>
                                            <input type="text" name="bank_name"  class="form-control" value="{{$data->bank_name}}">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q26: Branch Name</label>
                                            <input type="text" name="branch_name" value="{{$data->branch_name}}" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q27: IBAN</label>
                                            <input type="text" name="IBAN_number" value="{{$data->IBAN_number}}" class="form-control" >
                                        </div>
                                        <div class="mb-6 col-md-6 mt-2">
                                            <label class="form-label">Q28: Branch Code</label>
                                            <input type="text" name="branch_code" value="{{$data->branch_code}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)">
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
                                        <!-- Modal -->
                                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        </div> --}}

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
                                            <label class="form-label">Forms VII/ VIII A/ Affidavit/ Heirship / Registry from Micro (Land Documents)  <span class="text-danger" > *</span> <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="upload_land_proof" class="form-control checkfiles" onchange="checkFiles()">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Photo  <span class="text-danger" > *</span> <br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="upload_farmer_pic" class="form-control checkfiles" onchange="checkFiles()">
                                        </div>
                                        <div class="mb-6 col-md-6 mt-3">
                                            <label class="form-label">Others<br><span class="text-danger" style="font-size: smaller">"jpg/png/jpeg" (IMAGE SIZE MUST BE 500KB)</span> </label>
                                            <input type="file" name="upload_other_attach" class="form-control" >
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
                                    <button type="button" class="btn btn-secondary mt-5" onclick="prevStep(4)">Previous</button>
                                    <button type="submit" class="btn btn-primary mt-5" id="submitbtn" disabled>Submit</button>

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

<script>

$(document).ready(function() {
    $('body').on('change','.crop_season', function() {
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

$('#abc').on('click',function(){
    $('#exampleModal').modal('show');
})
    $('#add_title_row_Btn').click(function() {
        const newRow = `
            <tr>
                <td><input type="text" name="title_name[]" class="form-control"></td>
                <td><input type="text" name="title_cnic[]" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)" class="form-control"></td>
                <td><input type="text" name="title_number[]" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" class="form-control"></td>
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
                    <select name="crop_season[]" id="" style="width:200px" class="crop_season form-control js-example-basic-single">
                        <option value="" >Select Season</option>
                        <option value="rabi season" >Rabi Season</option>
                        <option value="kharif season">Kharif Season</option>
                        <option value="orchards">Orchards</option>
                    </select>
                </td>
                <td><input type="text" name="crops[]" class="form-control"></td>
                <td><input type="text" name="crop_area[]" class="form-control"></td>
                <td><input type="text" name="crop_average_yeild[]" class="form-control"></td>
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
                    <select name="animal_name[]" id="" class="form-control js-example-basic-single">
                       <option value="">Select Animal</option>
                        <option value="Poultry (chicken , ducks, etc.)">Poultry (chicken , ducks, etc.)</option>
                        <option value="Buffalo">Buffalo</option>
                        <option value="Cows">Cows</option>
                        <option value="Camels">Camels</option>
                        <option value="Goals">Goals</option>
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
    if($(this).val() == 'tube_well')
    {
         $('#source_of_irrigation_section').append(`
         <div class="mb-6 col-md-6" id="source_of_energy_section">
                <label class="form-label">Q21: Source of energy</label>
                <select name="source_of_irrigation_engery" style="width:300px" class="form-control js-example-basic-single" id="source_of_energy">
                    <option value="electricity">Electricity</option>
                    <option value="solar">Solar</option>
                    <option value="Petrol/Diesel/Gas">Petrol/Diesel/Gas</option>
                </select>
            </div>
         `);
         $('#source_of_energy_section').find('.js-example-basic-single').last().select2({
            tags: true, // Enable the user to add custom tags
        });
    }
    else{
        $('#source_of_energy_section').remove();
    }
});


if('{{$data->source_of_irrigation}}' == 'tube_well'){

    $('#source_of_irrigation_section').append(`
         <div class="mb-6 col-md-6" id="source_of_energy_section">
                <label class="form-label">Q21: Source of energy</label><br>
                <select name="source_of_irrigation_engery"  class="form-control js-example-basic-single" id="source_of_energy">
                    <option value="electricity">Electricity</option>
                    <option value="solar">Solar</option>
                    <option value="Petrol/Diesel/Gas">Petrol/Diesel/Gas</option>
                    <option value="{{$data->source_of_irrigation_engery}}" selected>{{$data->source_of_irrigation_engery}}</option>
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
                <label class="form-label">Line length in (Meter)</label>
                <input type="text" name="lined_length" value="{{$data->lined_length}}" class="form-control">
            </div>
        </div>
    </div>
    `);
}


$('#lined_unlined').change(function() {
    if($(this).val() == 'lined')
    {
        $('#status_of_water_section').append(`
        <div class="mb-3 col-md-3" id="lined_section" >
            <div class="row">
                <div class="mb-12 col-md-12" >
                    <label class="form-label">Line length in (Meter)</label>
                    <input type="text" name="lined_length" value="{{$data->lined_length ?? ''}}" class="form-control">
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
    // nextStep(1);
</script>


</body>

</html>




