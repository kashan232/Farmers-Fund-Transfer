
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
       .question {
        width: 60px !important;
        text-align: center;
        color: black;
    }
    table{
        text-transform: capitalize;
    }
    tr td {
        /* text-align: center; */
    }
    tr td i{
       font-size: 20px;
       color: green;
       font-weight: bolder;
    }
    th,td{
        font-size: 12px;
    }
    @media print {
    .question {
        width: 100%; /* Ya jitna required ho utna set karein */
        word-wrap: break-word; /* Overflow handle karne ke liye */
    }
    body {
        margin: 0;
        padding: 0;
    }
    .print-cancel{
        border: none;
    }
    .print-cancel-child{
        border: none;
    }

}
.question {
    overflow: hidden;
    text-overflow: ellipsis; /* Agar text cut karna ho */
    white-space: normal; /* Text ko wrap karne ke liye */
}
.container {
    width: 80%; /* Ya jitni required hai */
    margin: 0 auto; /* Center alignment ke liye */
}

        /* Full-page overlay style */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            display: none; /* Initially hidden */
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure it's on top */
        }

        /* Disable pointer events (no click events on background) */
        .no-click {
            pointer-events: none; /* Disable clicks on the body */
        }

</style>
<body>
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
                <button class="btn btn-success btn-sm" onclick="downloadPDF()">Download PDF</button>
                </div>
            </div>
        </div>

        <div class="row" id="farmer-details-table">
            <div class="col-sm-12">
                <div class="">
                    <div class="card-body">
                        <table class="table table-bordered"  cellspadding="20px" >
                            <tr>
                                <th colspan="8">SECTION I. GROWER INFORMATION</th>
                            </tr>
                            <tr>
                                <th class="question" > Q1.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Name  : </b></span> <span style="border-bottom: 1px solid black;">{{$data->name}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q2.&nbsp&nbsp Father/Husband Name   : </b> </span>  <span style="border-bottom: 1px solid black;">{{$data->father_name}}</span></td>

                            </tr>
                            <tr>
                                <th class="question" > Q3.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b> CNIC No:</b></span>  <span style="border-bottom: 1px solid black;">{{$data->cnic}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q4.&nbsp&nbsp Mobile No : </b> </span> <span style="border-bottom: 1px solid black;">{{$data->mobile}}</span></td>
                            </tr>
                            <tr>
                                <th class="question" > Q5.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"> <span> <b>District : </b></span>   <span style="border-bottom: 1px solid black;">{{$data->district}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q6.&nbsp&nbsp Taluka  : </b> </span>  <span style="border-bottom: 1px solid black;">{{$data->tehsil}}</span></td>
                            </tr>
                            <tr>
                                <th class="question" > Q7.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"> <span> <b>Union Council  : </b></span>   <span style="border-bottom: 1px solid black;">{{$data->uc}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q8. &nbsp&nbsp Tappa  : </b> </span>  <span style="border-bottom: 1px solid black;">{{$data->tappa}}</span></td>
                            </tr>
                            <tr>
                                <th class="question" > Q9.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"> <span> <b>Deh : </b></span>   <span style="border-bottom: 1px solid black;">{{$data->dah}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q10.&nbsp&nbsp Village  : </b> </span>  <span style="border-bottom: 1px solid black;">{{$data->village}}</span></td>
                            </tr>
                            <tr> <th class="question" > Q11.</th>

                                <td colspan="3" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Gender  :&nbsp&nbsp&nbsp {!! ($data->gender == 'male' ? '<i class="fa-solid fa-check"></i>' : '') !!}
                                    Male </b>&nbsp &nbsp&nbsp<b> {!! ($data->gender == 'female' ? '<i class="fa-solid fa-check"></i>' : '') !!}
                                        Female </b>&nbsp&nbsp<span></span></span> </td>
                                <td colspan="5" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q12.&nbsp&nbsp Owner Type: </b>&nbsp&nbsp&nbsp {!! ($data->owner_type == 'owner' ? '<i class="fa-solid fa-check"></i>' : '') !!} 1.Owner &nbsp&nbsp&nbsp&nbsp&nbsp{!! ($data->owner_type == 'makadedar' ? '<i class="fa-solid fa-check"></i>' : '') !!}2. Makadedar(Contractor/leasee) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{!! ($data->owner_type == 'sharecropper' ? '<i class="fa-solid fa-check"></i>' : '') !!}3. Sharecropper/Tenant </span> </td>

                            </tr>
                            <tr>
                                <th rowspan="2" class="question" >Q13.</th>
                                <th colspan="8  ">Family Composition and age of respondent</th>
                            </tr>
                            <tr >
                                <td colspan="8">
                                    <div class="family   row p-3">
                                         <div class="col-lg-2 border text-center p-2 p-2"><b>Gender</b></div>
                                         <div class="col-lg-5 border text-center p-2"><b>Children < 18 years</b></div>
                                         <div class="col-lg-5 border text-center p-2"><b>Adults > 18 years </b></div>
                                         <div class="col-lg-2 border text-center p-2"><b>Female</b></div>
                                         <div class="col-lg-5 border text-center p-2">{{  $data->female_children_under16 }}</div>
                                         <div class="col-lg-5 border text-center p-2">{{  $data->female_Adults_above16 }}</div>
                                         <div class="col-lg-2 border text-center p-2"><b>Male</b></div>
                                         <div class="col-lg-5 border text-center p-2">{{  $data->male_children_under16 }}</div>
                                         <div class="col-lg-5 border text-center p-2">{{  $data->male_children_under16 }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr> <th class="question" > Q14.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Next of Kin  : Full Name : </b></span> <span style="border-bottom: 1px solid black;">{{$data->full_name_of_next_kin}}</span>&nbsp&nbsp&nbsp<span> <b> CNIC No : </b></span> <span style="border-bottom: 1px solid black;">{{$data->cnic_of_next_kin}}</span>&nbsp&nbsp&nbsp<span> <b>Mobile No </b></span> <span style="border-bottom: 1px solid black;">{{$data->mobile_of_next_kin}}</span> </td>

                            </tr>
                            <tr> <th class="question" > Q15.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>House type: </b> {!! ($data->house_type == 'pakka_house' ? '<i class="fa-solid fa-check"></i>' : '') !!} (1) Paka House </span> <span style="border-bottom: 1px solid black;"></span>&nbsp&nbsp&nbsp<span>  {!! ($data->house_type == 'kacha_house' ? '<i class="fa-solid fa-check"></i>' : '') !!}(2) Kacha House </span> <span style="border-bottom: 1px solid black;"></span>&nbsp&nbsp&nbsp</td>

                            </tr>
                            <tr>
                                <th class="question" rowspan="5" > Q16.</th>
                                <td colspan="8"><b>Landholding</b></td>
                            </tr>
                            <tr>

                                <td colspan="4" style="border: none;"><span> <b>(1)Total Landholding (Acres)  : </b></span> <span style="border-bottom: 1px solid black;">{{$data->total_landing_acre}}</span></td>
                                <td colspan="4" style="border: none;"><span> <b>(2)Total Area with Hari(s) (Acres)   : </b> </span>  <span style="border-bottom: 1px solid black;">{{$data->total_area_with_hari}}</span></td>

                            </tr>
                            <tr>

                                <td colspan="4" style="border: none;"><span> <b>(3)Total self-cultivated land (Acres)  : </b></span> <span style="border-bottom: 1px solid black;">{{$data->total_area_cultivated_land}}</span></td>
                                <td colspan="4" style="border: none;"><span> <b>(4)Total fallow land  (Acres)   : </b> </span>  <span style="border-bottom: 1px solid black;">{{$data->total_fallow_land}}</span></td>

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
                                <th class="question" > {{$index+1}}</th>
                                <td colspan="2">{{json_decode($data->title_name)[$index]}}</td>
                                <td colspan="2 " class="text-center">{{json_decode($data->title_cnic)[$index]}}</td>
                                <td colspan="2 " class="text-center">{{json_decode($data->title_number)[$index]}}</td>
                                <td colspan="2 " class="text-center">{{json_decode($data->title_area)[$index]}}</td>
                            </tr>

                            @endforeach


                            <tr>
                                <th rowspan="2" class="question" >Q 17.</th>
                                <th colspan="8"> B. Crops Status</th>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;"><b>Rabi Season</b></td>
                                            <td style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;"><b>Kharif Season</b></td>
                                            <td style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;"><b>Orchards</b></td>
                                            <td style="width: 12.5%; border: 1px solid rgb(192, 192, 192); text-align: center; padding: 10px;"><b>Other</b></td>

                                        </tr>
                                        <tr>
                                            <td style="width: 12.5%;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Crop(s)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Area (Acres)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    @if(is_array($data->crop_season) || is_string($data->crop_season))
                                                    @php
                                                        // Decoding the JSON if it's a JSON string
                                                        $cropSeasons = is_string($data->crop_season) ? json_decode($data->crop_season) : $data->crop_season;
                                                    @endphp
                                                    @if(in_array('rabi_season', json_decode($data->crop_season)))


                                                    @foreach (json_decode($data->crops) as $index => $crop)
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crops)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_area)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_average_yeild)[$index]}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    @endif


                                                </table>
                                            </td>
                                            <td style="width: 12.5%;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Crop(s)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Area (Acres)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    @if(is_array($data->crop_season) || is_string($data->crop_season))
                                                    @php
                                                        // Decoding the JSON if it's a JSON string
                                                        $cropSeasons = is_string($data->crop_season) ? json_decode($data->crop_season) : $data->crop_season;
                                                    @endphp
                                                    @if(in_array('kharif_season', json_decode($data->crop_season)))
                                                    @foreach (json_decode($data->crops) as $crop)
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crops)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_area)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_average_yeild)[$index]}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    @endif

                                                </table>
                                            </td>
                                            <td style="width: 12.5%;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Fruit(s)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Area (Acres)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    @if(is_array($data->crop_season) || is_string($data->crop_season))
                                                    @php
                                                        // Decoding the JSON if it's a JSON string
                                                        $cropSeasons = is_string($data->crop_season) ? json_decode($data->crop_season) : $data->crop_season;
                                                    @endphp
                                                    @if(in_array('orchards', json_decode($data->crop_season)))
                                                    @foreach (json_decode($data->crops) as $crop)
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crops)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_area)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_average_yeild)[$index]}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    @endif

                                                </table>
                                            </td>
                                            <td style="width: 12.5%;">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Crop(s)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Area (Acres)</b></td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center; padding: 5px;"><b>Average Yield (Per Acre)</b></td>
                                                    </tr>
                                                    @if(is_array($data->crop_season) || is_string($data->crop_season))
                                                    @php
                                                        // Decoding the JSON if it's a JSON string
                                                        $cropSeasons = is_string($data->crop_season) ? json_decode($data->crop_season) : $data->crop_season;
                                                    @endphp
                                                    @if(in_array('any_other', json_decode($data->crop_season)))
                                                    @foreach (json_decode($data->crops) as $crop)
                                                    <tr>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crops)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_area)[$index]}}</td>
                                                        <td style="border: 1px solid rgb(192, 192, 192); text-align: center;">{{json_decode($data->crop_average_yeild)[$index]}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    @endif

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th rowspan="2" class="question" >Q18.</th>
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
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('car/jeep', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2"><b>Plough (Wood or metal)</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b></b></div>
                                         <div class="col-lg-3 border text-center p-2 p-2"><b>Pickup /loader</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('pickup/loader', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2"><b>laser lever</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('laser_lever', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2 p-2"><b>Motorcycle</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('motorcycle', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2"><b>rotavator</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('rotavetor', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2 p-2"><b>Bicycles</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('bicycles', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2"><b>Thresher</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('thresher', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2 p-2"><b>Bullock cart</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('bullock_cart', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2"><b>Harverter</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('harvester', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2 p-2"><b>Tractor (4 wheels)</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('Tractor(4wheels)', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2"><b>any other</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('any_other', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>
                                         <div class="col-lg-3 border text-center p-2 p-2"><b>disk harrow</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('disk_harrow', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>

                                         <div class="col-lg-3 border text-center p-2 p-2"><b>Cultivator</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('cultivator', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>

                                         <div class="col-lg-3 border text-center p-2 p-2"><b>Tractor Trolley</b></div>
                                         <div class="col-lg-3 border text-center p-2"><b> {!! in_array('tractor_trolley', json_decode($data->physical_asset_item)) ? '<i class="fa-solid fa-check"></i>' : '' !!}  </b></div>



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

                                         @if(is_array($data->animal_name) || is_string($data->animal_name))
                                        @php
                                            // Decoding the JSON if it's a JSON string
                                            $cropSeasons = is_string($data->animal_name) ? json_decode($data->animal_name) : $data->animal_name;
                                        @endphp

                                        @foreach (json_decode($data->animal_name) as $index => $animal)
                                         <div class="col-lg-6 border text-center p-2 p-2"><b>{{json_decode($data->animal_name)[$index]}}</b></div>
                                         <div class="col-lg-6 border text-center p-2"><b>{{json_decode($data->animal_qty)[$index]}}</b></div>
                                        @endforeach

                                        @endif


                                    </div>
                                </td>
                            </tr>

                            <tr> <th class="question" > Q20.</th>
                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Source of irrigation: {!! ($data->source_of_irrigation == 'tube_well' ? '<i class="fa-solid fa-check"></i>' : '') !!} (1) Tube well : </b></span> <span></span>&nbsp&nbsp&nbsp<span> <b> {!! ($data->source_of_irrigation == 'canal_system' ? '<i class="fa-solid fa-check"></i>' : '') !!}  (2) canal system : </b></span> <span ></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span> <b> {!! ($data->source_of_irrigation == 'rain_barrani' ? '<i class="fa-solid fa-check"></i>' : '') !!}  (3) Rain/Barrani </b></span> <span ></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span> <b> {!! ($data->source_of_irrigation == 'kaccha_area' ? '<i class="fa-solid fa-check"></i>' : '') !!}  (4) Kaccha Area </b></span> <span ></span> </td>
                            </tr>
                            <tr> <th class="question" > Q21.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Source of energy:
                                    (1) Electricity : </b></span> <span >{!! ($data->source_of_irrigation_engery == 'solar' ? '<i class="fa-solid fa-check"></i>' : '') !!}</span>&nbsp&nbsp&nbsp<span> <b>
                                    (2) solar : </b></span><span style="">{!! ($data->source_of_irrigation_engery == 'electricity' ? '<i class="fa-solid fa-check"></i>' : '') !!}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span> <b>
                                    (3) Petrol /Diesel/gas </b></span> <span style="">{!! ($data->source_of_irrigation_engery == 'Petrol/Diesel/Gas' ? '<i class="fa-solid fa-check"></i>' : '') !!}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span> <b>
                                    (4) any other </b></span> <span >{!! ($data->source_of_irrigation_engery == 'any_other' ? '<i class="fa-solid fa-check"></i>' : '') !!}</span> </td>

                            </tr>
                            <tr> <th class="question"  rowspan="2"> Q22.</th>

                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span ><b>Status of water course total lenth(meter) &nbsp&nbsp&nbsp <u>{{$data->line_length}}</u> </b></span>&nbsp&nbsp&nbsp<span> <b> Total command area (acres) &nbsp&nbsp&nbsp <u>{{ $data->total_command_area}}</u> </b></span></td>

                            </tr>
                            <tr>
                                <td colspan="8" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b> (1) lined </b></span> <span style="border-bottom: 1px solid black;">{!! ($data->line_status == 'lined' ? '<i class="fa-solid fa-check"></i>' : '') !!}</span>&nbsp&nbsp&nbsp<span> <b> (2) unlined : </b></span> <span style="border-bottom: 1px solid black;">{!! ($data->line_status != 'lined' ? '<i class="fa-solid fa-check"></i>' : '') !!}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span> <b> (3) if lined how much length is lined(meter)</b></span> <span style="border-bottom: 1px solid black;">{{$data->lined_length}}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>

                            </tr>
                            <tr>

                                <th colspan="8 " class="p-3">Bank & Account Details : </th>
                            </tr>
                            <tr>
                                <th class="question" > Q23.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Title of Account  : </b></span> <span style="border-bottom: 1px solid black;">{{$data->account_title}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q24. &nbsp;&nbsp; Account no : </b> </span>  <span style="border-bottom: 1px solid black;">{{$data->account_no}}</span></td>

                            </tr>
                            <tr>
                                <th class="question" > Q25.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b> Bank Name:</b></span>  <span style="border-bottom: 1px solid black;">{{$data->bank_name}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q26. &nbsp;&nbsp; Branch Name : </b> </span> <span style="border-bottom: 1px solid black;">{{$data->branch_name}}</span></td>
                            </tr>
                            <tr>
                                <th class="question" > Q27.</th>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b> IBAN:</b></span>  <span style="border-bottom: 1px solid black;">{{$data->IBAN_number}}</span></td>
                                <td colspan="4" style="border: none;border-bottom: 1px solid rgb(192, 192, 192);"><span> <b>Q28. &nbsp;&nbsp; Branch code  : </b> </span> <span style="border-bottom: 1px solid black;">{{$data->branch_code}}</span></td>
                            </tr>
                            <tr>
                                <th colspan="8" class="p-3">SECTION II. DOCUMENT UPLOADED / COLLECTED</th>
                            </tr>
                            <tr>
                                <th class="question" rowspan="6" > Q29.</th>
                                <td colspan="8"><b>Documents Collected  :</b></td>
                            </tr>

                            <tr>

                                <td colspan="4" style="border: none;"><span> <b>1  CNIC Front  : </b></span> <br>
                                    @if($data->front_id_card != null)
                                        @php
                                            // Assuming front_id_card contains the path to the image file
                                            $imagePath = public_path('land_farmers/front_id_card/' . $data->front_id_card);

                                            // Check if the image exists before encoding
                                            if (file_exists($imagePath)) {
                                                $imageData = base64_encode(file_get_contents($imagePath));
                                                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                            } else {
                                                $imageSrc = '';
                                            }
                                        @endphp

                                        @if($imageSrc)
                                            <img src="{{ $imageSrc }}" alt="Front ID Card" style="width:300px;height:180px">
                                        @else
                                            <p>Image not found</p>
                                        @endif
                                    @endif

                               <td colspan="4" style="border: none;"><span> <b>2  CNIC Back  : </b></span> <br>
                                @if($data->back_id_card != null)
                                        @php
                                            // Assuming front_id_card contains the path to the image file
                                            $imagePath = public_path('land_farmers/back_id_card/' . $data->back_id_card);

                                            // Check if the image exists before encoding
                                            if (file_exists($imagePath)) {
                                                $imageData = base64_encode(file_get_contents($imagePath));
                                                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                            } else {
                                                $imageSrc = '';
                                            }
                                        @endphp

                                        @if($imageSrc)
                                            <img src="{{ $imageSrc }}" alt="Front ID Card" style="width:300px;height:180px">
                                        @else
                                            <p>Image not found</p>
                                        @endif
                                    @endif
                                {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:300px;height:180px"> --}}

                            </td>

                            </tr>
                          <tr>
                            <td colspan="8" style="border: none;"><span> <b>3 Forms VII/VIII A/Affidavit/Heirship/Registry from micro (land Documents)  : </b></span> <br>
                                {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:auto;height:auto"> --}}

                               @if($data->upload_land_proof != null)
                                        @php
                                            // Assuming upload_land_proof contains the path to the image file
                                            $imagePath = public_path('land_farmers/upload_land_proof/' . $data->upload_land_proof);

                                            // Check if the image exists before encoding
                                            if (file_exists($imagePath)) {
                                                $imageData = base64_encode(file_get_contents($imagePath));
                                                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                            } else {
                                                $imageSrc = '';
                                            }
                                        @endphp

                                        @if($imageSrc)
                                            <img src="{{ $imageSrc }}" alt="Front ID Card" style="width:300px;height:180px">
                                        @else
                                            <p>Image not found</p>
                                        @endif
                                    @endif
                            </td>
                          </tr>
                          <tr>
                            <td colspan="8" style="border: none;"><span> <b>4 Photo </b></span> <br>
                                {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:auto;height:auto"> --}}
                                @if($data->upload_farmer_pic != null)
                                        @php
                                            // Assuming upload_farmer_pic contains the path to the image file
                                            $imagePath = public_path('land_farmers/upload_farmer_pic/' . $data->upload_farmer_pic);

                                            // Check if the image exists before encoding
                                            if (file_exists($imagePath)) {
                                                $imageData = base64_encode(file_get_contents($imagePath));
                                                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                            } else {
                                                $imageSrc = '';
                                            }
                                        @endphp

                                        @if($imageSrc)
                                            <img src="{{ $imageSrc }}" alt="Front ID Card" style="width:300px;height:180px">
                                        @else
                                            <p>Image not found</p>
                                        @endif
                                    @endif

                            </td>
                          </tr>
                          <tr>
                            <td colspan="8" style="border: none;"><span> <b>5 Others </b></span> <br>

                                {{-- <img src="data:image/jpeg;base64,{{ base64_encode() }}" alt="Image"  style="width:auto;height:auto"> --}}
                                @if($data->upload_other_attach != null)
                                        @php
                                            // Assuming upload_other_attach contains the path to the image file
                                            $imagePath = public_path('land_farmers/upload_other_attach/' . $data->upload_other_attach);

                                            // Check if the image exists before encoding
                                            if (file_exists($imagePath)) {
                                                $imageData = base64_encode(file_get_contents($imagePath));
                                                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                            } else {
                                                $imageSrc = '';
                                            }
                                        @endphp

                                        @if($imageSrc)
                                            <img src="{{ $imageSrc }}" alt="Front ID Card" style="width:300px;height:180px">
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
    <script>
        function downloadPDF() {



              // Select the button and other elements
        const startLoadingBtn = document.getElementById('start-loading-btn');
        const loaderOverlay = document.getElementById('loader-overlay');
        const mainContent = document.getElementById('main-content');


            // Show the loader and apply background fade
            loaderOverlay.style.display = 'flex';
            document.body.classList.add('no-click'); // Disable clicks on the body



            const { jsPDF } = window.jspdf;

            // Create a jsPDF instance with custom page height
            const doc = new jsPDF({
                orientation: 'portrait',
                unit: 'px',
                format: [595, 842 + 46], // Default A4 (595x842) + 100px additional height
            });

            const element = document.getElementById('farmer-details-table');

            // Render the content using html2canvas
            html2canvas(element, { scale: 2 }).then((canvas) => {
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
                            canvas.width, canvasSlice.height,            // Source width, height
                            0, 0,                                        // Destination x, y
                            canvas.width, canvasSlice.height             // Destination width, height
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
