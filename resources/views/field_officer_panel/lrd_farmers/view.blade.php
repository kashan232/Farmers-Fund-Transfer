@include('field_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('field_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('field_officer_panel.include.navbar_include')
<!-- [ Header ] end -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
    .question {
        width: 70px !important;
        text-align: center;
        color: black;
    }

    tr td {
        text-align: center;
    }
    tr td img{
        width: 20px;
        height: 20px;
    }
</style>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Farmer Details</h2>
                            <button onclick="generatePDF()" class="btn btn-danger mt-3">Download PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body " style="    overflow: scroll;">


                        <table class="table table-bordered" id="farmer-details-table" cellspadding="10px">
                            <tr>
                                <th colspan="10">SECTION I. GROWER INFORMATION</th>
                            </tr>
                            <tr>
                                <th class="question"> Q1.</th>
                                <th colspan="2">Name: </th>
                                <td colspan="2">{{ $data->name }}</td>
                                <th class="question"> Q2.</th>
                                <th colspan="2">Father/Husband Name : </th>
                                <td colspan="2">{{ $data->father_name }}</td>
                            </tr>
                            <tr>
                                <th class="question"> Q3.</th>
                                <th colspan="2">CNIC No : </th>
                                <td colspan="2">{{ $data->cnic }}</td>
                                <th class="question"> Q4.</th>
                                <th colspan="2">Mobile No : </th>
                                <td colspan="3">{{ $data->mobile }}</td>
                            </tr>
                            <tr>
                                <th class="question"> Q5.</th>
                                <th colspan="2">District : </th>
                                <td colspan="2">{{ $data->district }}</td>
                                <th class="question"> Q6.</th>

                                <th colspan="2">Taluka : </th>
                                <td colspan="3">{{ $data->tehsil }}</td>
                            </tr>
                            <tr>
                                <th class="question"> Q7.</th>
                                <th colspan="2">Union Council : </th>
                                <td colspan="2">{{ $data->uc }}</td>
                                <th class="question"> Q8.</th>
                                <th colspan="2">Tappa : </th>
                                <td colspan="3">{{ $data->tappa }}</td>
                            </tr>
                            <tr>
                                <th class="question"> Q9.</th>
                                <th colspan="2">Deh </th>
                                <td colspan="2">{{ $data->dah }}</td>
                                <th class="question"> Q10.</th>

                                <th colspan="2">Village</th>
                                <td colspan="3">{{ $data->village }}</td>
                            </tr>
                            <tr>
                                <th class="question"> Q11.</th>
                                <th colspan="2" >Gender : </th>
                                <td colspan="2" style="text-align: center">{{ $data->gender }}</td>
                                <td colspan="1" style="width: 120px;"><img src="checkmark.png" alt=""></td>
                                <th colspan="2" >House Type : </th>

                                <td colspan="2">{{ $data->house_type }}</td>
                            </tr>
                            <tr>

                                <th class="question" rowspan="2">Q12.</th>
                                <th colspan="2">Owner Type </th>
                                <th colspan="7"> {{ $data->owner_type }}</th>
                            </tr>
                            <tr>

                                <th colspan="3"> Sharecropper</th>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <th rowspan="4" class="question">Q13.</th>
                                <th colspan="9  ">Family Composition and age of respondent</th>
                            </tr>
                            <tr class="text-center">
                                <th colspan="3">Gender</th>
                                <th colspan="3">Children < 18 years</th>
                                <th colspan="3">Adults > 18 years</th>
                            </tr>
                            <tr class="text-center">
                                <td colspan="3">Female</td>
                                <td colspan="3">{{ $data->female_children_under16 }}</td>
                                <td colspan="3">{{ $data->female_Adults_above16 }}</td>
                            </tr>
                            <tr class="text-center">

                                <td colspan="3">Male</td>
                                <td colspan="3">{{ $data->male_children_under16 }}</td>
                                <td colspan="3">{{ $data->male_Adults_above16 }}</td>
                            </tr>
                            <tr>
                                <th class="question" rowspan="2">Q14. </th>
                                <th colspan="3">Next of kin :</th>
                                <th colspan="2">Full Name :</th>

                                <td colspan="5" style="text-align: left;">13221321321312</td>

                            </tr>
                            <tr>
                                <th colspan="2" style="text-align: left;">CNIC No :</th>
                                <td colspan="3"></td>

                                <th colspan="1" style="text-align: left;">Mobile No:</th>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <th class="question">Q15.</th>
                                <th colspan="3">House type</th>
                                <th colspan="2">Pakka House </th>
                                <td></td>
                                <th colspan="1">Kacha House </th>
                                <td colspan="2"></td>
                            </tr>



                            <tr>
                                <th rowspan="5" class="question">Q 16.</th>
                                <th colspan="9">Landholding :</th>
                            </tr>
                            <tr>
                                <th colspan="3">(1) Total Landholding (Acres) : </th>
                                <td colspan="2">Dolores irure esse</td>
                                <th colspan="2">(2) Total Area With Hari(s) (Acres)  </th>
                                <td colspan="2">Ut sapiente aut ea b</td>
                            </tr>
                            <tr>
                                <th colspan="3"> (3) Total Self-Cultivated land (Acres) :</th>
                                <td colspan="2">Mollitia sit vel qui</td>
                                <th colspan="2"> (4) Total Fallow Land (Acres)</th>
                                <td colspan="2">Aliqua Est vero dol</td>
                            </tr>
                            <tr>
                                <th colspan="9">Particulars of Tenants / Sharecroppers</th>

                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">Full Name</th>
                                <th colspan="3" class="text-center">CNIC Number</th>
                                <th colspan="2" class="text-center">Mobile Number </th>
                                <th colspan="2" class="text-center">Total Area (Acres) </th>
                            </tr>
                            <tr>
                                <th class="question"> i.</th>
                                <td colspan="2">s</td>
                                <td colspan="3">s</td>
                                <td colspan="2">s</td>
                                <td colspan="2">s</td>
                            </tr>
                            <tr>
                                <th class="question"> ii.</th>
                                <td colspan="2">s</td>
                                <td colspan="3">s</td>
                                <td colspan="2">s</td>
                                <td colspan="2">s</td>
                            </tr>
                            <tr>
                                <th class="question"> iii.</th>
                                <td colspan="2">s</td>
                                <td colspan="3">s</td>
                                <td colspan="2">s</td>
                                <td colspan="2">s</td>
                            </tr>



                            <tr>
                                <th rowspan="6" class="question">Q 17.</th>
                                <th colspan="9"> B. Crops Status</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center">Rabi Season</th>
                                <th colspan="3" class="text-center">Kharif Season</th>
                                <th colspan="3" class="text-center">Orchards</th>
                            </tr>
                            <tr>
                                <th>Crop (s)</th>
                                <th>Area (Acres)</th>
                                <th>Average yield (Per Acres)</th>
                                <th>Crop(s)</th>
                                <th>Area (Acres)</th>
                                <th>Average yield (Per Acre)</th>
                                <th>Name of fruit(s)</th>
                                <th>Area(Acres)</th>
                                <th>Average yield (Per Acre)</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr style="height: 30px;border: none;">

                            </tr>
                            <tr>
                                <th rowspan="11" class="question">Q 18.</th>
                                <th colspan="9">Physical Assets (Farm machinery)-currently owned : </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center">Item</th>
                                <th colspan="2" class="text-center">Yes or No </th>
                                <th colspan="2" class="text-center">Item </th>
                                <th colspan="3" class="text-center">Yes or No </th>
                            </tr>
                            <tr >
                                <td colspan="3" style="text-align: left;text-transform: capitalize;">car/jeep</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2" style="text-align: left;">Plough (wood or metal)</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">pickup/loader</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2"style="text-align: left;">laser lever</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">Motorcycle</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2" style="text-align: left;">Rotavator</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">Bicycles</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2" style="text-align: left;">Thresher</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">Bullock cart</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2" style="text-align: left;">Harvester</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">Tractor (4 wheels)</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2" style="text-align: left;"> Any Other</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">Disk harrow</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2" style="text-align: left;"></td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">Cultivator</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2"style="text-align: left;" ></td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <td colspan="3" style="text-align: left;">Tractor Trolley</td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td>
                                <td colspan="2" style="text-align: left;"></td>
                                <td colspan="2"><img src="checkmark.png" alt=""></td></td>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <th rowspan="6" class="question">Q 19.</th>
                                <th colspan="9">Livestock and Poultry -assets currently owned : </th>
                            </tr>
                            <tr style="text-transform: capitalize;">
                                <th colspan="3" class="text-center">Type of animal</th>
                                <th colspan="2" class="text-center">Numbers Now </th>
                                <th colspan="2" class="text-center">Type of animal </th>
                                <th colspan="3" class="text-center">Numbers Now </th>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: left;">Poultry (Chicken ,ducks, etc)</td>
                                <td colspan="2" style="text-align: left;"></td>
                                <td colspan="2" style="text-align: left;">Goats</td>
                                <td colspan="2" style="text-align: left;"></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: left;">Buffalo</td>
                                <td colspan="2" style="text-align: left;"></td>
                                <td colspan="2"style="text-align: left;">sheep</td>
                                <td colspan="2" style="text-align: left;"></td>
                            </tr>
                            <tr>
                                <td colspan="3"style="text-align: left;">Cows</td>
                                <td colspan="2"style="text-align: left;"></td>
                                <td colspan="2"style="text-align: left;">Horses/Mules</td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="3"style="text-align: left;">Camels</td>
                                <td colspan="2"style="text-align: left;"></td>
                                <td colspan="2"style="text-align: left;">Donkeys</td>
                                <td colspan="2"style="text-align: left;"></td>
                            </tr>



                            <tr>
                                <th rowspan="3" class="question"> Q 20. </th>
                                <th colspan="9">Source of irrigation </th>

                            </tr>
                            <tr>
                                <th colspan="3"> (1) Tube Well</th>
                                <td colspan="2"></td>
                                <th colspan="2"> (2) Canal System</th>
                                <td colspan="2"></td>

                            </tr>
                            <tr>
                                <th colspan="3"> (3) Rain /Barraini</th>
                                <td colspan="2"></td>
                                <th colspan="2"> (4) Kacha Area</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th rowspan="3" class="question"> Q 21.</th>
                                <th colspan="9">Source of energy (if tube Well)</th>
                            </tr>
                            <tr>
                                <th colspan="3">(1) Electricity </th>
                                <td colspan="2"></td>
                                <th colspan="2">(2) Solar</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th colspan="3"> (3) Petrol/Diesel/Gas </th>
                                <td colspan="2"></td>
                                <th colspan="2"> (4) any Other</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th rowspan="3" class="question"> Q 22.</th>
                                <th colspan="9">Status of water course Total length (meter)_______________Total command
                                    area (acres)_______________</th>
                            </tr>
                            <tr>
                                <th colspan="3"> (1) Lined </th>
                                <td colspan="2"></td>
                                <th colspan="2"> (2) unlined</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th colspan="5"> (3) if lined how much length is line (meter) </th>
                                <td colspan="4"></td>

                            </tr>
                            <tr>

                                <th colspan="10 " class="p-3">Bank & Account Details : </th>
                            </tr>
                            <tr>
                                <th class="question"> Q 23.</th>
                                <th colspan="2">Title of Account </th>
                                <td colspan="2"></td>
                                <th class="question"> Q 24.</th>
                                <th colspan="2"> Account No .</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th class="question"> Q 25.</th>
                                <th colspan="2">Bank Name :</th>
                                <td colspan="2"></td>
                                <th class="question"> Q 26.</th>
                                <th colspan="2"> Branch Name : </th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th class="question"> Q 26.</th>
                                <th colspan="2"> IBAN :</th>
                                <td colspan="2"></td>
                                <th class="question"> Q 28.</th>
                                <th colspan="2"> Branch Code : </th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th colspan="10" class="p-3">SECTION II. DOCUMENT UPLOADED / COLLECTED</th>
                            </tr>
                            <tr>
                                <th class="question" rowspan="3"> Q 29.</th>
                                <th colspan="9"> Documents Collected  : </th>
                            </tr>
                            <tr>

                                <th colspan="2"> 1  CNIC </th>
                                <td colspan="2">3232132313213213</td>
                                <th colspan="3"> 2 Forms VII/VIII A/Affidavit/Heirship/Registry from micro (land
                                    Documents) </th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th  colspan="2"> 3  Photo </th>
                                <td colspan="2"></td>
                                <th colspan="3"> 4  Others </th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th colspan="10" class="p-3">SECTION III. SURVEYOR / ENUMERATOR DETAILS </th>
                            </tr>
                            <tr>
                                <th colspan="10">Office Use </th>
                            </tr>
                            <tr>
                                <th colspan="3"> 30. Name of Surveyor Team </th>
                                <td colspan="3"></td>
                                <th colspan="1"> 31. Designation : </th>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <th colspan="3">32. Date of Survey</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th colspan="3">Signature of Surveyour Team </th>
                                <td colspan="2"></td>
                                <th colspan="3">Signature/Thumb Impression of Grower / Famer (Hari)</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th colspan="10">SECTION IV. VERIFICATION</th>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-center">VERIFICATION / AUTHENTICATED</th>
                                <th colspan="4" class="text-center"> NOT VERIFICATION / NOT AUTHENTICATED</th>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="4">Reason if not verified : </td>
                            </tr>
                            <tr>
                                <th colspan="6">Name. Designation & Mobile phone number of verifier</th>
                                <th colspan="4" class="text-center"> Signature & Stamp</th>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="4" class="text-center"> </td>
                            </tr>
                     </table>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

<script>
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const table = document.getElementById('farmer-details-table');

        // Use autoTable to generate the PDF from the HTML table
        doc.autoTable({
            html: table,
            startY: 10,
            theme: 'grid'
        });

        doc.save('farmer_details.pdf');
    }
</script>


</body>
</html>
