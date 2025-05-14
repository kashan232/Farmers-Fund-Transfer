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
            <div class="col-12">
                <div class="dashboard">
                    <div class="all-card">
                        <div class="row">
                            <!-- Total Farmers Card -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h3 class="card-text text-amount">{{$fa_total_Registered_Farmers}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                             <!-- Verified Farmers Card -->
                             <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">In-Process Farmers</p>
                                                <h3 class="card-text text-amount">{{$Processfarmeragiruser}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Verified Farmers Card -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Verified Farmers</p>
                                                <h3 class="card-text text-amount">{{$Verifiedfarmeragiruser}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Rejected Farmers Card -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Unverified Farmers</p>
                                                <h3 class="card-text text-amount">{{$Unverifiedfarmeragiruser}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Field Officer Farmers</p>
                                                <h3 class="card-text text-amount">{{$userFarmers}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Online Farmers</p>
                                                <h3 class="card-text text-amount">{{$onlineFarmers}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <canvas id="awardsChart" width="1000" height="600"></canvas>
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
                                                            <th>District</th>
                                                            <th>Field Officer</th>
                                                            <th>Agri Officer</th>
                                                            <th>DD Officer</th>
                                                            <th>Land Revenue Officer</th>
                                                            <th>Additional Director</th>
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
                                        <h3>District Wise Farmers</h3>
                                        <div class="row tables">
                                            <div class="table-responsive">
                                                <table class="table table-bordered example" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th>District</th>
                                                            <th>Online Farmers</th>
                                                            <th>Field Officer Farmers</th>
                                                            <th>Total Farmers</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($farmersByDistrict as $data)
                                                            <tr>
                                                                <td>{{ $data->district }}</td>
                                                                <td>{{ $data->online_farmers }}</td>
                                                                <td>{{ $data->field_officer_farmers }}</td>
                                                                <td>{{ ($data->field_officer_farmers+$data->online_farmers) }}</td>
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
    const ctx = document.getElementById('awardsChart').getContext('2d');

    const data = {
      labels: [
        "Coen Brothers", "Lee Unkrich", "Steven Spielberg",
        "George Lucas", "David Fincher", "Curtis Hanson",
        "Ang Lee", "Terrence Malick", "Behn Zeitlin", "Roberto Benigni"
      ],
      datasets: [
        {
          label: 'Action',
          data: [40, 10, 15, 20, 5, 10, 0, 5, 0, 0],
          backgroundColor: '#1f77b4'
        },
        {
          label: 'Drama',
          data: [70, 40, 30, 15, 40, 50, 30, 60, 40, 35],
          backgroundColor: '#ff7f0e'
        },
        {
          label: 'Comedy',
          data: [90, 0, 20, 25, 0, 10, 5, 0, 0, 20],
          backgroundColor: '#2ca02c'
        },
        {
          label: 'Thriller',
          data: [100, 0, 0, 0, 40, 20, 0, 0, 0, 0],
          backgroundColor: '#e377c2'
        },
        {
          label: 'Animation',
          data: [0, 80, 0, 0, 0, 0, 0, 0, 0, 0],
          backgroundColor: '#ffbb78'
        },
        {
          label: 'Sci-Fi',
          data: [0, 0, 50, 70, 0, 0, 10, 0, 0, 0],
          backgroundColor: '#17becf'
        },
        // Add more genres here...
      ]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'right' },
          title: {
            display: true,
            text: 'Directors with Greatest Number of Award Wins'
          }
        },
        scales: {
          x: {
            stacked: true,
            title: {
              display: true,
              text: 'Directors'
            }
          },
          y: {
            stacked: true,
            title: {
              display: true,
              text: 'Total Wins'
            }
          }
        }
      }
    };

    new Chart(ctx, config);
  </script>

</body>

</html>
