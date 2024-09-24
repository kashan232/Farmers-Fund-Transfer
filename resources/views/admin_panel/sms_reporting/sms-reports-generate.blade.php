@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')
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
        padding: 15px 0px;

    }

    .leading-5 span:nth-child(3) {
        color: red;
        font-weight: 500;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_paginate {
        display: none;
    }
    /* Adjust for specific input types if necessary */
    input[type="number"]::placeholder {
        color: #555;
        /* Darker placeholder */
    }
</style>
<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<!-- [ Header ] end -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Send SMS to Selected Farmers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">


            <div class="col-md-6">
                <div class="table-responsive">
                    <table id="reports-table" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $farmer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $farmer->Name }}</td>
                                <td>{{ $farmer->Mobile }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="56">No farmers found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    <div class="py-5">
                        {{ $data->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Send Message</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="#" method="get" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <label class="form-label" style="font-weight: 600;"> Numbers</label>
                                            <input type="number" class="form-control" name="Numbers" placeholder="03313069687,03150035801,03104433274,03113274124,03153252837,03053451559">
                                        </div>

                                        <div class="col-12 mt-2">
                                            <label class="form-label" style="font-weight: 600;"> Message</label>
                                            <textarea name="" id="" class="form-control" rows="10"></textarea>
                                        </div>


                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success">Send Message</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
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
    $(document).ready(function() {
        $('#reports-table').DataTable({
            "pageLength": 100, // Default number of rows per page
            "dom": 'frtip', // Only include the filter (search box), table, and pagination
            "processing": true, // Optional: for large datasets
            "deferRender": true, // Improves performance by rendering rows only when needed
            "order": [
                [0, 'asc']
            ], // Default ordering of the first column (optional)
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "language": {
                "search": "Search:" // Customize the search box label (optional)
            }
        });
    });
</script>
</body>

</html>