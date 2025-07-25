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

@php
    $filters = request()->only(['search', 'district', 'taluka', 'farmer_type', 'status', 'start_date', 'end_date']);
@endphp

<div class="table-responsive">
    {{-- Search and Date Filter --}}

    @if(!request()->has('user_id'))

    <div class="col-12 mb-3">
    <form action="{{ route('dg.farmers') }}" method="get" class="row g-2 align-items-center">

        {{-- Preserve existing filters except these --}}
        @foreach ($filters as $key => $value)
            @if (!in_array($key, ['search', 'start_date', 'end_date']))
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach

        {{-- Search Input --}}
        <div class="col-md-4 col-sm-12">
            <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                   class="form-control small-placeholder" placeholder="Search by Name, CNIC, District, etc.">
        </div>

        {{-- Start Date --}}
        <div class="col-md-2 col-sm-6">
            <input type="date" name="start_date" value="{{ $filters['start_date'] ?? '' }}"
                   class="form-control" placeholder="From">
        </div>

        {{-- End Date --}}
        <div class="col-md-2 col-sm-6">
            <input type="date" name="end_date" value="{{ $filters['end_date'] ?? '' }}"
                   class="form-control" placeholder="To">
        </div>

        {{-- Submit Button --}}
        <div class="col-md-2 col-sm-12">
            <button type="submit" class="btn btn-primary w-100">Search / Filter</button>
        </div>

        <div class="col-md-2 col-sm-12">
            <button type="button" class="btn btn-danger w-100" onclick="document.getElementById('excelExportForm').submit()">Export</button>
        </div>

    </form>

     <div class="col-md-2 col-sm-12">
        <form action="{{ route('excelExport') }}" id="excelExportForm" method="get" class="d-flex justify-content-end">
            @foreach ($filters as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>
    </div>

</div>



    {{-- Dropdown Filters --}}
    <form action="{{ route('dg.farmers') }}" method="get" id="filterForm" class="row mb-2 justify-content-between">
        {{-- Preserve Existing Filters --}}
        @foreach ($filters as $key => $value)
            @if (!in_array($key, ['district', 'taluka', 'farmer_type', 'status'])) {{-- Exclude dropdowns --}}
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach

        <div class="col-md-3">
            <select name="district" class="form-control" onchange="document.getElementById('filterForm').submit()">
                <option value="">Select District</option>
                <option value="">All</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->district }}" {{ ($filters['district'] ?? '') == $district->district ? 'selected' : '' }}>
                        {{ $district->district }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="taluka" class="form-control" onchange="document.getElementById('filterForm').submit()">
                <option value="">Select Taluka</option>
                <option value="">All</option>
                @foreach ($talukas as $taluka)
                    <option value="{{ $taluka->tehsil }}" {{ ($filters['taluka'] ?? '') == $taluka->tehsil ? 'selected' : '' }}>
                        {{ $taluka->tehsil }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="farmer_type" class="form-control" onchange="document.getElementById('filterForm').submit()">
                <option value="">Select Type</option>
                <option value="online" {{ ($filters['farmer_type'] ?? '') == 'online' ? 'selected' : '' }}>Online</option>
                <option value="fa" {{ ($filters['farmer_type'] ?? '') == 'fa' ? 'selected' : '' }}>FA's</option>
            </select>
        </div>

        <div class="col-md-3">
            <select name="status" class="form-control" onchange="document.getElementById('filterForm').submit()">
                <option value="">Select Status</option>
                <option value="verified_by_lrd" {{ ($filters['status'] ?? '') == 'verified_by_lrd' ? 'selected' : '' }}>Verified by LRD</option>
                <option value="rejected_by_lrd" {{ ($filters['status'] ?? '') == 'rejected_by_lrd' ? 'selected' : '' }}>Rejected by LRD</option>
                <option value="verified_by_ao" {{ ($filters['status'] ?? '') == 'verified_by_ao' ? 'selected' : '' }}>Verified by AO</option>
                <option value="rejected_by_ao" {{ ($filters['status'] ?? '') == 'rejected_by_ao' ? 'selected' : '' }}>Rejected by AO</option>
                <option value="unverified" {{ ($filters['status'] ?? '') == 'unverified' ? 'selected' : '' }}>Unverified</option>
            </select>
        </div>
    </form>
</div>
@endif


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

                                                        <th>Tappa</th>

                                                        <th>Status</th>
                                                        <th>Reason</th>
                                                        {{-- <th>Status</th> --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($farmers as $farmer)
                                                    <tr>
                                                        <td>{{ ($loop->iteration + ($farmers->currentPage() - 1) * $farmers->perPage()) }}</td>
                                                        {{-- <td>{!! ($farmer->user_type == 'Online') ? 'Online':'Field Assistant <br><b>'.$farmer->user->name.'<b>'   !!}</td> --}}

<td>
    {!!
        ($farmer->user_type == 'Online')
            ? 'Online'
            : 'Field Assistant <br><b>' . ($farmer->user?->name ?? 'N/A') . '</b>'
    !!}
</td>

                                                        <td>{{ $farmer->name }}</td>
                                                        <td>{{ $farmer->cnic }}</td>
                                                        <td>{{ $farmer->mobile }}</td>
                                                        <td>{{ $farmer->district }}</td>
                                                        <td>{{ $farmer->tehsil }}</td>
                                                        <td>{{ $farmer->tappa }}</td>

                                                        {{-- <td>{{ $farmer->tappa }}</td> --}}


                                                        <td>
                                                            @if ($farmer->verification_status == 'verified_by_lrd')
                                                            <span class="badge text-bg-success text-dark font-weight-bold">Verified by LRD</span>
                                                            @elseif ($farmer->verification_status == 'verified_by_ao')
                                                            <span class="badge text-bg-success text-dark font-weight-bold">Verified by AO</span>
                                                            @elseif($farmer->verification_status == 'rejected_by_lrd')
                                                            <span class="badge text-bg-danger text-dark font-weight-bold">Rejected by LRD</span>
                                                            @elseif($farmer->verification_status == 'rejected_by_ao')
                                                            <span class="badge text-bg-danger text-dark font-weight-bold">Rejected by AO</span>
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
                                                    @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center text-danger"><strong>No farmers found.</strong></td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                        </div>
                                     <nav class="d-flex justify-content-between align-items-center mb-3 flex-wrap mt-2">
                                        {{-- Pagination --}}
                                        <div>
                                            {{ $farmers->links() }}
                                        </div>

                                        {{-- Totals --}}
                                        <div class="text-end">
                                            <h6 >Total Farmers: {{ $totalFarmers }}</h6>
                                            <h6>Online Farmers: {{ $onlineFarmers }}</h6>
                                            <h6>Self Registered (Field Assistant): {{ $selfFarmers }}</h6>
                                        </div>
                                    </nav>


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
