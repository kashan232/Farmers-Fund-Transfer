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
</style>

<body>


    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
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
    </div>



    <div class="container">

        <div class="row" id="farmer-details-table">
            <div class="col-sm-12">
                <div class="">
                    <div class="card-body">
                        <table class="table" cellpadding="20"  >
                            <tr >
                                <th colspan="9" style="text-align:left ">SECTION I. GROWER INFORMATION</th>
                            </tr>
                            <tr>
                                <th class="question"> Q1.</th>
                                <td colspan="4">
                                    <span> <b>Name : </b></span> <span style="border-bottom: 1px solid black;">{{ $data->name ?? '' }}</span>
                                </td>
                                <td colspan="4">
                                    <span> <b> Q2.&nbsp;&nbsp; Father/Husband Name : </b> </span> <span
                                        style="border-bottom: 1px solid black;">{{ $data->father_name ?? '' }}</span>
                                </td>

                            </tr>
                            <tr>
                                <th class="question"> Q3.</th>
                                <td colspan="4">
                                    <span> <b> CNIC No:</b></span> <span
                                        style="border-bottom: 1px solid black; padding-right:3%">{{ $data->cnic ?? '' }}</span>
                                    <b>Issue Date:</b> <u>{{ $data->cnic_issue_date ?? '' }}</u> &nbsp; &nbsp; <b>EXP Date:</b> <u>{{ $data->cnic_expiry_date ?? '' }}</u>
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
                                    <span> <b>Gender :&nbsp;&nbsp;&nbsp; {!! $data->gender == 'male' ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                            </b> Male&nbsp; &nbsp;&nbsp;<b> {!! $data->gender == 'female' ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                            </b>Female &nbsp;&nbsp;<span></span></span> </td>
                                <td colspan="5" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);">
                                    <span> <b>Q12.&nbsp;&nbsp; Owner Type: </b>&nbsp;&nbsp;&nbsp; @if(is_array(json_decode($data->owner_type))) {!! in_array('owner', json_decode($data->owner_type)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}  @endif
                                        1.Owner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @if(is_array(json_decode($data->owner_type))) {!! in_array('makadedar', json_decode($data->owner_type)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}  @endif 2.
                                        Makadedar(Contractor/leasee)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @if(is_array(json_decode($data->owner_type))) {!! in_array('sharecropper', json_decode($data->owner_type)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}  @endif 3. Sharecropper/Tenant
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
                                    <span> <b>House type: &nbsp&nbsp&nbsp </b> {!! $data->house_type == 'pakka_house' ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!} (1) Paka House </span> <span
                                        style="border-bottom: 1px solid black;"></span>&nbsp&nbsp&nbsp<span>
                                        {!! $data->house_type == 'kacha_house' ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}(2) Kacha House </span> <span
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
                            @foreach (json_decode($data->title_name) as $index => $title)
                                <tr>
                                    <th class="question"> {{ $index + 1 }}</th>
                                    <td colspan="2">{{ json_decode($data->title_name)[$index] }}</td>
                                    <td colspan="2 " class="text-center">
                                        {{ json_decode($data->title_cnic)[$index] }}</td>
                                    <td colspan="2 " class="text-center">
                                        {{ json_decode($data->title_number)[$index] }}</td>
                                    <td colspan="2 " class="text-center">
                                        {{ json_decode($data->title_area)[$index] }}</td>
                                </tr>
                            @endforeach



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
                                                    @if (is_array($data->crop_season) || is_string($data->crop_season))
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
                                                    @if (is_array($data->crop_season) || is_string($data->crop_season))
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
                                                    @foreach (json_decode($data->crops) as $index => $crop)
                                                        @if (json_decode($data->crop_season)[$index] != 'kharif_season' &&
                                                                json_decode($data->crop_season)[$index] != 'rabi_season')
                                                            <tr>
                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ json_decode($data->crops)[$index] ?? '' }}</td>
                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ json_decode($data->crops_orchard)[$index] }}
                                                                </td>

                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ json_decode($data->crop_area)[$index] ?? '' }}
                                                                </td>
                                                                <td
                                                                    style="border: 1px solid rgb(192, 192, 192); text-align: center;">
                                                                    {{ json_decode($data->crop_average_yeild)[$index] ?? '' }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    {{-- @endif --}}

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <div class="page-break"></div>
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
                                                    {!! in_array('car/jeep', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
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
                                                    {!! in_array('pickup/loader', json_decode($data->physical_asset_item))
                                                        ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">'
                                                        : '' !!}
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Laser level</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                {!! in_array('laser_lever', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                            @endif
                                            </td>
                                        </tr>

                                        <!-- Row 4 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Motorcycle</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('motorcycle', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Rotavator</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                {!! in_array('rotavetor', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                            @endif
                                            </td>
                                        </tr>

                                        <!-- Row 5 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Bicycles</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('bicycles', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Thresher</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('thresher', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Row 6 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Bullock cart</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('bullock_cart', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Harvester</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('harvester', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Row 7 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Tractor (4 wheels)</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                {!! in_array('Tractor(4wheels)', json_decode($data->physical_asset_item))
                                                    ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">'
                                                    : '' !!}
                                            @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Disk harrow</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('disk_harrow', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Row 8 -->
                                        <tr>
                                            <td class="border text-center p-2"><b>Cultivator</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('cultivator', json_decode($data->physical_asset_item)) ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">' : '' !!}
                                                @endif
                                            </td>
                                            <td class="border text-center p-2"><b>Tractor Trolley</b></td>
                                            <td class="border text-center p-2">
                                                @if (is_array(json_decode($data->physical_asset_item)))
                                                    {!! in_array('tractor_trolley', json_decode($data->physical_asset_item))
                                                        ? '<img src="{{"data:image/png;base64,".base64_encode(file_get_contents(public_path("assets/check.jpg")))}}">'
                                                        : '' !!}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

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
                                        <tr>
                                            <td class="border text-center p-2"><b>sad</b></td>
                                            <td class="border text-center p-2"><b>sad</b></td>
                                        </tr>
                                    </table>
                                </td>

                            </tr>

                            <tr>
                                <th class="question"> Q20.</th>
                                <td colspan="8">
                                    <span> <b>Source of irrigation:



                                </td>
                            </tr>
                            <tr>
                                <th class="question"> Q21.</th>

                                <td colspan="8">
                                    <span> <b>Source of energy:


                            </tr>
                            <tr>
                                <th class="question" rowspan="2"> Q22.</th>

                                <td colspan="8">
                                    <span><b>Status of water course total lenth(Meters) </b> <u> &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; </u> </span> <span> <b> Total
                                            command area (acres) </b> &nbsp;&nbsp;&nbsp; <u> &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; </u> </span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="8">
                                    <span> <b> (1) lined </b></span> <span
                                        style="border-bottom: 1px solid black;"></span>&nbsp;&nbsp;&nbsp;<span>
                                        <b> (2) unlined : </b></span> <span style="border-bottom: 1px solid black;"><i
                                            class="fa-solid fa-check"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                        <b> (3) if lined how much length is lined(meters)</b></span> <span> <u> &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </u>
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
                                        style="border-bottom: 1px solid black;"></span>
                                </td>
                                <td colspan="4" style="border: none !important">
                                    <span> <b>Q24. &nbsp;&nbsp; Account no : </b> </span> <span
                                        style="border-bottom: 1px solid black;"></span>
                                </td>

                            </tr>
                            <tr>
                                <th class="question" > Q25.</th>
                                <td colspan="4"  style="border-bottom: 1px solid rgb(179, 179, 179);border-right:none !important">
                                    <span> <b> Bank Name:</b></span> <span
                                        style="border-bottom: 1px solid black;">Sindh Bank</span>
                                </td>
                                <td colspan="4" style="border-bottom: 1px solid rgb(179, 179, 179);border-left:none !important">
                                    <span> <b>Q26. &nbsp;&nbsp; Branch Name : </b> </span> <span
                                        style="border-bottom: 1px solid black;"></span>
                                </td>
                            </tr>
                            <tr >
                                <th class="question " > Q27.</th>
                                <td colspan="4"  style="border: none !important">
                                    <span> <b> IBAN:</b></span> <span style="border-bottom: 1px solid black;"></span>
                                </td>
                                <td colspan="4" style="border: none !important">
                                    <span> <b>Q28. &nbsp;&nbsp; Branch code : </b> </span> <span
                                        style="border-bottom: 1px solid black;"></span>
                                </td>
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

                                <td colspan="4" style="border: none !important;"><span> <b>1. CNIC Front: </b></span> <br>

                                    <img src="data:image/jpeg;base64,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"
                                        alt="Front ID Card" style="width:420px;height:220px">

                                <td colspan="4" style="border: none!important"><span> <b>2. CNIC Back: </b></span> <br>

                                    <img src="data:image/jpeg;base64,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"
                                        alt="Front ID Card" style="width: 420px;height:220px">


                                </td>



                            </tr>
                            <tr>

                                <td colspan="4" style="border: none !important;"><span> <b>3. Profile: </b></span> <br>


                                    <img src="data:image/jpeg;base64,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"
                                    style="width:100%;height:100%" alt="Front ID Card" style="">
                                </td>
                                <td colspan="4"style="border: none !important;">
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
