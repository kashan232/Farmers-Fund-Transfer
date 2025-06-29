<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('select2.min.css') }}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/viewerjs/dist/viewer.min.css" />

</head>
<style>
    .question {
        width: 60px !important;
        text-align: center;
        color: black;
    }

    table {
        text-transform: capitalize;
    }

    tr td {
        /* text-align: center; */
    }

    tr td i {
        font-size: 20px;
        color: green;
        font-weight: bolder;
    }

    th,
    td {
        font-size: 12px;
    }
    .page-break {
        page-break-after: always; /* Forces a page break after the element */
    }
    @media print {
        .question {
            width: 100%;
            /* Ya jitna required ho utna set karein */
            word-wrap: break-word;
            /* Overflow handle karne ke liye */
        }

        body {
            margin: 0;
            padding: 0;
        }

        .print-cancel {
            border: none;
        }

        .print-cancel-child {
            border: none;
        }

    }

    .question {
        overflow: hidden;
        text-overflow: ellipsis;
        /* Agar text cut karna ho */
        white-space: normal;
        /* Text ko wrap karne ke liye */
    }

    .container {
        width: 80%;
        /* Ya jitni required hai */
        margin: 0 auto;
        /* Center alignment ke liye */
    }

    /* Full-page overlay style */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent black */
        display: none;
        /* Initially hidden */
        justify-content: center;
        align-items: center;
        z-index: 9999;
        /* Ensure it's on top */
    }

    /* Disable pointer events (no click events on background) */
    .no-click {
        pointer-events: none;
        /* Disable clicks on the body */
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
    #reasonBox
    {
        display: none;
    }






</style>
{{-- {{dd($data->city)}} --}}
<body style="position: relative;">


    @if($data->verification_status == 'verified_by_lrd')

    <img src="{{ asset('vstamp.png') }}" alt=""
         style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: 0;
            width: 400px; /* optional: adjust size */
         ">

    @endif

    @if($data->verification_status == 'rejected_by_lrd')

    <img src="{{ asset('rejected.png') }}" alt=""
         style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: 0;
            width: 400px; /* optional: adjust size */
         ">

    @endif



    <div id="loader" style="position: fixed; top:0; left:0; width:100%; height:100%; background:white; z-index:9999; display:flex; align-items:center; justify-content:center;">
        <h1>Loading...</h1>
    </div>

    <script>
        window.addEventListener('load', function () {
            document.getElementById('loader').style.display = 'none';
            document.getElementById('content').style.display = 'block';
        });
    </script>


    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Farmers Verification</h5>
                    <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></span>
                </div>
                <div class="modal-body">

                    @if(Auth::user()->usertype == 'Agri_Officer')
                    <form id="verifyfarmers" action="{{ route('verify-farmer-by-ao') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="statusSelect">Status</label>
                            <input type="hidden" id="farmer_id" name="farmer_id" value="" readonly>
                            <select class="form-control" id="statusSelect" name="verification_status">
                                <option value="verified_by_ao" selected>Verified</option>
                                <option value="rejected_by_ao" >Unverified</option>
                            </select>
                        </div>
                        <div class="form-group" id="reasonBox" >
                            <label for="reasonTextarea">Reason</label>
                            <select id="reasonTextarea" name="declined_reason" class="form-control js-example-basic-single">
                                <option value="Banks Details Not Valid">Banks Details Not Valid</option>
                                <option value="Form Seven(07) Not Valid">Form Seven(07) Not Valid</option>
                                <option value="Attachments are not cleared">Attachments are not cleared</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group" id="other_reason_Box" style="display: none">
                            <label for="reasonTextarea">Other Reason:</label>
                            <textarea name="other_reason" id="other_reason" class="form-control">

                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>

                    @elseif (Auth::user()->usertype == 'Field_Officer')
                    <form id="verifyfarmers" action="{{ route('verify-farmer-by-fa') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="statusSelect">Status:</label>
                            <input type="hidden" id="farmer_id" name="farmer_id"  value="" readonly>
                            <select class="form-control" id="statusSelect" name="verification_status">
                                <option value="verified_by_fa">Verified</option>
                                <option value="rejected_by_fa">Unverified</option>
                            </select>
                        </div>
                        <div class="form-group" id="reasonBox" style="display: none;">
                            <label for="reasonTextarea">Reason:</label>
                            <select id="reasonTextarea" name="declined_reason" class="form-control js-example-basic-single" >
                                <option value="Banks Details Not Valid">Banks Details Not Valid</option>
                                <option value="Form Seven(07) Not Valid">Form Seven(07) Not Valid</option>
                                <option value="Attachments are not cleared">Attachments are not cleared</option>
                                <option value="other">Other</option>

                            </select>
                        </div>
                        <div class="form-group" id="other_reason_Box" style="display: none">
                            <label for="reasonTextarea">Other Reason:</label>
                            <textarea name="other_reason" id="other_reason" class="form-control">

                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>


                    @elseif (Auth::user()->usertype == 'DD_Officer')
                    <form id="verifyfarmers" action="{{ route('verify-farmer-by-dd') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="statusSelect">Status</label>
                            <input type="hidden" id="farmer_id" name="farmer_id"  value="" readonly>
                            <select class="form-control" id="statusSelect" name="verification_status">
                                <option value="verified_by_dd">Verified</option>
                                <option value="rejected_by_dd">Unverified</option>
                            </select>
                        </div>
                        <div class="form-group" id="other_reason_Box" style="display: none">
                            <label for="reasonTextarea">Other Reason:</label>
                            <textarea name="other_reason" id="other_reason" class="form-control">

                            </textarea>
                        </div>
                        <div class="form-group" id="reasonBox" style="display: none;">
                            <label for="reasonTextarea">Reason</label>
                            <select id="reasonTextarea" name="declined_reason" class="form-control js-example-basic-single" >
                                <option value="Banks Details Not Valid">Banks Details Not Valid</option>
                                <option value="Form Seven(07) Not Valid">Form Seven(07) Not Valid</option>
                                <option value="Attachments are not cleared">Attachments are not cleared</option>
                                <option value="other">Other</option>


                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>
                    @elseif(Auth::user()->usertype == 'Land_Revenue_Officer')
                    <form id="verifyfarmers" action="{{ route('verify-farmer-by-land-officer') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="statusSelect">Status</label>
                            <input type="hidden" id="farmer_id" name="farmer_id"  value="" readonly>
                            <select class="form-control" id="statusSelect" name="verification_status">
                                <option value="verified_by_lrd">Verified</option>
                                <option value="rejected_by_lrd">Unverified</option>
                            </select>
                        </div>
                        <div class="form-group" id="reasonBox" style="display: none;">
                            <label for="reasonTextarea">Reason</label>
                            <select id="reasonTextarea" name="declined_reason" class="form-control js-example-basic-single">
                                <option value="Banks Details Not Valid">Banks Details Not Valid</option>
                                <option value="Form Seven(07) Not Valid">Form Seven(07) Not Valid</option>
                                <option value="Attachments are not cleared">Attachments are not cleared</option>
                                <option value="other">Other</option>


                            </select>
                        </div>
                        <div class="form-group" id="other_reason_Box" style="display: none">
                            <label for="reasonTextarea">Other Reason:</label>
                            <textarea name="other_reason" id="other_reason" class="form-control">

                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>
                    @else
                    @endif



                </div>
            </div>
        </div>
    </div>


@php
    // Assuming front_id_card contains the path to the image file
    $imagePath = public_path(
        'check.png'
    );

    // Check if the image exists before encoding
    if (file_exists($imagePath)) {
        $imageData = base64_encode(file_get_contents($imagePath));
        $check = 'data:image/jpeg;base64,' . $imageData;
    } else {
        $check = '';
    }
@endphp




    <!-- Full-page loader with fade background -->
    <div class="overlay" id="loader-overlay">
        <div class="spinner-border" role="status">

        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-12 text-right">
                <div class="card-body">
                    <button class="btn btn-primary btn-sm" onclick="history.back()">Back</button>
                    {{-- <button class="btn btn-success btn-sm" onclick="downloadPDF()">Download PDF</button> --}}
                    <a  class="btn btn-success btn-sm" href="{{route('pdf.report',$data->id)}}">Download PDF</a>


                    @if (Auth::user()->usertype == 'Field_Officer')
                        @if ( $data->usertype != 'Online')
                            <button type="button" class="btn btn-sm btn-success verifiy-btn "
                                data-id="{{ $data->id }}">Verify</button> &nbsp;
                        @endif
                    @endif


                    @if (Auth::user()->usertype != 'Field_Officer' && Auth::user()->usertype == 'Agri_Officer')
                        @if ( $data->verification_status != 'verified_by_lrd' && $data->verification_status != 'verified_by_dd' && $data->verification_status != 'verified_by_ao')
                            <button type="button" class="btn btn-sm btn-success verifiy-btn "
                                data-id="{{ $data->id }}">Verify</button> &nbsp;
                        @endif
                    @endif

                   {{-- {{ dd($data->user_type)}} --}}
                    {{-- @if (Auth::user()->usertype != 'Field_Officer' && Auth::user()->usertype == 'DD_Officer')
                        @if ($data->verification_status != 'verified_by_do' && $data->verification_status != 'verified_by_dd')
                            <button type="button" class="btn btn-sm btn-success verifiy-btn "
                                data-id="{{ $data->id }}">Verify</button> &nbsp;
                        @endif
                    @endif --}}

                    @if (Auth::user()->usertype != 'Field_Officer' && Auth::user()->usertype == 'Land_Revenue_Officer')
                    @if ($data->verification_status != 'verified_by_do' && $data->verification_status != 'verified_by_lrd')
                        <button type="button" class="btn btn-sm btn-success verifiy-btn "
                            data-id="{{ $data->id }}">Verify</button> &nbsp;
                    @endif
                    @endif



                </div>
            </div>
        </div>

        <div class="row" id="farmer-details-table">
            <div class="logo-container " style="margin: auto; text-align: center;">
                @php
                // Define the correct file path
                $filePath = public_path('assets/images/Sindh_Hari_Card.png');

                // Check if the image file exists
                if (file_exists($filePath)) {
                    $imageData = base64_encode(file_get_contents($filePath));
                    $imageSrc = 'data:image/png;base64,' . $imageData;
                } else {
                    $imageSrc = asset('assets/images/default.png'); // Default image in case of error
                }
            @endphp

            <img src="{{ $imageSrc }}" alt="logo image" class="logo-lg" style="max-width:120px;" />


                <h1 style="margin: 0; font-size: 30px;">Benazir Hari Card</h1>
                <h3 style="margin: 0; font-size: 20px;">Registration Form</h3>
            </div>
            <div class="col-sm-12">
                <div class="">
                    <div class="card-body">
                        <table class="table table-bordered" cellspadding="20px">
                            <tr>
                                <th colspan="8">SECTION I. GROWER INFORMATION</th>
                            </tr>
                            <tr>
                                <th class="question"> Q1.</th>
                                <td colspan="3" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Name : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->name }}</span></td>
                                <td colspan="3" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q2.&nbsp&nbsp Father/Husband Name : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->father_name }}</span></td>

                                        <td colspan="2">
                                            <span> <b> Q2(B). &nbsp;&nbsp; Surname : </b> </span> <span
                                                style="border-bottom: 1px solid black;">{{ $data->surname ?? '' }}</span>
                                        </td>

                            </tr>
                            <tr>
                                <th class="question"> Q3.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b> CNIC No:</b></span> <span
                                        style="border-bottom: 1px solid black; padding-right:3%">{{ $data->cnic }}</span> <b>Issue Date:</b> <u>{{ $data->cnic_issue_date }}</u>  &nbsp; &nbsp; <b>EXP Date:</b>  <u>{{ $data->cnic_expiry_date }}</u></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q4.&nbsp; &nbsp; Mobile No : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->mobile }}</span></td>
                            </tr>
                            <tr>
                                <th class="question"> Q5.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>District : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->district }}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q6.&nbsp&nbsp Taluka : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->tehsil }}</span></td>
                            </tr>
                            <tr>
                                <th class="question"> Q7.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Union Council : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->uc }}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q8. &nbsp&nbsp Tappa : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->tappa }}</span></td>
                            </tr>
                            <tr>
                                <th class="question"> Q9.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Deh : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->dah }}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q10.&nbsp&nbsp Village : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->village }}</span></td>
                            </tr>
                            <tr>
                                <th class="question"> Q11.</th>

                                <td colspan="3" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Gender :&nbsp&nbsp&nbsp {!! $data->gender == 'male' ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                            </b> Male&nbsp &nbsp&nbsp<b> {!! $data->gender == 'female' ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                            </b>Female &nbsp&nbsp<span></span></span> </td>
                                <td colspan="5" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q12.&nbsp&nbsp Owner Type: </b>&nbsp&nbsp&nbsp @if(is_array(json_decode($data->owner_type))) {!! in_array('owner', json_decode($data->owner_type)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  @endif
                                        1.Owner &nbsp&nbsp&nbsp&nbsp&nbsp @if(is_array(json_decode($data->owner_type))) {!! in_array('makadedar', json_decode($data->owner_type)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  @endif 2.
                                        Makadedar(Contractor/leasee)
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @if(is_array(json_decode($data->owner_type))) {!! in_array('sharecropper', json_decode($data->owner_type)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  @endif 3. Sharecropper/Tenant
                                    </span> </td>

                            </tr>
                            <tr>
                                <th rowspan="2" class="question">Q13.</th>
                                <th colspan="8  ">Family Composition and age of respondent</th>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <div class="family   row p-3">
                                        <div class="col-lg-2 border text-center p-2 p-2"><b>Gender</b></div>
                                        <div class="col-lg-5 border text-center p-2"><b>Children < 18 years</b>
                                        </div>
                                        <div class="col-lg-5 border text-center p-2"><b>Adults > 18 years </b></div>
                                        <div class="col-lg-2 border text-center p-2"><b>Female</b></div>
                                        <div class="col-lg-5 border text-center p-2">
                                            {{ $data->female_children_under16 }}</div>
                                        <div class="col-lg-5 border text-center p-2">
                                            {{ $data->female_Adults_above16 }}</div>
                                        <div class="col-lg-2 border text-center p-2"><b>Male</b></div>
                                        <div class="col-lg-5 border text-center p-2">
                                            {{ $data->male_children_under16 }}</div>
                                        <div class="col-lg-5 border text-center p-2">
                                            {{ $data->male_children_under16 }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q14.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Next of Kin : Full Name : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->full_name_of_next_kin }}</span>&nbsp&nbsp&nbsp<span>
                                        <b> CNIC No : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->cnic_of_next_kin }}</span>&nbsp&nbsp&nbsp<span>
                                        <b>Mobile No </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->mobile_of_next_kin }}</span>
                                </td>

                            </tr>
                            <tr>
                                <th class="question"> Q15.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>House type: &nbsp; &nbsp; &nbsp; </b> @if($data->house_type == 'pakka_house') <i class="fa-solid fa-check"></i> @endif (1) Paka House </span>
                                    <span style="border-bottom: 1px solid black;"></span>&nbsp; &nbsp; &nbsp; <span>
                                        @if($data->house_type == 'kacha_house') <i class="fa-solid fa-check"></i> @endif (2) Kacha House </span>
                                    <span style="border-bottom: 1px solid black;"></span>

                            </tr>
                            <tr>
                                <th class="question" rowspan="6"> Q16.</th>
                                <td colspan="8"><b>Landholding</b></td>
                            </tr>
                            <tr>

                                <td colspan="4" style="border: none;"><span> <b>(1)Total Landholding (Acres) :
                                        </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->total_landing_acre }}</span>
                                </td>
                                <td colspan="4" style="border: none;"><span> <b>(2)Total Area with Hari(s) (Acres)
                                            : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->total_area_with_hari }}</span>
                                </td>

                            </tr>
                            <tr>

                                <td colspan="4" style="border: none;"><span> <b>(3)Total self-cultivated land
                                            (Acres) : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->total_area_cultivated_land }}</span>
                                </td>
                                <td colspan="4" style="border: none;"><span> <b>(4)Total fallow land (Acres) : </b>
                                    </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->total_fallow_land }}</span>
                                </td>

                            </tr>

                            <tr>

                                <td colspan="4" style="border: none;"><span> <b>(5) Share : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->land_share }}</span></td>
                                <td colspan="2" style="border: none;"><span> <b>(6) Area as per share: </b> </span>
                                    <span
                                        style="border-bottom: 1px solid black;">{{ $data->land_area_as_per_share }}</span>
                                </td>
                                <td style="border: none;"><span> <b>(7) Survey No : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->survey_no }}</span></td>

                            </tr>
                            <tr>
                                <td colspan="8"><b>Particulars of Tenants / Sharecropper</b></td>
                            </tr>
                            <tr>
                                <td colspan="2  "><b>Full Name</b></td>
                                <td colspan="2 " class="text-center"><b>CNIC Number</b></td>
                                <td colspan="2 " class="text-center"><b>Mobile</b></td>
                                <td colspan="2 " class="text-center"><b>Total Area (Acres)</b></td>
                            </tr>
                            @if (!empty($data->title_name) && is_string($data->title_name))
                            @php
                                $titles = json_decode($data->title_name, true);
                                $cnics = json_decode($data->title_cnic, true);
                                $numbers = json_decode($data->title_number, true);
                                $areas = json_decode($data->title_area, true);
                            @endphp

                            @if (is_array($titles))
                                @foreach ($titles as $index => $title)
                                    <tr>
                                        <th class="question"> {{ $index + 1 }}</th>
                                        <td colspan="2">{{ $title }}</td>
                                        <td colspan="2" class="text-center">{{ $cnics[$index] ?? '' }}</td>
                                        <td colspan="2" class="text-center">{{ $numbers[$index] ?? '' }}</td>
                                        <td colspan="2" class="text-center">{{ $areas[$index] ?? '' }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endif


                            <tr>
                                <th rowspan="2" class="question">Q 17.</th>
                                <th colspan="8"> B. Crops Status</th>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td
                                                style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;">
                                                <b>Rabi Season</b></td>
                                            <td
                                                style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;">
                                                <b>Kharif Season</b></td>
                                            {{-- <td style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;"><b>Orchards</b></td> --}}
                                            <td
                                                style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;">
                                                <b>Other</b></td>

                                        </tr>
                                        <tr>
                                            <td style="width: 12.5%;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Crop(s)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Orchard</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Area (Acres)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    @if (!empty($data->crops) && is_string($data->crops))
                                                    @php
                                                        $crops = json_decode($data->crops, true);
                                                        $cropSeasons = json_decode($data->crop_season, true);
                                                        $cropsOrchard = json_decode($data->crops_orchard, true);
                                                        $cropArea = json_decode($data->crop_area, true);
                                                        $cropAverageYield = json_decode($data->crop_average_yeild, true);
                                                    @endphp

                                                    @if (is_array($crops))
                                                        @foreach ($crops as $index => $crop)
                                                            @if (!empty($cropSeasons[$index]) && $cropSeasons[$index] == 'rabi_season')
                                                                <tr>
                                                                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ $crop }}</td>
                                                                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ $cropsOrchard[$index] ?? '' }}</td>
                                                                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ $cropArea[$index] ?? '' }}</td>
                                                                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ $cropAverageYield[$index] ?? '' }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif


                                                </table>
                                            </td>
                                            <td style="width: 12.5%;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Crop(s)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Orchard</b></td>

                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Area (Acres)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    {{-- @if (is_array($data->crop_season) || is_string($data->crop_season))
                                                        @php
                                                            // Decoding the JSON if it's a JSON string
                                                            $cropSeasons = is_string($data->crop_season)
                                                                ? json_decode($data->crop_season)
                                                                : $data->crop_season;
                                                        @endphp
                                                        @foreach (json_decode($data->crops) as $index => $crop)
                                                            @if (json_decode($data->crop_season)[$index] == 'kharif_season')
                                                                <tr>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ json_decode($data->crops)[$index] }}</td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ json_decode($data->crops_orchard)[$index] }}
                                                                    </td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ json_decode($data->crop_area)[$index] }}
                                                                    </td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                        {{ json_decode($data->crop_average_yeild)[$index] }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif --}}


                                                    @if (!empty($data->crops) && is_string($data->crops))
    @php
        $crops = json_decode($data->crops, true);
        $cropSeasons = json_decode($data->crop_season, true);
        $cropsOrchard = json_decode($data->crops_orchard, true);
        $cropArea = json_decode($data->crop_area, true);
        $cropAverageYield = json_decode($data->crop_average_yeild, true);
    @endphp

    @if (is_array($crops))
        @foreach ($crops as $index => $crop)
            @if (!empty($cropSeasons[$index]) && $cropSeasons[$index] == 'kharif_season')
                <tr>
                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                        {{ $crop }}</td>
                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                        {{ $cropsOrchard[$index] ?? '' }}</td>
                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                        {{ $cropArea[$index] ?? '' }}</td>
                    <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                        {{ $cropAverageYield[$index] ?? '' }}</td>
                </tr>
            @endif
        @endforeach
    @endif
