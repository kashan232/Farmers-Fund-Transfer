@include('agriculture_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('agriculture_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('agriculture_officer_panel.include.navbar_include')
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
                            <h2 class="mb-0">Agriculture verified Farmers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-4" style="justify-content: center; display: flex; align-items: center;">
                            <label for="" style="width: 200px">Filter By Status:</label>
                            <select  id="filter_by_status" class="form-control">
                                <option value="">All</option>
                                <option value="Verified">Verified</option>
                                <option value="Unverified">Unverified</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive">
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-between">

                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12 ">
                                        <div class="table-responsive">
                                            <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>CNIC</th>
                                                        <th>Mobile</th>
                                                        <th>District</th>
                                                        <th>Tehsil</th>
                                                        <th>UC</th>
                                                        <th>Tappa</th>
                                                        <th>Village</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($all_agriculture_farmers as $all_agriculture_farmer)
                                                    <tr>
                                                        <td>{{ $all_agriculture_farmer->name }}</td>
                                                        <td>{{ $all_agriculture_farmer->cnic }}</td>
                                                        <td>{{ $all_agriculture_farmer->mobile }}</td>
                                                        <td>{{ $all_agriculture_farmer->district }}</td>
                                                        <td>{{ $all_agriculture_farmer->tehsil }}</td>
                                                        <td>{{ $all_agriculture_farmer->uc }}</td>
                                                        <td>{{ $all_agriculture_farmer->tappa }}</td>
                                                        <td>{{ $all_agriculture_farmer->village }}</td>
                                                        <td>
                                                            @if ($all_agriculture_farmer->verification_status === 'Verified')
                                                            <span class="badge text-bg-success">{{$all_agriculture_farmer->verification_status}}</span>
                                                            @else
                                                            <span class="badge text-bg-danger">{{$all_agriculture_farmer->verification_status}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

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
    @include('agriculture_officer_panel.include.footer_copyright_include')
</footer>

@include('agriculture_officer_panel.include.footer_include')


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.colVis.min.js"></script>



<script>

    // [ DOM/jquery ]
    var total, pageTotal;
    var table = $('#dom-jqry').DataTable();
    // [ column Rendering ]
    $('#colum-render').DataTable({
      columnDefs: [
        {
          render: function (data, type, row) {
            return data + ' (' + row[3] + ')';
          },
          targets: 0
        },
        {
          visible: false,
          targets: [3]
        }
      ]
    });
    // [ Multiple Table Control Elements ]
    $('#multi-table').DataTable({
      dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
      buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
    });
    // [ Complex Headers With Column Visibility ]
    $('#complex-header').DataTable({
      columnDefs: [
        {
          visible: false,
          targets: -1
        }
      ],

    });

    $('#filter_by_status').on('change', function() {
            var status = this.value;
            if(status != '')
            {
                table.columns(8).search('^' + status + '$', true, false).draw();
            }
            else
            {
                table.columns(8).search('').draw();
            }
        });
  </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener for opening the modal
        var exampleModalLive = document.getElementById('exampleModalLive');
        exampleModalLive.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var farmerId = button.getAttribute('data-id');
            var farmersIdInput = exampleModalLive.querySelector('#farmers_id');
            farmersIdInput.value = farmerId;
        });

        // Event listener for changing the status
        var statusSelect = document.getElementById('statusSelect');
        statusSelect.addEventListener('change', function() {
            var reasonBox = document.getElementById('reasonBox');
            if (this.value === 'Unverified') {
                reasonBox.style.display = 'block';
            } else {
                reasonBox.style.display = 'none';
            }
        });
    });
</script>

</body>

</html>
