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
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 10px;
    }

    .container {
        width: 100% !important;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
    }

    body {
            margin: 0; /* Remove body margins */
        }

table{
    border-collapse: collapse;
}

        table, th, td {
            border: 1px solid rgb(218, 218, 218) !important; /* Force black borders */
            font-size: 15px
        }
    .page-break {
        page-break-after: always; /* Forces a page break after the element */
    }
    .page-break {
        page-break-after: always; /* Forces a page break after the element */
    }

    .question {
        width: 60px !important;
        color: black;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal; /* Text wraps properly */
    }
   @media print {
        @page {
            margin: 0; /* Remove default page margins */
        }
        button{
            display: none;
        }
        .question17{
            outline: 2px solid red;   /* Dusra border (extra border) */
    outline-offset: -2px;
        }
    }

        input[type='checkbox']{
        appearance:none;
        border:0px solid black;
        height:30px;
        width:30px;
         font-size:30px;
        position:relative;

    }
        input[type='checkbox']:checked:before{
         content:'\2713'; background:transparent; width:100%; height:100%; top:0;
        right:0;
         display:flex; align-items:end; justify-content:right; color:black; font-weight:bold;

     }
    .watermark {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 400px;
        opacity: 0.1;
        transform: translate(-50%, -50%);
        z-index: -1;
    }

</style>

<body style="position: relative">




@if($data->verification_status == 'verified_by_lrd')

  @php
    $path = public_path('vstamp.png');
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $image = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);
@endphp
<div class="watermark">
    <img src="{{ $base64 }}" width="400">
</div>
@endif






@if($data->verification_status == 'rejected_by_lrd')

@php
    $path = public_path('rejected.png');
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $image = file_get_contents($path);
    $base64_rejected_by_lrd = 'data:image/' . $type . ';base64,' . base64_encode($image);
@endphp

<div class="watermark">
    <img src="{{ $base64_rejected_by_lrd }}" width="400">
</div>
@endif





    {{-- <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Farmers Verification</h5>
                    <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-x"></i></span>
                </div>
            </div>
        </div>
    </div> --}}

@php
    // Assuming front_id_card contains the path to the image file
    $imagePath = public_path('check.png');

    // Check if the image exists before encoding
    if (file_exists($imagePath)) {
        $imageData = base64_encode(file_get_contents($imagePath));
        $check = 'data:image/jpeg;base64,' . $imageData;
    } else {
        $check = '';
    }