@endif

                                                </table>
                                            </td>

                                            <td style="width: 12.5%;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Crop(s)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Orchard</b></td>

                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Area (Acres)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;">
                                                            <b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    {{-- @if (is_array($data->crop_season) || is_string($data->crop_season))
                                                    @php
                                                        // Decoding the JSON if it's a JSON string
                                                        $cropSeasons = is_string($data->crop_season) ? json_decode($data->crop_season) : $data->crop_season;
                                                    @endphp --}}
                                                    @php
                                                    // Decode JSON fields safely
                                                    $crops = json_decode($data->crops, true) ?? [];
                                                    $cropSeasons = json_decode($data->crop_season, true) ?? [];
                                                    $cropsOrchard = json_decode($data->crops_orchard, true) ?? [];
                                                    $cropArea = json_decode($data->crop_area, true) ?? [];
                                                    $cropAverageYield = json_decode($data->crop_average_yeild, true) ?? [];
                                                @endphp

                                                @if (is_array($crops))
                                                    @foreach ($crops as $index => $crop)
                                                        @if (!empty($cropSeasons[$index]) &&
                                                             $cropSeasons[$index] != 'kharif_season' &&
                                                             $cropSeasons[$index] != 'rabi_season')
                                                            <tr>
                                                                <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ $crop }}</td>
                                                                <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ $cropsOrchard[$index] ?? '' }}</td>
                                                                <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ $cropArea[$index] ?? '' }}</td>
                                                                <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ $cropAverageYield[$index] ?? '' }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                    {{-- @endif --}}

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th rowspan="2" class="question">Q18.</th>
                                <th colspan="8"> Physical Assets (Farm machinery ) - currently owned</th>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <div class="family   row p-3">
                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Item</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>Yes or No</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>Item</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>Yes or No</b></div>
                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Car / jeep</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('car/jeep', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>Plough (Wood or metal)</b>
                                        </div>
                                        <div class="col-lg-3 border text-center p-2"><b></b></div>
                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Pickup /loader</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('pickup/loader', json_decode($data->physical_asset_item))
                                                        ? '<i class="fa-solid fa-check"></i>'
                                                        : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>laser lever</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('laser_lever', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Motorcycle</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('motorcycle', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>rotavator</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('rotavetor', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Bicycles</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('bicycles', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>Thresher</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('thresher', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Bullock cart</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('bullock_cart', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>Harverter</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('harvester', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>
                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Tractor (4 wheels)</b>
                                        </div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('Tractor(4wheels)', json_decode($data->physical_asset_item))
                                                        ? '<i class="fa-solid fa-check"></i>'
                                                        : '' !!}
                                                @endif
                                            </b></div>

                                        <div class="col-lg-3 border text-center p-2 p-2"><b>disk harrow</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('disk_harrow', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>

                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Cultivator</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('cultivator', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}
                                                @endif
                                            </b></div>

                                        <div class="col-lg-3 border text-center p-2 p-2"><b>Tractor Trolley</b></div>
                                        <div class="col-lg-3 border text-center p-2"><b>
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('tractor_trolley', json_decode($data->physical_asset_item))
                                                        ? '<i class="fa-solid fa-check"></i>'
                                                        : '' !!}
                                                @endif
                                            </b></div>

                                            @php

                                            $vehicles = [
                                            "car/jeep",
                                            "pickup/loader",
                                            "motorcycle",
                                            "bicycles",
                                            "bullock cart",
                                            "Tractor(4wheels)",
                                            "disk_harrow",
                                            "cultivator",
                                            "tractor trolley",
                                            "plough",
                                            "laser lever",
                                            "rotavetor",
                                            "thresher",
                                            "harvester"
                                            ];

                                            @endphp

                                            @if (is_array(json_decode($data->physical_asset_item)))
                                            @foreach (json_decode($data->physical_asset_item) as $physical_item)

                                            @if(!in_array($physical_item,$vehicles))
                                            <div class="col-lg-3 border text-center p-2 p-2"><b>{{$physical_item}}</b></div>
                                            <div class="col-lg-3 border text-center p-2"><b><i class="fa-solid fa-check"></i></b></div>
                                            @endif
                                            @endforeach
                                            @endif


                                    </div>
                                </td>
                            </tr>
                            <tr class="print-cancel">
                                <td class="print-cancel-child" style="border: none;"></td>
                            </tr>
                            <tr>
                                <th rowspan="2" class="question">Q19.</th>
                                <th colspan="8">Livestock and Poultry -assets currently owned : </th>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <div class="family   row p-3">
                                        <div class="col-lg-6 border text-center p-2 p-2"><b>Type of animal</b></div>
                                        <div class="col-lg-6 border text-center p-2"><b>Numbers Now </b></div>

                                        @if (!empty($data->animal_name) && is_string($data->animal_name))
                                        @php
                                            $animalNames = json_decode($data->animal_name, true) ?? [];
                                            $animalQtys = json_decode($data->animal_qty, true) ?? [];
                                        @endphp

                                        @if (is_array($animalNames))
                                            @foreach ($animalNames as $index => $animal)
                                                <div class="col-lg-6 border text-center p-2">
                                                    <b>{{ $animal }}</b>
                                                </div>
                                                <div class="col-lg-6 border text-center p-2">
                                                    <b>{{ $animalQtys[$index] ?? '' }}</b>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif



                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th class="question"> Q20.</th>
                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Source of irrigation:
                                            {{-- @if (is_array(json_decode($data->source_of_irrigation))) {!! in_array('tube_well', json_decode($data->source_of_irrigation)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  @endif   (1) Tube well  </b></span> <span></span>&nbsp&nbsp&nbsp<span> <b>   @if (is_array(json_decode($data->source_of_irrigation))) {!! in_array('canal_system', json_decode($data->source_of_irrigation)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  @endif   (2) canal system  </b></span> <span ></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span> <b> @if (is_array(json_decode($data->source_of_irrigation))) {!! in_array('rain_barrani', json_decode($data->source_of_irrigation)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  @endif  (3) Rain/Barrani </b></span> <span ></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span> <b> @if (is_array(json_decode($data->source_of_irrigation))) {!! in_array('kaccha_area', json_decode($data->source_of_irrigation)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  @endif    (4) Kaccha Area </b></span> <span ></span> --}}

                                            @if (is_array(json_decode($data->source_of_irrigation)))
                                                @foreach (json_decode($data->source_of_irrigation) as $index => $source_of_irrigation)
                                                    <span> <i class="fa-solid fa-check"></i>
                                                        {{ $source_of_irrigation }} </span> &nbsp &nbsp &nbsp
                                                @endforeach
                                            @endif

                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q21.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Source of energy:
                                            @if (is_array(json_decode($data->source_of_irrigation_engery)))
                                                @foreach (json_decode($data->source_of_irrigation_engery) as $index => $source_of_irrigation_engery)
                                                    <span> <i class="fa-solid fa-check"></i>
                                                        {{ $source_of_irrigation_engery }} </span> &nbsp &nbsp &nbsp
                                                @endforeach
                                            @endif


                            </tr>
                            <tr>
                                <th class="question" rowspan="2"> Q22.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span><b>Status of water course total lenth(Meters) </b> <u> &nbsp; &nbsp;
                                            {{ $data->area_length }} &nbsp &nbsp &nbsp </u> </span> <span> <b> Total
                                            command area (acres) </b> &nbsp&nbsp&nbsp <u> &nbsp &nbsp &nbsp
                                            {{ $data->total_command_area }} &nbsp &nbsp &nbsp </u> </span>

                                            <span> <b> Partially Line </b> &nbsp;&nbsp;&nbsp; <u> &nbsp; &nbsp; &nbsp;
                                                {{ $data->partially_line }} &nbsp; &nbsp; &nbsp; </u> </span>
                                        </td>

                            </tr>
                            <tr>
                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b> (1) lined </b></span> <span
                                        style="border-bottom: 1px solid black;">{!! $data->line_status == 'lined' ? '<i class="fa-solid fa-check"></i>' : '' !!}</span>&nbsp&nbsp&nbsp<span>
                                        <b> (2) unlined : </b></span> <span
                                        style="border-bottom: 1px solid black;">{!! $data->line_status != 'lined' ? '<i class="fa-solid fa-check"></i>' : '' !!}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>
                                        <b> (3) if lined how much length is lined(meters)</b></span> <span> <u> &nbsp
                                            &nbsp &nbsp {{ $data->lined_length }} &nbsp &nbsp &nbsp </u>
                                    </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>

                            </tr>
                            <tr>

                                <th colspan="8 " class="p-3">Bank & Account Details : </th>
                            </tr>

                            <tr>
                                <th class="question"> </th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>City : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->cityDetail->title ?? '' }}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b> &nbsp;&nbsp; Preferred Branch Name : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->branch->title ?? '' }}</span></td>

                            </tr>

                            <tr>
                                <th class="question"> Q23.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Title of Account : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->account_title }}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q24. &nbsp;&nbsp; Mother's Name : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->mother_maiden_name }}</span></td>

                            </tr>
                            <tr>
                                <th class="question"> Q25.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b> Date of Birth:</b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->date_of_birth }}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q26. &nbsp;&nbsp; Marital status : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->marital_status }}</span></td>
                            </tr>
                            <tr>
                                <th class="question"> Q27.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b> Correspondence Address:</b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->correspondence_address }}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q28. &nbsp;&nbsp; Permanent Address : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->permanent_address }}</span></td>
                            </tr>


                            <tr>
                                <th colspan="9 " class="p-3" style="text-align:left ">Coordinates: </th>
                            </tr>
                            <tr>
                                <th class="question" > Q23.</th>
                                <td colspan="4" style="border: none !important">
                                    <span> <b>GPS Coordinates : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->GpsCordinates }}</span>
                                </td>
                                {{-- <td colspan="4" style="border: none !important">
                                    <span> <b>Q24. &nbsp;&nbsp; GEO Fancing : </b> </span> <span
                                        >{{ 'Sq Yards: '. $data->sq_yards .' ,  Sq Meters: '.$data->sq_meters.' , Acres: '.$data->acres}}</span>
                                </td> --}}

                            </tr>


                            <tr>
                                <th colspan="8" class="p-3">SECTION II. DOCUMENT UPLOADED / COLLECTED</th>
                            </tr>
                            <tr>
                                <th class="question" rowspan="7"> Q29.</th>
                                <td colspan="8"><b>Documents Collected :</b></td>
                            </tr>

                            <tr>

                                <td colspan="4" style="border: none;"><span> <b>1. CNIC Front: </b></span> <br>
                                    @if ($data->front_id_card != null)
                                        @php
                                            // Assuming front_id_card contains the path to the image file
                                            $imagePath = public_path(
                                                'fa_farmers/front_id_card/' . $data->front_id_card,
                                            );

                                            // Check if the image exists before encoding
                                            if (file_exists($imagePath)) {
                                                $imageData = base64_encode(file_get_contents($imagePath));
                                                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                            } else {
                                                $imageSrc = '';
                                            }
                                        @endphp

                                        @if ($imageSrc)

                                        <div class="image-gallery">
                                            <img src="{{ $imageSrc }}" alt="Farmer Image" style="max-width: 200px;" />
                                        </div>



                                        {{-- <div class="position-relative d-inline-block">
                                            <img src="{{ $imageSrc }}" class="rotatable-img" style="width:200px;" alt="Farmer Photo">


                                            <!-- Fullscreen Button (opens modal) -->
                                            <button type="button" class="btn btn-sm btn-primary open-fullscreen-btn"
                                                    data-img="{{ $imageSrc }}"
                                                    style="position: absolute; top: 5px; left: 5px;">
                                                <i class="fas fa-expand"></i>
                                            </button>
                                        </div> --}}

                                        @else
                                            <p>Image not found</p>
                                        @endif
                                    @endif

                                <td colspan="4" style="border: none;"><span> <b>2. CNIC Back: </b></span> <br>
                                    @if ($data->back_id_card != null)
                                        @php
                                            // Assuming front_id_card contains the path to the image file
                                            $imagePath = public_path('fa_farmers/back_id_card/' . $data->back_id_card);

                                            // Check if the image exists before encoding
                                            if (file_exists($imagePath)) {
                                                $imageData = base64_encode(file_get_contents($imagePath));
                                                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                            } else {
                                                $imageSrc = '';
                                            }
                                        @endphp

                                        @if ($imageSrc)
                                            <div class="image-gallery">
                                                <img src="{{ $imageSrc }}" alt="Farmer Image" style="max-width: 200px;" />
                                            </div>
                                        @else
                                            <p>Image not found</p>
                                        @endif
                                    @endif
                                    {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:300px;height:180px"> --}}

                                </td>



                            </tr>


                            <tr>
                                <td colspan="8" style="border: none;"><span> <b>3. Photo: </b></span> <br>
                                    {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:auto;height:auto"> --}}
                                    @if ($data->upload_farmer_pic != null)
                                    @php
                                        // Assuming upload_farmer_pic contains the path to the image file
                                        $imagePath = public_path(
                                            'fa_farmers/upload_farmer_pic/' . $data->upload_farmer_pic,
                                        );

                                        // Check if the image exists before encoding
                                        if (file_exists($imagePath)) {
                                            $imageData = base64_encode(file_get_contents($imagePath));
                                            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                        } else {
                                            $imageSrc = '';
                                        }
                                    @endphp

                                    @if ($imageSrc)
                                        <div class="image-gallery">
                                            <img src="{{ $imageSrc }}" alt="Farmer Image" style="max-width: 200px;" />
                                        </div>
                                    @else
                                        <p>Image not found</p>
                                    @endif
                                    @endif
                                </td>
                            </tr>




                            <tr>

<td colspan="8" style="border: none;">
    <b>4. Form VII / Registry from Micro (Mandatory): </b><br>

    {{-- @if ($data->form_seven_pic != null)
        @php
            $filePath = public_path('fa_farmers/form_seven_pic/' . $data->form_seven_pic);
            $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        @endphp

        @if (file_exists($filePath))
            @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']))
                @php
                    $imageData = base64_encode(file_get_contents($filePath));
                    $imageSrc = 'data:image/' . $fileExtension . ';base64,' . $imageData;
                @endphp
                <img src="{{ $imageSrc }}" alt="Form VII" style="width:80%;">
            @elseif (strtolower($fileExtension) === 'pdf')
                <embed src="{{ asset('fa_farmers/form_seven_pic/' . $data->form_seven_pic) }}" type="application/pdf" width="100%" height="600px" />
            @else
                <p>Unsupported file format</p>
            @endif
        @else
            <p>File not found</p>
        @endif
    @endif --}}
{{--
@if (!empty($data->form_seven_pic))
    @php
        $files = json_decode($data->form_seven_pic, true);
    @endphp

    @if (is_array($files))
        <div class="row">
            @foreach ($files as $file)
                @php
                    $filePath = public_path('fa_farmers/form_seven_pic/' . $file);
                    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                @endphp

                <div class="col-md-4 mb-4 text-center">
                    @if (file_exists($filePath))
                        @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']))
                            @php
                                $imageData = base64_encode(file_get_contents($filePath));
                                $imageSrc = 'data:image/' . $fileExtension . ';base64,' . $imageData;
                            @endphp
                            <img src="{{ $imageSrc }}" alt="Form VII Image" style="width: 100%; border-radius: 10px;">
                        @elseif (strtolower($fileExtension) === 'pdf')
                            <embed src="{{ asset('fa_farmers/form_seven_pic/' . $file) }}" type="application/pdf" width="100%" height="400px" />
                        @else
                            <p>Unsupported file format</p>
                        @endif
                    @else
                        <p>File not found</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endif --}}
@if (!empty($data->form_seven_pic))
    @php
        $files = json_decode($data->form_seven_pic, true);
        if (!is_array($files)) {
            $files = [$data->form_seven_pic]; // fallback to single image as string
        }
    @endphp

    <div class="row">
        @foreach ($files as $file)
            @php
                $filePath = public_path('fa_farmers/form_seven_pic/' . $file);
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
            @endphp

            <div class="col-md-4 mb-4 text-center">
                @if (file_exists($filePath))
                    @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']))
                        @php
                            $imageData = base64_encode(file_get_contents($filePath));
                            $imageSrc = 'data:image/' . $fileExtension . ';base64,' . $imageData;
                        @endphp
                       <div class="image-gallery">
                                            <img src="{{ $imageSrc }}" alt="Farmer Image" style="max-width: 200px;" />
                                        </div>


                    @elseif (strtolower($fileExtension) === 'pdf')
                        <embed src="{{ asset('fa_farmers/form_seven_pic/' . $file) }}" type="application/pdf" width="100%" height="400px" />
                    @else
                        <p>Unsupported file format</p>
                    @endif
                @else
                    <p>File not found</p>
                @endif
            </div>
        @endforeach
    </div>
@endif


</td>


                            </tr>



                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Fullscreen Modal -->
<!-- Fullscreen Image Modal -->
<div class="modal fade" id="fullscreenImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Farmer Photo</h5>
                <button id="rotateImageBtn" class="btn btn-secondary">
                    <i class="fas fa-sync-alt"></i> Rotate
                </button>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> --}}
            </div>
            <div class="modal-body text-center">
                <img id="fullscreenImage" src="" style="max-width: 100%; height: auto;" data-rotation="0">
            </div>

        </div>
    </div>
