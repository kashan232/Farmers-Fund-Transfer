@include('pd_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('pd_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('pd_officer_panel.include.navbar_include')
<!-- [ Header ] end -->



<style>
   .tables nav{
        display: flex;
        justify-content: right;

    }
</style>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive">
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12  tables">
                                        <div class="table-responsive ">
                                            <style>
                                                .small-placeholder::placeholder {
                                                    font-size: 11px;
                                                }
                                            </style>

                                            <div class="row mb-2 " style="justify-content: space-between;">
                                                <div class="col-md-5">
                                                    <form action="{{ route('dg.farmers') }}" method="get" class="d-flex">
                                                        <input type="text" name="search" id="" class=" small-placeholder form-control me-2" placeholder="Search by Name, Father Name, Surname, Mobile, CNIC, District, Tehsil, Tappa, UC">
                                                        <input type="submit" name="" id="" value="Search" class="btn btn-primary">
                                                    </form>
                                                </div>

                                                <div class="col-md-3">
                                                    <form action="{{ route('dg.farmers') }}" id="status_form" method="get" class="d-flex">
                                                        <select name="status" id="" class="form-control" onchange="document.getElementById('status_form').submit()">
                                                            <option value="">Select Status</option>
                                                            <option value="verified_by_lrd">Verified</option>
                                                            <option value="0">Un-Verified</option>
                                                        </select>
                                                    </form>
                                                </div>

                                            </div>


                                            <table id="example1"  style="width:100%" class="table table-bordered table-bordered nowrap dataTable" aria-describedby="dom-jqry_info">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Type</th>
                                                        <th>Name</th>
                                                        <th>CNIC</th>
                                                        <th>Mobile</th>
                                                        <th>District</th>
                                                        <th>Taluka</th>

                                                        {{-- <th>Tappa</th> --}}

                                                        <th>Status</th>
                                                        <th>Reason</th>
                                                        {{-- <th>Status</th> --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($farmers as $farmer)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $farmer->user_type }}</td>
                                                        <td>{{ $farmer->name }}</td>
                                                        <td>{{ $farmer->cnic }}</td>
                                                        <td>{{ $farmer->mobile }}</td>
                                                        <td>{{ $farmer->district }}</td>
                                                        <td>{{ $farmer->tehsil }}</td>

                                                        {{-- <td>{{ $farmer->tappa }}</td> --}}


                                                        <td>
                                                            @if ($farmer->verification_status == 'verified_by_lrd')
                                                            <span class="badge text-bg-success text-dark font-weight-bold">Verified</span>
                                                            @elseif($farmer->verification_status == 'rejected_by_ao' || $farmer->verification_status == 'rejected_by_dd' || $farmer->verification_status == 'rejected_by_lrd')
                                                            <span class="badge text-bg-danger text-dark font-weight-bold">Rejected</span>
                                                            @else
                                                            <span class="badge text-bg-primary text-white font-weight-bold">Unverified</span>
                                                            @endif
                                                        </td>
                                                        @if ($farmer->declined_reason != null || $farmer->declined_reason != '')
                                                        <td>
                                                            {{ $farmer->declined_reason }}
                                                        </td>
                                                        @else
                                                        <td></td>
                                                        @endif
                                                        <td>
                                                            <div class="d-flex">
                                                                {{-- <a href="{{ route('farmer-view-by-field-officer', ['id' => $farmer->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>&nbsp; --}}



                                                                <a href="{{route('view-farmers-by-field-officer',$farmer->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                        {{ $farmers->links() }}
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
    @include('pd_officer_panel.include.footer_copyright_include')
</footer>

@include('pd_officer_panel.include.footer_include')

<!-- Chart Scripts -->
<script>
    // Donut Charts Data and Configurations
    const ownFarmerData = [100, 80, 20];
    const landRevenueData = [120, 90, 30];
    const fieldOfficerData = [90, 70, 20];

    function renderDonutChart(elementId, data, total) {
        const options = {
            series: data,
            chart: {
                type: 'donut',
                height: 400
            },
            labels: ['Registered Farmers', 'Verified Farmers', 'Rejected Farmers'],
            colors: ['#dfd930', '#d9534f', '#5cc183'],
            dataLabels: {
                enabled: true,
                formatter: (val) => val.toFixed(1) + '%'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: () => total
                            }
                        }
                    }
                }
            },
            legend: {
                position: 'bottom'
            }
        };
        new ApexCharts(document.querySelector(elementId), options).render();
    }

    renderDonutChart("#onlinefarmers", ownFarmerData, 100);
    renderDonutChart("#landRevenueChart", landRevenueData, 120);
    renderDonutChart("#fieldOfficerRegistrationChart", fieldOfficerData, 90);

    const districtOfficerOptions = {
        series: [{
            name: 'Registered Farmers',
            data: [50, 70, 40]
        }, {
            name: 'Verified Farmers',
            data: [30, 50, 20]
        }, {
            name: 'Rejected Farmers',
            data: [10, 5, 10]
        }],
        chart: {
            type: 'bar',
            height: 500
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '60%',
                endingShape: 'rounded'
            }
        },
        colors: ['#dfd930', '#d9534f', '#5cc183'],
        xaxis: {
            categories: ['Hyderabad City', 'Qasimabad', 'Latifabad'], // Replace with actual Tehsil names
        },
        yaxis: {
            title: {
                text: 'Tehsils'
            }
        },
        legend: {
            position: 'top'
        },
        tooltip: {
            y: {
                formatter: (val) => `${val} farmers`
            }
        }
    };

    new ApexCharts(document.querySelector("#districtOfficerTehsilWiseRegistrationChart"), districtOfficerOptions).render();
    // Field Officer Count Chart Data and Configurations
    const fieldOfficerOptions = {
        series: [{
            name: 'Field Officers',
            data: [10, 7, 5]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 8,
                barHeight: '60%'
            }
        },
        colors: ['#3e7350'],
        dataLabels: {
            enabled: true,
            formatter: (val) => `${val} officers`
        },
        xaxis: {
            categories: ['Hyderabad City', 'Qasimabad', 'Latifabad'],
            title: {
                text: 'Field Officer Count'
            }
        },
        yaxis: {
            title: {
                text: 'Tehsil'
            }
        }
    };
    new ApexCharts(document.querySelector("#fieldOfficerChart"), fieldOfficerOptions).render();
</script>

</body>

</html>