@endphp

    <div class="container">

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

            <h1 style="margin: 0; margin-top: 20px; margin-bottom: 10px; font-size: 30px;">Benazir Hari Card</h1>
            <h3 style="margin: 0; margin-bottom: 20px; font-size: 20px;">Registration Form</h3>
            </div>
            <div class="col-sm-12">
                <div class="">
                    <div class="card-body">
                        <table class="table" cellpadding="20"  >
                            <tr >
                                <th colspan="9" style="text-align:left ">SECTION I. GROWER INFORMATION</th>
                            </tr>
                            <tr>
                                <th class="question"> Q1.</th>
                                <td colspan="3">
                                    <span> <b>Name : </b></span> <span style="border-bottom: 1px solid black;">{{ $data->name ?? '' }}</span>
                                </td>
                                <td colspan="3">
                                    <span> <b> Q2(A).&nbsp;&nbsp; Father/Husband Name : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->father_name ?? '' }}</span>
                                </td>
                                <td colspan="2">
                                    <span> <b> Q2(B). &nbsp;&nbsp; Surname : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->surname ?? '' }}</span>
                                </td>

                            </tr>
                            <tr>
                                <th class="question"> Q3.</th>
                                <td colspan="4">
                                    <span> <b> CNIC No:</b></span> <span
                                        style="border-bottom: 1px solid black; padding-right:3%;padding-left:3%">{{ $data->cnic ?? '' }}</span>
                                    <b>Issue Date:</b> <u style=" padding-right:1%;padding-left:1%">{{ $data->cnic_issue_date ?? '' }}</u> &nbsp; &nbsp; <b>EXP Date:</b> <u style=" padding-right:1%;padding-left:1%">{{ $data->cnic_expiry_date ?? '' }}</u>
                                </td>
                                <td colspan="4">
                                    <span> <b>Q4.&nbsp;&nbsp; Mobile No : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->mobile ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q5.</th>
                                <td colspan="4">
                                    <span> <b>District : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->district ?? '' }}</span>
                                </td>
                                <td colspan="4">
                                    <span> <b>Q6. &nbsp;&nbsp; Taluka : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->tehsil ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q7.</th>
                                <td colspan="4">
                                    <span> <b>Union Council : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->uc ?? '' }}</span>
                                </td>
                                <td colspan="4">
                                    <span> <b>Q8. &nbsp;&nbsp; Tappa : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->tappa ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q9.</th>
                                <td colspan="4">
                                    <span> <b>Deh : </b></span> <span style="border-bottom: 1px solid black;">{{ $data->dah ?? '' }}</span>
                                </td>
                                <td colspan="4">
                                    <span> <b>Q10.&nbsp;&nbsp; Village : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->village ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q11.</th>

                                <td colspan="3" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Gender :&nbsp;&nbsp;&nbsp;
                                            @if($data->gender == 'male')
                                               <input type="checkbox" name="vehicle1" value="Bike" checked>
                                            @endif
                                            </b> Male&nbsp; &nbsp;&nbsp;<b>
                                            </b>

                                            @if($data->gender == 'female')
                                               <input type="checkbox" name="vehicle1" value="Bike" checked>
                                            @endif

                                            Female &nbsp;&nbsp;<span></span></span> </td>
                                <td colspan="5" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q12.&nbsp;&nbsp; Owner Type: </b>&nbsp;&nbsp;&nbsp;

                                        @if(in_array('owner', json_decode($data->owner_type, true) ?? []))
                                           <input type="checkbox" name="vehicle1" value="Bike" checked>
                                        @endif

                                        1.Owner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        @if(in_array('makadedar', json_decode($data->owner_type, true) ?? []))
                                           <input type="checkbox" name="vehicle1" value="Bike" checked>
                                        @endif

                                        2. Makadedar(Contractor/leasee)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        @if(in_array('sharecropper', json_decode($data->owner_type, true) ?? []))
                                           <input type="checkbox" name="vehicle1" value="Bike" checked>
                                        @endif
                                        3. Sharecropper/Tenant
                                    </span> </td>

                            </tr>


                            <tr>
                                <th rowspan="2" class="question">Q13.</th>
                                <th colspan="8  " style="text-align:left ">Family Composition and age of respondent</th>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <table class="family-table" style="width: 100%;" cellpadding="20">
                                        <!-- Row 1: Headers -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Gender</b></td>
                                            <td class="border text-center p-2" colspan="2"><b>Children < 18 years</b></td>
                                            <td class="border text-center p-2" colspan="2"><b>Adults > 18 years</b></td>
                                        </tr>

                                        <!-- Row 2: Female -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Female</b></td>
                                            <td class="border text-center p-2" colspan="2">{{ $data->female_children_under16 ?? '' }}</td>
                                            <td class="border text-center p-2" colspan="2">{{ $data->female_Adults_above16 ?? '' }}</td>
                                        </tr>

                                        <!-- Row 3: Male -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Male</b></td>
                                            <td class="border text-center p-2" colspan="2">{{ $data->male_children_under16 ?? '' }}</td>
                                            <td class="border text-center p-2" colspan="2">{{ $data->male_Adults_above16 ?? '' }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q14.</th>

                                <td colspan="8">
                                    <span> <b>Next of Kin : Full Name : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->full_name_of_next_kin ?? '' }}</span>&nbsp;&nbsp;&nbsp;<span>
                                        <b> CNIC No : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->cnic_of_next_kin ?? '' }}</span>&nbsp;&nbsp;&nbsp;<span>
                                        <b>Mobile No </b></span> <span style="border-bottom: 1px solid black;">{{ $data->mobile_of_next_kin ?? '' }}</span>
                                </td>

                            </tr>
                           <tr>
                                <th class="question"> Q15.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>House type: &nbsp; &nbsp; &nbsp; </b> @if($data->house_type == 'pakka_house') <img src="{{$check}}" width="30px" height="30px"> @endif (1) Paka House </span> <span
                                        style="border-bottom: 1px solid black;"></span>&nbsp; &nbsp; &nbsp; <span>
                                        @if($data->house_type == 'kacha_house') <img src="{{$check}}" width="30px"   height="30px"> @endif (2) Kacha House </span> <span
                                        style="border-bottom: 1px solid black;"></span>

                            </tr>
                            <tr>
                                <th class="question" rowspan="6"> Q16.</th>
                                <td colspan="8"><b>Landholding</b></td>
                            </tr>
                            <tr>

                                <td colspan="4" ><span> <b>(1)Total Landholding (Acres) :
                                        </b></span> <span style="border-bottom: 1px solid black;">{{ $data->total_landing_acre ?? '' }}</span>
                                </td>
                                <td colspan="4"><span> <b>(2)Total Area with Hari(s) (Acres)
                                            : </b> </span> <span style="border-bottom: 1px solid black;">{{ $data->total_area_with_hari ?? '' }}</span>
                                </td>

                            </tr>
                            <tr>

                                <td colspan="4" ><span> <b>(3)Total self-cultivated land
                                            (Acres) : </b></span> <span style="border-bottom: 1px solid black;">{{ $data->total_area_cultivated_land ?? '' }}</span>
                                </td>
                                <td colspan="4"><span> <b>(4)Total fallow land (Acres) : </b>
                                        dsadas</span> <span style="border-bottom: 1px solid black;">{{ $data->total_fallow_land ?? '' }}</span>
                                </td>

                            </tr>

                            <tr>

                                <td colspan="4"><span> <b>(5) Share : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->land_share ?? '' }}</span></td>
                                <td colspan="2"span> <b>(6) Area as per share: </b> </span>
                                    <span style="border-bottom: 1px solid black;">{{ $data->land_area_as_per_share ?? '' }}</span>
                                </td>
                                <td colspan="2"><span> <b>(7) Survey No : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->survey_no ?? '' }}</span></td>

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
                                <th colspan="8" style="text-align: left"> B. Crops Status</th>
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
                                            <td style="width: 12.5%;     padding: 0;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Crop(s)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;  padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Orchard</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;  padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Area (Acres)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;  padding-top: 10px; padding-bottom: 10px;">
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
                                                            @if (json_decode($data->crop_season)[$index] == 'rabi_season')
                                                                <tr>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                        {{ json_decode($data->crops)[$index] }}</td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                        {{ json_decode($data->crops_orchard)[$index] }}
                                                                    </td>

                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                        {{ json_decode($data->crop_area)[$index] }}
                                                                    </td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
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
                                            <td style="width: 12.5%;     padding: 0;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Crop(s)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Orchard</b></td>

                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Area (Acres)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
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
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                        {{ json_decode($data->crops)[$index] }}</td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                        {{ json_decode($data->crops_orchard)[$index] }}
                                                                    </td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                        {{ json_decode($data->crop_area)[$index] }}
                                                                    </td>
                                                                    <td
                                                                        style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                        {{ json_decode($data->crop_average_yeild)[$index] }}
                                                                    </td>
                                                                </tr>
                                                                @else

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

                                            <td style="width: 12.5%;     padding: 0;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Crop(s)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Orchard</b></td>

                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                            <b>Area (Acres)</b></td>
                                                        <td
                                                            style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;" >
                                                            <b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    {{-- @if (is_array($data->crop_season) || is_string($data->crop_season))
                                                    @php
                                                        // Decoding the JSON if it's a JSON string
                                                        $cropSeasons = is_string($data->crop_season) ? json_decode($data->crop_season) : $data->crop_season;
                                                    @endphp --}}
                                                    {{-- @foreach (json_decode($data->crops) as $index => $crop)
                                                        @if (json_decode($data->crop_season)[$index] != 'kharif_season' &&
                                                                json_decode($data->crop_season)[$index] != 'rabi_season')
                                                            <tr>
                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                    {{ json_decode($data->crops)[$index] ?? '' }}</td>
                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                    {{ json_decode($data->crops_orchard)[$index] }}
                                                                </td>

                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                    {{ json_decode($data->crop_area)[$index] ?? '' }}
                                                                </td>
                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;  padding: 5px; padding-top: 10px; padding-bottom: 10px;">
                                                                    {{ json_decode($data->crop_average_yeild)[$index] ?? '' }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach --}}

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

                        </td></tr>
                    </table>


                        <div class="page-break"></div>

                    <table class="table" cellpadding="20" width="100%" >


                            <tr >
                                <th rowspan="2" class="question">Q18.</th>
                                <th colspan="8" style="text-align:left "> Physical Assets (Farm machinery ) - currently owned</th>
                            </tr>





                            <tr>
                                <td colspan="8">
                                    <table class="family-table" style="width: 100%;" cellpadding="20">
                                        <!-- Row 1 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Item</b></td>
                                            <td class="border text-center p-2"><b>Yes or No</b></td>
                                            <td class="border text-center p-2"><b>Item</b></td>
                                            <td class="border text-center p-2"><b>Yes or No</b></td>
                                        </tr>

                                        <!-- Row 2 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Car / jeep</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    @if(in_array('car/jeep', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Plough (Wood or metal)</b></td>
                                            <td class="border text-center p-2">


                                            </td>
                                        </tr>

                                        <!-- Row 3 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Pickup /loader</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))

                                                        @if(in_array('pickup/loader', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Laser level</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                @if(in_array('laser_lever', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                            @endif
                                            </td>
                                        </tr>

                                        <!-- Row 4 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Motorcycle</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    @if(in_array('motorcycle', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Rotavator</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                               @if(in_array('rotavetor', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                            @endif
                                            </td>
                                        </tr>

                                        <!-- Row 5 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Bicycles</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    @if(in_array('bicycles', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Thresher</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    @if(in_array('thresher', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Row 6 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Bullock cart</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                @if(in_array('bullock_cart', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Harvester</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                 @if(in_array('harvester', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Row 7 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Tractor (4 wheels)</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    @if(in_array('Tractor(4wheels)', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Disk harrow</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                     @if(in_array('disk_harrow', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Row 8 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Cultivator</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                   @if(in_array('cultivator', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Tractor Trolley</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                  @if(in_array('tractor_trolley', json_decode($data->physical_asset_item)))  <img src="{{$check}}" width="30px" height="30px">  @endif
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <div class="page-break"></div>
                            <tr>
                                <th rowspan="2" class="question">Q19.</th>
                                <th colspan="8" style="text-align:left ">Livestock and Poultry -assets currently owned : </th>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <table width="100%" cellpadding="20">
                                        <tr>
                                            <td class="border text-center p-2"><b>Type of animal</b></td>
                                            <td class="border text-center p-2"><b>Numbers Now</b></td>
                                        </tr>

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



                                    </table>
                                </td>

                            </tr>

                            <tr>
                                <th class="question"> Q20.</th>
                                <td colspan="8">
                                    <span> <b>Source of irrigation:

                                        @if (is_array(json_decode($data->source_of_irrigation)))
                                        @foreach (json_decode($data->source_of_irrigation) as $index => $source_of_irrigation)
                                            <span> <img src="{{$check}}" width="30px" height="30px">
                                                {{ $source_of_irrigation }} </span> &nbsp; &nbsp; &nbsp;
                                        @endforeach
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q21.</th>

                                <td colspan="8">
                                    <span> <b>Source of energy:
                                        @if (is_array(json_decode($data->source_of_irrigation_engery)))
                                        @foreach (json_decode($data->source_of_irrigation_engery) as $index => $source_of_irrigation_engery)
                                            <span> <img src="{{$check}}" width="30px" height="30px">
                                                {{ $source_of_irrigation_engery }} </span> &nbsp; &nbsp; &nbsp;
                                        @endforeach
                                    @endif

                            </tr>
                            <tr>
                                <th class="question" rowspan="2"> Q22.</th>

                                <td colspan="8">
                                    <span><b>Status of water course total lenth(Meters) </b> <u> &nbsp; &nbsp;
                                        {{ $data->area_length }}  &nbsp; &nbsp; &nbsp; </u> </span> <span> <b> Total
                                            command area (acres) </b> &nbsp;&nbsp;&nbsp; <u> &nbsp; &nbsp; &nbsp;
                                                {{ $data->total_command_area }} &nbsp; &nbsp; &nbsp; </u> </span>

                                                <span> <b> Partially Line </b> &nbsp;&nbsp;&nbsp; <u> &nbsp; &nbsp; &nbsp;
                                                        {{ $data->partially_line }} &nbsp; &nbsp; &nbsp; </u> </span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="8">
                                    <span>

                                        @if($data->line_status == 'lined')
                                         <img src="{{$check}}" width="30px" height="30px">
                                        @endif
                                        <b> (1) lined </b></span> <span
                                        style="border-bottom: 1px solid black;"></span>&nbsp;&nbsp;&nbsp;<span>
                                        <b>

                                            @if($data->line_status == 'unlined')
                                         <img src="{{$check}}" width="30px" height="30px">
                                        @endif

                                        (2) unlined : </b></span> <span style="border-bottom: 1px solid black;"><i
                                            class="fa-solid fa-check"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                        <b> (3) if lined how much length is lined(meters)</b></span> <span> <u> &nbsp;
                                            &nbsp; &nbsp; {{ $data->lined_length }} &nbsp; &nbsp; &nbsp; </u>
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>

                            </tr>
                            <tr>

                                <th colspan="9 " class="p-3" style="text-align:left ">Bank & Account Details : </th>
                            </tr>
                            <tr>
                                <th class="question" > Q23.</th>
                                <td colspan="4" style="border: none !important">
                                    <span> <b>Title of Account : </b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->account_title }}</span>
                                </td>
                                <td colspan="4" style="border: none !important">
                                    <span> <b>Q24. &nbsp;&nbsp; Account no : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->account_no }}</span>
                                </td>

                            </tr>
                            <tr>
                                <th class="question" > Q25.</th>
                                <td colspan="4"  style="border-bottom: 1px solid rgb(179, 179, 179);border-right:none !important">
                                    <span> <b> Bank Name:</b></span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->bank_name }}</span>
                                </td>
                                <td colspan="4" style="border-bottom: 1px solid rgb(179, 179, 179);border-left:none !important">
                                    <span> <b>Q26. &nbsp;&nbsp; Branch Name : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->branch_name }}</span>
                                </td>
                            </tr>
                            <tr >
                                <th class="question " > Q27.</th>
                                <td colspan="4"  style="border: none !important">
                                    <span> <b> IBAN:</b></span> <span style="border-bottom: 1px solid black;">{{ $data->IBAN_number }}</span>
                                </td>
                                <td colspan="4" style="border: none !important">
                                    <span> <b>Q28. &nbsp;&nbsp; Branch code : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->branch_code }}</span>
                                </td>
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


                               <div class="page-break"></div>
                            <tr>
                                <th colspan="9" class="p-3" style="text-align:left ">SECTION II. DOCUMENT UPLOADED / COLLECTED</th>
                            </tr>

                            <tr>
                                <th class="question " rowspan="3"> Q29.</th>
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
                                            <img src="{{ $imageSrc }}" alt="Front ID Card"
                                                style="width:420px;height:220px">
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
                                            <img src="{{ $imageSrc }}" alt="Front ID Card"
                                                style="width:420px;height:220px">
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
                                        <img src="{{ $imageSrc }}" width="200px" alt="Front ID Card"
                                            style="">
                                    @else
                                        <p>Image not found</p>
                                    @endif
                                    @endif
                                </td>
                            </tr>




                            <tr>


<td colspan="8" style="border: none;"><b>4. Form VII / Registry from Micro (Mandatory): </b></span> <br>


    {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:auto;height:auto"> --}}

    @if ($data->form_seven_pic != null)
        @php
            // Assuming form_seven_pic contains the path to the image file
            $imagePath = public_path(
                'fa_farmers/form_seven_pic/' . $data->form_seven_pic,
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
            <img src="{{ $imageSrc }}"  alt="Front ID Card"
            >
        @else
            <p>Image not found</p>
        @endif
    @endif
</td>


                            </tr>


                           <tr>
                            <td colspan="8" style="border: none;"> <b>5. Forms VIII A/ Affidavit/ Heirship (Land Documents): </b></span> <br>
                                @if ($data->upload_land_proof != null)
                                @php
                                    // Assuming upload_land_proof contains the path to the image file
                                    $imagePath = public_path(
                                        'fa_farmers/upload_land_proof/' . $data->upload_land_proof,
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
                                    <img src="{{ $imageSrc }}"   alt="Front ID Card"
                                    style="width:80%">
                                @else
                                    <p>Image not found</p>
                                @endif
                            @endif
                            </td>
                           </tr>



                           <tr>
                            <td colspan="8" style="border: none;"> <b>6. Others: </b></span> <br>
 {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:auto;height:auto"> --}}
 @if ($data->upload_other_attach != null)
 @php
     // Assuming upload_other_attach contains the path to the image file
     $imagePath = public_path(
         'fa_farmers/upload_other_attach/' . $data->upload_other_attach,
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
     <img src="{{ $imageSrc }}"  alt="Front ID Card"
     style="width:80%">
 @else
     <p>Image not found</p>
 @endif
@endif
                            </td>
                           </tr>




                           <tr>
                            <td colspan="8" style="border: none;"> <b>7. No Objection Affidavit in case of joint ownership / khata: </b></span> <br>
 {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:auto;height:auto"> --}}
 @if ($data->no_objection_affidavit_pic != null)
 @php
     // Assuming no_objection_affidavit_pic contains the path to the image file
     $imagePath = public_path(
         'fa_farmers/no_objection_affidavit_pic/' . $data->no_objection_affidavit_pic,
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
     <img src="{{ $imageSrc }}"  alt="Front ID Card"
     style="width:80%">
 @else
     <p>Image not found</p>
 @endif
@endif
                            </td>
                           </tr>



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cms.benazirharicard.gos.pk/assets/js/plugins/popper.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cms.benazirharicard.gos.pk/select2.min.js"></script>

    <script>

    </script>
</body>

</html>