</div>



    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('') }}assets/js/plugins/popper.min.js"></script>



<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="{{asset('select2.min.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalImage = document.getElementById('fullscreenImage');
        const rotateBtn = document.getElementById('rotateImageBtn');

        document.querySelectorAll('.open-fullscreen-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const src = btn.getAttribute('data-img');
                modalImage.src = src;
                modalImage.style.transform = 'rotate(0deg)';
                modalImage.setAttribute('data-rotation', '0');

                const modal = new bootstrap.Modal(document.getElementById('fullscreenImageModal'));
                modal.show();
            });
        });

        rotateBtn.addEventListener('click', function () {
            let rotation = parseInt(modalImage.getAttribute('data-rotation') || 0);
            rotation = (rotation + 90) % 360;
            modalImage.style.transform = 'rotate(' + rotation + 'deg)';
            modalImage.setAttribute('data-rotation', rotation);
        });
    });
</script>
<!-- CSS -->

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/viewerjs/dist/viewer.min.js"></script>


<script>
 document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.image-gallery').forEach(function(gallery) {
        new Viewer(gallery, {
            toolbar: {
                zoomIn: 1,
                zoomOut: 1,
                oneToOne: 1,
                reset: 1,
                rotateLeft: 1,
                rotateRight: 1,
            },
            inline: false,
        });
    });
});

