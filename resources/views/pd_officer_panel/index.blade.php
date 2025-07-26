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


  #districtFarmersChart {
    width: 100%;
    height: 400px;
  }

</style>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-12">
                <div class="dashboard">
                    <div class="all-card">
                        <div class="row">
                            <!-- Total Farmers Card -->



                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{route('dg.farmers')}}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Total Number of Farmers</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$fa_total_Registered_Farmers}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape border border-warning text-warning">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>




                            <div class="col-lg-4 col-md-6 col-sm-6">
                                  <a href="{{ route('dg.farmers', ['search' => null, 'status' => 'fa_farmers']) }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">
                                                    {{-- Through Mobile Application Farmers Registration --}}
                                                    Farmers Registered By FA
                                                </p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$userFarmers}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6">
                                  <a href="{{ route('dg.farmers', ['search' => null, 'status' => 'online_farmers']) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Online Farmers Registration</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$onlineFarmers}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>










                            <!-- Rejected Farmers Card -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                  <a href="{{ route('dg.farmers', ['search' => null, 'status' => null]) }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Pending Farmers by FA</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$Unverifiedfarmeragiruser}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape " style="color: blue !important; border: 1px solid blue;">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6">
                                  <a href="{{ route('dg.farmers', ['search' => null, 'status' => 'forwarded_to_ao']) }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Forwarded to AO</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$forwarded_to_ao}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape " style="color: #e0b44f !important; border: 1px solid #e0b44f">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>



                             <!-- Verified Farmers Card -->
                             <div class="col-lg-4 col-md-6 col-sm-6">
                                  <a href="{{ route('dg.farmers', ['search' => null, 'status' => 'in_process']) }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Rejected BY FA/AO</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$Processfarmeragiruser}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape border border-primary text-primary">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>




                             <div class="col-lg-4 col-md-6 col-sm-6">
                                  <a href="{{ route('dg.farmers', ['search' => null, 'status' => 'forwarded_to_lrd']) }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Forwarded to LRD</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$forwarded_to_lrd}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape "  style="color: #4fe0d9 !important; border: 1px solid #4fe0d9">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>






                             <!-- Verified Farmers Card -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('dg.farmers', ['search' => null, 'status' => 'verified_by_lrd']) }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Verified BY LRD</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$Verifiedfarmeragiruser}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>


                             <!-- Verified Farmers Card -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                  <a href="{{ route('dg.farmers', ['search' => null, 'status' => 'rejected_by_lrd']) }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="color: #000000 !important;">Rejected BY LRD</p>
                                                <h3 class="card-text text-amount" style="color: #000000 !important;">{{$rejected_by_lrd}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape border border-danger text-danger" >
                                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="farmersTotals" style="font-weight: bold; text-align: center;">
                                            <!-- Totals will be injected here -->
                                        </div>
                                        <canvas id="districtFarmersChart" width="1000" height="400px"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>District Wise Field Officers</h3>
                                        <div class="row tables">
                                            <div class="table-responsive">

                                                <table class="table table-bordered example" id="">
                                                    {{-- <thead>
                                                        <th>Districts</th>
                                                        <th>Total Field Officers</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($usersByDistrict as $data)
                                                            <tr>
                                                                <td>{{ $data->district }}</td>
                                                                <td><a href="{{ route('fa_list_by_dg',$data->district) }}">{{ $data->total_users }}</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody> --}}
                                                    <thead>
                                                        <tr>
                                                            <th>Districts</th>
                                                            <th>Field Assitants</th>
                                                            <th>Agri Officers</th>
                                                            <th>DD Officers</th>
                                                            <th>Land Revenue Officers</th>
                                                            <th>Additional Directors</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($districtStats as $row)
                                                            <tr>
                                                                <td>{{ $row['district'] }}</td>
                                                                <td>
                                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'Field_Officer']) }}">
                                                                        {{ $row['Field_Officer'] }}
                                                                    </a>
                                                                </td>

                                                                {{-- <td><a href="{{ route('fa_list_by_dg',$row['district']) }}"> {{ $row['Field_Officer'] }}</a></td> --}}
                                                                <td>
                                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'Agri_Officer']) }}">
                                                                        {{ $row['Agri_Officer'] }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'DD_Officer']) }}">
                                                                        {{ $row['DD_Officer'] }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'Land_Revenue_Officer']) }}">
                                                                        {{ $row['Land_Revenue_Officer'] }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'District_Officer']) }}">
                                                                        {{ $row['District_Officer'] }}
                                                                    </a>
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


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>District-Wise Farmers' Statistics</h3>
                                        <div class="row tables">
                                            <div class="table-responsive">
                                                <table class="table table-bordered example" id="example">
                                                    <thead>
                                                        {{-- <tr>
                                                            <th>District</th>
                                                            <th>Online Farmers</th>
                                                            <th>Field Officer Farmers</th>
                                                            <th>Total Farmers</th>
                                                        </tr> --}}
                                                        <tr>
                                                            <th>District</th>
                                                            <th>Forms Filled by F.A</th>
                                                            <th>Forms Submitted to LRD</th>
                                                            <th>Forms Verified By LRD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach ($farmersByDistrict as $data)
                                                            <tr>
                                                                <td>{{ $data->district }}</td>
                                                                <td>{{ $data->online_farmers }}</td>
                                                                <td>{{ $data->field_officer_farmers }}</td>
                                                                <td>{{ ($data->field_officer_farmers+$data->online_farmers) }}</td>
                                                            </tr>
                                                        @endforeach --}}
                                                       @foreach ($farmersByDistrict as $data)
                                                            <tr>
                                                                <td>{{ $data->district }}</td>
                                                                <td>
                                                                    {{ $data->total_farmers }}
                                                                    | Online = {{ $data->online_farmers }}
                                                                    & FA = {{ $data->fa_farmers }}
                                                                </td>
                                                                <td>
                                                                    {{ ($data->verified_by_ao + $data->verified_by_lrd) }}
                                                                    | Online = {{ ($data->verified_by_ao_online + $data->verified_by_lrd_online) }}
                                                                    & FA = {{ ($data->verified_by_ao_fa + $data->verified_by_lrd_fa) }}
                                                                </td>
                                                                <td>
                                                                    {{ $data->verified_by_lrd }}
                                                                    | Online = {{ $data->verified_by_lrd_online }}
                                                                    & FA = {{ $data->verified_by_lrd_fa }}
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


        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<footer class="pc-footer">
    @include('pd_officer_panel.include.footer_copyright_include')
</footer>

@include('pd_officer_panel.include.footer_include')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        $('.example').DataTable( {
            dom: 'Bfrtip',
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



    // Data from Laravel
    const verified = @json($verified);
    const unverified = @json($unverified);
    // const labels = @json($labels);

    // Calculate totals
    const totalVerified = verified.reduce((a, b) => a + b, 0);
    const totalUnverified = unverified.reduce((a, b) => a + b, 0);
    const totalOverall = totalVerified + totalUnverified;

     // Show totals in the UI
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('farmersTotals').innerHTML = `
            ✅ Verified: ${totalVerified} | ❌ Unverified: ${totalUnverified}
        `;
    });
    // | 🧮 Total: ${totalOverall}
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
                // title: {
                //     display: true,
                //     text: 'District Wise Farmers (Verified vs Unverified)'
                // },
                  title: {
                    display: false // Already shown in heading
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
