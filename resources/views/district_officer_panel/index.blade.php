@include('district_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('district_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('district_officer_panel.include.navbar_include')
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="districtFarmersChart" width="1000" height="400px"></canvas>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>District Wise Officers</h3>
                        <div class="row tables">
                            <div class="table-responsive">

                                @php
                                $totalLRD = 0;
                                $totalDD = 0;
                                $totalFO = 0;
                                $totalAO = 0;

                                foreach ($districtStats as $row) {
                                    $totalLRD += $row['Land_Revenue_Officer'];
                                    $totalDD += $row['DD_Officer'];
                                    $totalFO += $row['Field_Officer'];
                                    $totalAO += $row['Agri_Officer'];
                                }
                            @endphp

                            <table class="col-12 table table-bordered mt-4" >
                                <thead>
                                    <tr>
                                        <th>Officers</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Land Revenue Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'Land_Revenue_Officer']) }}">
                                                {{ $totalLRD }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deputy Director Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'DD_Officer']) }}">
                                                {{ $totalDD }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Field Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'Field_Officer']) }}">
                                                {{ $totalAO }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agricuture Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'Agri_Officer']) }}">
                                                {{ $totalLRD }}
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Farmer Registration Charts -->
            {{-- <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Farmer Registration Source Overview (Field Officer & Online Farmers)</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">Field Officer</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="fieldOfficerRegistrationChart"></div>
                            </div>
                        </div>
                        <div class="col-md-6 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">Online Farmer Registration</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="onlinefarmers"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tehsil-Wise Farmer Statistics -->
            <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p> Tehsil-wise Farmers Statistics</p>
                    </div>
                    <div id="districtOfficerTehsilWiseRegistrationChart"></div>
                </div>
            </div>

            <!-- Field Officer Count Chart -->
            <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Field Officer</p>
                    </div>
                    <div id="fieldOfficerChart"></div>
                </div>
            </div> --}}
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<footer class="pc-footer">
    @include('district_officer_panel.include.footer_copyright_include')
</footer>

@include('district_officer_panel.include.footer_include')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        $('.example').DataTable( {
            dom: 'frtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>

<script>
    const ctx = document.getElementById('districtFarmersChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [
                {
                    label: 'Verified Farmers',
                    data: @json($verified),
                    backgroundColor: 'rgba(40, 167, 69, 0.7)', // green
                },
                {
                    label: 'Unverified Farmers',
                    data: @json($unverified),
                    backgroundColor: 'rgba(220, 53, 69, 0.7)', // red
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'District Wise Farmers (Verified vs Unverified)'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                },
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Farmers'
                    }
                }
            }
        }
    });
</script>


</body>

</html>