</script>
<script>
    $(document).ready(function() {
        // $('.js-example-basic-multiple').select2();

        $('.js-example-basic-single').select2({
            tags: true, // Enable typing custom values
            placeholder: "Select or type to add a new option", // Optional placeholder
            dropdownParent: $('#exampleModalLive')
        });
    });
</script>


    <script>
        $(document).ready(function() {
            // Event listener for opening the modal
            $('.verifiy-btn').on('click', function() {
                var farmerId = $(this).data('id');
                $('#farmer_id').val(farmerId);
                $('#exampleModalLive').modal('show');
            });
            $('#exampleModalLive').on('shown.bs.modal', function() {
                $('.select2').select2('destroy').select2();
            });
            // Event listener for changing the status
            $('#statusSelect').on('change', function() {
                var reasonBox = $('#reasonBox');


                if ($(this).val() == 'rejected_by_fa' || $(this).val() == 'rejected_by_ao' || $(this).val() == 'rejected_by_dd' || $(this).val() == 'rejected_by_lrd' ) {
                    reasonBox.show();
                    $('#reasonTextarea').prop('required', true);

                } else {
                    reasonBox.hide();
                    $('#reasonTextarea').prop('required', false);
                    $('#other_reason_Box').hide();
                    $("#reasonTextarea").val("Banks Details Not Valid").trigger("change");
                }
            });


            $('body').on('change','#reasonTextarea', function() {

                if ($(this).val() == 'other' ) {
                    $('#other_reason_Box').show(); // Uses inline style display:block (not flex)
                } else {
                    $('#other_reason_Box').hide(); // Uses inline style display:block (not flex)

                }
            });


        });




        function downloadPDF() {



            // Select the button and other elements
            const startLoadingBtn = document.getElementById('start-loading-btn');
            const loaderOverlay = document.getElementById('loader-overlay');
            const mainContent = document.getElementById('main-content');


            // Show the loader and apply background fade
            loaderOverlay.style.display = 'flex';
            document.body.classList.add('no-click'); // Disable clicks on the body



            const {
                jsPDF
            } = window.jspdf;

            // Create a jsPDF instance with custom page height
            const doc = new jsPDF({
                orientation: 'portrait',
                unit: 'px',
                format: [595, 842 + 46], // Default A4 (595x842) + 100px additional height
            });

            const element = document.getElementById('farmer-details-table');

            // Render the content using html2canvas
            html2canvas(element, {
                scale: 2
            }).then((canvas) => {
                const imgData = canvas.toDataURL('image/png');

                const pageWidth = doc.internal.pageSize.width;
                const pageHeight = doc.internal.pageSize.height;

                const imgWidth = pageWidth - 20; // Add margins
                const imgHeight = (canvas.height * imgWidth) / canvas.width; // Maintain aspect ratio

                // Check if content fits one page
                if (imgHeight <= pageHeight - 20) {
                    // Add single page
                    doc.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
                } else {
                    // Content is larger than one page
                    let currentHeight = 0;

                    while (currentHeight < imgHeight) {
                        // Add a portion of the image
                        const sliceHeight = Math.min(imgHeight - currentHeight, pageHeight - 20);

                        const canvasSlice = document.createElement('canvas');
                        canvasSlice.width = canvas.width;
                        canvasSlice.height = (sliceHeight / imgHeight) * canvas.height;

                        const ctx = canvasSlice.getContext('2d');
                        ctx.drawImage(
                            canvas,
                            0, currentHeight / imgHeight * canvas.height, // Source x, y
                            canvas.width, canvasSlice.height, // Source width, height
                            0, 0, // Destination x, y
                            canvas.width, canvasSlice.height // Destination width, height
                        );

                        const sliceData = canvasSlice.toDataURL('image/png');
                        doc.addImage(sliceData, 'PNG', 10, 10, imgWidth, sliceHeight);

                        currentHeight += sliceHeight;

                        if (currentHeight < imgHeight) {
                            doc.addPage(); // Add a new page for remaining content
                        }
                    }
                }

                // Save the PDF
                doc.save('Grower_Information.pdf');



                // Hide the loader and show the content
                loaderOverlay.style.display = 'none';
                document.body.classList.remove('no-click'); // Enable clicks
                mainContent.style.display = 'block'; // Show content


            });
        }
    </script>


</body>

</html>
