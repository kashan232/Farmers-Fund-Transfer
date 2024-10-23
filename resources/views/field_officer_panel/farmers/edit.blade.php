@include('field_officer_panel.include.header_include')
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
    @include('field_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('field_officer_panel.include.navbar_include')
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
                                <div class="step step-1">
                                    <div class="row mt-2">
                                        <h4 class="card-title">Personal Details</h4>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" value="{{$data->name}}" name="name" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" value="{{$data->father_name}}"  name="father_name" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">CNIC</label>
                                            <input type="text" value="{{$data->cnic}}" name="cnic" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" value="{{$data->mobile}}" name="mobile" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Dictrict</label>
                                            <input type="text" name="district"  id="district" class="form-control" value="{{ $district }}" readonly>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Tehsil</label>
                                            <select name="tehsil" id="tehsil" class="form-control">
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
                                            <label class="form-label">DAH</label>
                                            <input type="text" value="{{$data->dah}}" name="dah" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6 py-2">
                                            <label class="form-label">Village</label>
                                            <input type="text" value="{{$data->village}}" name="village" class="form-control">
                                        </div>
                                        <div class="mb-4 col-md-4 mt-3">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="female" {{($data->gender == 'female') ? 'selected':''}}>Female</option>
                                                <option value="male" {{($data->gender == 'male') ? 'selected':''}} >Male</option>
                                            </select>
                                        </div>
                                        <div class="mb-4 col-md-4 mt-3">
                                            <label class="form-label">House Type</label>
                                            <select name="house_type" id="house_type" class="form-control">
                                                <option value="pakka_house" {{($data->house_type == 'pakka_house') ? 'selected':''}}>Pakka House</option>
                                                <option value="kacha_house" {{($data->house_type == 'kacha_house') ? 'selected':''}}>Kacha House</option>
                                            </select>
                                        </div>
                                        <div class="mb-4 col-md-4 mt-3">
                                            <label class="form-label">Owner Type</label>
                                            <select name="owner_type" id="" class="form-control">
                                                <option value="owner" {{($data->owner_type == 'owner') ? 'selected':''}} >Owner</option>
                                                <option value="makandar" {{($data->owner_type == 'makandar') ? 'selected':''}}>Makandar</option>
                                            </select>
                                        </div>
                                        <div class="row mt-2">
                                            <h6>Family Composition</h6>
                                            <div class="mb-4 col-md-4 mt-3">
                                                <h6 class="text-center">Gender</h6>
                                                <input type="text" value="Female" readonly  class="form-control">
                                            </div>
                                            <div class="mb-4 col-md-4 mt-3">
                                                <h6 class="text-center">Children < 16 </h6>
                                                <input type="text" name="female_children_under16" value="{{$data->female_children_under16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            </div>
                                            <div class="mb-4 col-md-4 mt-3">
                                                <h6 class="text-center">Adults > 16 </h6>
                                                <input type="text" name="female_Adults_above16" value="{{$data->female_Adults_above16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <input type="text" value="Male" readonly class="form-control">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <input type="text" name="male_children_under16" value="{{$data->male_children_under16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            </div>
                                            <div class="mb-4 col-md-4 ">
                                                <input type="text" name="male_Adults_above16" value="{{$data->male_Adults_above16}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                                            </div>
                                        </div>

                                        <div class="row mt-3" id="">
                                            <h6>Landholding & Cropping</h6>
                                            <div class="row" >
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total Landholding (Acre)</label>
                                                    <input type="text" name="total_landing_acre" value="{{$data->total_landing_acre}}" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total Area with Hari(s)</label>
                                                    <input type="text" name="total_area_with_hari" value="{{$data->total_area_with_hari}}" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total self cultivated land</label>
                                                    <input type="text" name="total_area_cultivated_land" value="{{$data->total_area_cultivated_land}}" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Total fallow land</label>
                                                    <input type="text" name="total_fallow_land" value="{{$data->total_fallow_land}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row " id="no_title_section">
                                            <h6>Titleee</h6>
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
                                                <button type="button"  class="btn btn-primary" id="add_title_row_Btn">Add More</button>
                                            </div>
                                        </div>

                                        <div class="row" id="crops_section">
                                            <h6>Crop Status</h6>
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
                                                        @foreach (json_decode($data->crops) as $index => $crops)
                                                        <tr>
                                                            <td><input type="text" name="crops[]" value="{{$crops}}"  class="form-control"></td>
                                                            <td><input type="text" name="crop_area[]" value="{{json_decode($data->crop_area)[$index]}}" class="form-control"></td>
                                                            <td><input type="text" name="crop_average_yeild[]" value="{{json_decode($data->crop_average_yeild)[$index]}}" class="form-control"></td>
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
                                        <div class="row py-2" id="physical_assets_section">
                                            <h6>Physical Assets Currently Owned </h6>
                                            <div class="row physical_asset-default-row" >
                                                <div class="mb-8 col-md-8">
                                                    <label class="form-label">Items</label>
                                                    <select name="physical_asset_item[]"  id="physical_asset_item"  class="form-control--input js-example-basic-multiple" style="width: 100%" multiple="multiple">
                                                        <option value="car/jeep" @if(is_array($data->physical_asset_item)) {{ in_array('car/jeep', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Car/Jeep</option>
                                                        <option value="pickup/loader" @if(is_array($data->physical_asset_item)) {{ in_array('pickup/loader', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Pickup/loader</option>
                                                        <option value="motorcycle" @if(is_array($data->physical_asset_item)) {{ in_array('motorcycle', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Motorcycle</option>
                                                        <option value="bicycles" @if(is_array($data->physical_asset_item)) {{ in_array('bicycles', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Bicycles</option>
                                                        <option value="bullock_cart" @if(is_array($data->physical_asset_item)) {{ in_array('bullock_cart', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Bullock Cart</option>
                                                        <option value="Tractor(4wheels)" @if(is_array($data->physical_asset_item)) {{ in_array('Tractor(4wheels)', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Tractor (4 wheels)</option>
                                                        <option value="disk_harrow" @if(is_array($data->physical_asset_item)) {{ in_array('disk_harrow', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Disk Harrow</option>
                                                        <option value="cultivator" @if(is_array($data->physical_asset_item)) {{ in_array('cultivator', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Cultivator</option>
                                                        <option value="tractor_trolley" @if(is_array($data->physical_asset_item)) {{ in_array('tractor_trolley', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Tractor Trolley</option>
                                                        <option value="plough" @if(is_array($data->physical_asset_item)) {{ in_array('plough', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Plough (wood or metal)</option>
                                                        <option value="thresher" @if(is_array($data->physical_asset_item)) {{ in_array('thresher', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Thresher</option>
                                                        <option value="harvester" @if(is_array($data->physical_asset_item)) {{ in_array('harvester', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Harvester</option>
                                                        <option value="rotavetor" @if(is_array($data->physical_asset_item)) {{ in_array('rotavetor', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Rotavetor</option>
                                                        <option value="laser_lever" @if(is_array($data->physical_asset_item)) {{ in_array('laser_lever', json_decode($data->physical_asset_item)) ? 'selected' : '' }}  @endif>Laser lever</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row py-2" id="poultry_assets_section">
                                            <h6>Livestock and Poultry Assets Currently Owned</h6>
                                            <div class="col-12">
                                                <table id="poultry_assets_table" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Animal</th>
                                                            <th>Numbers</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="poultry_assets_tableBody">
                                                        @foreach (json_decode($data->animal_name) as $index => $animal_names)
                                                        <tr>
                                                            <td><input type="text" name="animal_name[]"  value="{{$animal_names}}" class="form-control"></td>
                                                            <td><input type="text" name="animal_qty[]" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5)" value="{{json_decode($data->animal_qty)[$index]}}" class="form-control"></td>
                                                            <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12" style="justify-content: right; display: flex;">
                                                <button type="button"  class="btn btn-primary" id="add_poultry_assets_row_Btn">Add More</button>
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
                                                    <option value="canal_wall" {{($data->source_of_irrigation == 'canal_wall') ? 'selected':''}}>Canal System</option>
                                                    <option value="tube_wall" {{($data->source_of_irrigation == 'tube_wall') ? 'selected':''}}>Tube Wall</option>
                                                </select>
                                            </div>
                                            @if ($data->source_of_irrigation == 'tube_wall')
                                            <div class="mb-6 col-md-6" id="source_of_energy_section">
                                                <label class="form-label">Source of energy</label>
                                                <select name="source_of_irrigation_engery"  class="form-control" id="source_of_energy">
                                                    <option value="Electricity" {{($data->source_of_irrigation_engery == 'Electricity') ? 'selected':''}}>Electricity</option>
                                                    <option value="Solar" {{($data->source_of_irrigation_engery == 'Solar') ? 'selected':''}}>Solar</option>
                                                    <option value="Fuel" {{($data->source_of_irrigation_engery == 'Fuel') ? 'selected':''}}>Fuel</option>
                                                </select>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <h6>Status of water</h6>
                                        <div class="row" id="status_of_water_section">
                                            <div class="mb-3 col-md-3" >
                                                <label class="form-label">Area length</label>
                                                <input type="text" name="area_length"  value="{{$data->area_length}}" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-3" >
                                                <label class="form-label">Area length</label>
                                                <select class="form-control" id="lined_unlined" name="line_status">
                                                    <option value="">Select Lined/Unlined</option>
                                                    <option value="lined" {{($data->line_status == 'lined') ? 'selected':''}}>lined</option>
                                                    <option value="unlined" {{($data->line_status == 'unlined') ? 'selected':''}}>Unlind</option>
                                                </select>
                                            </div>
                                            @if ($data->line_status == 'lined')
                                            <div class="mb-6 col-md-6" id="lined_section" >
                                                <div class="row">
                                                <div class="mb-6 col-md-6" >
                                                    <label class="form-label">Lined Length</label>
                                                    <input type="text" value="{{$data->lined_length}}" name="lined_length" class="form-control">
                                                </div>
                                                <div class="mb-6 col-md-6" >
                                                    <label class="form-label">Total Command Area</label>
                                                    <input type="text" value="{{$data->total_command_area}}" name="total_command_area" class="form-control">
                                                </div>
                                                </div>
                                            </div>
                                            @endif
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
                                            <input type="text" value="{{$data->account_title}}"  name="account_title" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Account No</label>
                                            <input type="text" value="{{$data->account_no}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)" name="account_no" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" value="{{$data->bank_name}}" name="bank_name" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Branch Name</label>
                                            <input type="text" value="{{$data->branch_name}}" name="branch_name" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">IBAN</label>
                                            <input type="text" value="{{$data->IBAN_number}}" name="IBAN_number" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20)">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Branch Code</label>
                                            <input type="text" value="{{$data->branch_code}}" name="branch_code" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8)">
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
    @include('field_officer_panel.include.footer_copyright_include')
</footer>

@include('field_officer_panel.include.footer_include')
<script>

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
                <td><input type="text" name="animal_qty[]"  class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5)"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
            </tr>
        `;
        $('#poultry_assets_tableBody').append(newRow);
    });

    // Delete row on clicking "Delete" button
    $('#poultry_assets_tableBody').on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
    });





$('#source_of_irrigation').change(function() {
    if($(this).val() == 'tube_wall')
    {
         $('#source_of_irrigation_section').append(`
         <div class="mb-6 col-md-6" id="source_of_energy_section">
            <label class="form-label">Source of energy</label>
            <select name="source_of_irrigation_engery"  class="form-control" id="source_of_energy">
                <option value="Electricity">Electricity</option>
                <option value="Solar">Solar</option>
                <option value="Fuel">Fuel</option>
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
                <input type="text" name="lined_length" class="form-control">
            </div>
            <div class="mb-6 col-md-6" >
                <label class="form-label">Total Command Area</label>
                <input type="text" name="total_command_area" class="form-control">
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
    nextStep(1);
</script>
</body>

</html>
