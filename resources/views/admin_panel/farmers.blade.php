@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<!-- [ Header ] end -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<style>
    .bottom--impo th {
        padding-right: 28px !important;
        font-size: 22px !important;
        color: #000 !important;
        text-align: center;
    }

    .h-5 {
        width: 30px;
    }

    .leading-5 {
        padding: 20px 0px;
    }

    .leading-5 span:nth-child(3) {
        color: red;
        font-weight: 500;
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
                            <h2 class="mb-0">Farmers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="reports-table" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>CNIC</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>UC</th>
                                <th>Chak Goth Killi</th>
                                <th>Khasra Survey No</th>
                                <th>Mobile</th>
                                <th>Area Category</th>
                                <th>Area</th>
                                <th>Ownership</th>
                                <th>Aid Type</th>
                                <th>Seed Required Qty</th>
                                <th>Seed Variety</th>
                                <th>Seed Given Qty</th>
                                <th>Seed Variety Given</th>
                                <th>Seed Given By</th>
                                <th>Seed Given Date</th>
                                <th>Seed Given Location</th>
                                <th>Is Distributed</th>
                                <th>Cheque Amount</th>
                                <th>Cheque Number</th>
                                <th>Is Verified</th>
                                <th>Rejection Reason</th>
                                <th>Verified By</th>
                                <th>Verified On</th>
                                <th>Verified Location GPS</th>
                                <th>Registration SMS DateTime</th>
                                <th>Seed Given SMS DateTime</th>
                                <th>Receiver Mobile No</th>
                                <th>Front ID Card</th>
                                <th>Back ID Card</th>
                                <th>Cheque Picture</th>
                                <th>Created On</th>
                                <th>Created By</th>
                                <th>GPS Location</th>
                                <th>Land Proof Pic</th>
                                <th>Bank ID</th>
                                <th>Bank Account Title</th>
                                <th>Bank Account Number</th>
                                <th>Tappa</th>
                                <th>Other Attachments</th>
                                <th>Farmer Picture</th>
                                <th>Total Area</th>
                                <th>Gender</th>
                                <th>Is Sent To BISP</th>
                                <th>User ID</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Deleted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($all_user as $farmer)
                            <tr>
                                <td>{{ $farmer->id }}</td>
                                <td>{{ $farmer->Name }}</td>
                                <td>{{ $farmer->FatherName }}</td>
                                <td>{{ $farmer->CNIC }}</td>
                                <td>{{ $farmer->Province }}</td>
                                <td>{{ $farmer->District }}</td>
                                <td>{{ $farmer->Tehsil }}</td>
                                <td>{{ $farmer->UC }}</td>
                                <td>{{ $farmer->ChakGothKilli }}</td>
                                <td>{{ $farmer->KhasraSurveyNo }}</td>
                                <td>{{ $farmer->Mobile }}</td>
                                <td>{{ $farmer->AreaCategory }}</td>
                                <td>{{ $farmer->Area }}</td>
                                <td>{{ $farmer->Ownership }}</td>
                                <td>{{ $farmer->AidType }}</td>
                                <td>{{ $farmer->SeedRequiredQty }}</td>
                                <td>{{ $farmer->SeedVariety }}</td>
                                <td>{{ $farmer->SeedGivenQty }}</td>
                                <td>{{ $farmer->SeedVarietyGiven }}</td>
                                <td>{{ $farmer->SeedGivenBy }}</td>
                                <td>{{ $farmer->SeedGivenDate }}</td>
                                <td>{{ $farmer->SeedGivenLocation }}</td>
                                <td>{{ $farmer->IsDistributed }}</td>
                                <td>{{ $farmer->ChequeAmount }}</td>
                                <td>{{ $farmer->ChequeNumber }}</td>
                                <td>{{ $farmer->IsVerified }}</td>
                                <td>{{ $farmer->RejectionReason }}</td>
                                <td>{{ $farmer->VerifiedBy }}</td>
                                <td>{{ $farmer->VerifiedOn }}</td>
                                <td>{{ $farmer->VerifiedLocationGps }}</td>
                                <td>{{ $farmer->RegistrationSMSDateTime }}</td>
                                <td>{{ $farmer->SeedGivenSMSDateTime }}</td>
                                <td>{{ $farmer->ReceiverMobileNo }}</td>
                                <td>{{ $farmer->FrontIDCard }}</td>
                                <td>{{ $farmer->BackIDCard }}</td>
                                <td>{{ $farmer->ChequePicture }}</td>
                                <td>{{ $farmer->CreatedOn }}</td>
                                <td>{{ $farmer->CreatedBy }}</td>
                                <td>{{ $farmer->GPSLocation }}</td>
                                <td>{{ $farmer->LandProofPic }}</td>
                                <td>{{ $farmer->BankID }}</td>
                                <td>{{ $farmer->BankAccountTitle }}</td>
                                <td>{{ $farmer->BankAccountNumber }}</td>
                                <td>{{ $farmer->Tappa }}</td>
                                <td>{{ $farmer->OtherAttachments }}</td>
                                <td>{{ $farmer->FarmerPicture }}</td>
                                <td>{{ $farmer->TotalArea }}</td>
                                <td>{{ $farmer->GenderID }}</td>
                                <td>{{ $farmer->IsSentToBisp }}</td>
                                <td>{{ $farmer->user_id }}</td>
                                <td>{{ $farmer->created_at }}</td>
                                <td>{{ $farmer->updated_at }}</td>
                                <td>{{ $farmer->deleted_at }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="56">No farmers found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="py-5">
                        {{ $all_user->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    

    // $(document).ready(function() {
    //     $('#reports-table').DataTable({
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copyHtml5',
    //             'excelHtml5',
    //             'csvHtml5',
    //             'pdfHtml5'
    //         ]
    //     });
    // });
</script>
</body>

</html>