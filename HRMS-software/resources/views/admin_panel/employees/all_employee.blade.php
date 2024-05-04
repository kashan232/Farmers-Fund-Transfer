@include('admin_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('admin_panel.include.navbar_include')

   
    @include('admin_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Employees</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New designation">
                                    <a href="{{ route('add-employee') }}" style="color: white;">
                                    <i class="las la-plus"></i>Add New </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session()->has('delete-message'))
                                <div class="alert alert-danger solid alert-square">
                                    <strong>Success!</strong> {{ session('delete-message') }}.
                                </div>
                            @endif

                            {{-- <div class="alert alert-dark solid alert-square"><strong>Error!</strong>
                                 You successfully read this important alert message.</div> --}}

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            {{-- <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </th> --}}
                                            <th>ID</th>
                                            <th>First Name <br> Last Name </th>
                                            <th>Email</th>
                                            <th>Joining Date</th>
                                            <th>Phone</th>
                                            <th>Department <br> Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_employee as $employee)
                                        <tr>
                                            {{-- <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                    <label class="custom-control-label" for="customCheckBox2"></label>
                                                </div>
                                            </td> --}}
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employee->first_name }} <br> {{ $employee->last_name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->joining_date }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->department }} <br> {{ $employee->designation }}</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary" >
                                                        <a href="{{ route('edit-employee',['id' => $employee->id ]) }}" style="color: white;">
                                                            <i class="la la-pencil"></i>Edit </a></button>
                                                        

                                                    <button type="button" class="btn btn-danger">
                                                        <a href="{{ route('delete-employee', ['id' => $employee->id]) }}"  style="color: white;">
                                                        <i class="la la-trash"></i>Delete </a></button>


                                                        {{-- <button type="button" class="btn btn-danger">
                                                            <a href=""
                                                                style="color: white"><i
                                                                    class="fas fa-trash-alt"></i></a>
                                                        </button> --}}
                                                </div>
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
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div> <!--**********************************
            Footer end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')
