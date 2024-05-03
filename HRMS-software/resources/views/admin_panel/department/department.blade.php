@include('admin.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('admin.include.navbar_include')

   
    @include('admin.include.sidebar_include')
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
                            <h4 class="card-title">Department</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New Department">
                                    <i class="las la-plus"></i>Add New 
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                    <label class="custom-control-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td>1</td>
                                            <td>Web Development</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-modal_title="Edit Department" data-has_status="1"
                                                        data-target="#editbrand">
                                                        <i class="la la-pencil"></i>Edit </button>
    
                                                    <button type="button"
                                                    class="btn btn-danger" data-question="Are you sure to delete this Department?">
                                                        <i class="la la-trash"></i>Delete </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox3" required="">
                                                    <label class="custom-control-label" for="customCheckBox3"></label>
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>Application Development</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-modal_title="Edit Department" data-has_status="1"
                                                        data-target="#editbrand">
                                                        <i class="la la-pencil"></i>Edit </button>
    
                                                    <button type="button"
                                                    class="btn btn-danger" data-question="Are you sure to delete this Department?">
                                                        <i class="la la-trash"></i>Delete </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox4" required="">
                                                    <label class="custom-control-label" for="customCheckBox4"></label>
                                                </div>
                                            </td>
                                            <td>3</td>
                                            <td>Support Management</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-modal_title="Edit Department" data-has_status="1"
                                                        data-target="#editbrand">
                                                        <i class="la la-pencil"></i>Edit </button>
    
                                                    <button type="button"
                                                    class="btn btn-danger" data-question="Are you sure to delete this Department?">
                                                        <i class="la la-trash"></i>Delete </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
                                                    <label class="custom-control-label" for="customCheckBox5"></label>
                                                </div>
                                            </td>
                                            <td>4</td>
                                            <td>Marketing</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-modal_title="Edit Department" data-has_status="1"
                                                        data-target="#editbrand">
                                                        <i class="la la-pencil"></i>Edit </button>
    
                                                    <button type="button"
                                                    class="btn btn-danger" data-question="Are you sure to delete this Department?">
                                                        <i class="la la-trash"></i>Delete </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox6" required="">
                                                    <label class="custom-control-label" for="customCheckBox6"></label>
                                                </div>
                                            </td>
                                            <td>5</td>
                                            <td>IT Management</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-modal_title="Edit Department" data-has_status="1"
                                                        data-target="#editbrand">
                                                        <i class="la la-pencil"></i>Edit </button>
    
                                                    <button type="button"
                                                    class="btn btn-danger" data-question="Are you sure to delete this Department?">
                                                        <i class="la la-trash"></i>Delete </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox8" required="">
                                                    <label class="custom-control-label" for="customCheckBox8"></label>
                                                </div>
                                            </td>
                                            <td>6</td>
                                            <td>Accounts Management</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-modal_title="Edit Department" data-has_status="1"
                                                        data-target="#editbrand">
                                                        <i class="la la-pencil"></i>Edit </button>
    
                                                    <button type="button"
                                                    class="btn btn-danger" data-question="Are you sure to delete this Department?">
                                                        <i class="la la-trash"></i>Delete </button>
                                                </div>
                                            </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

             <!--Create Modal -->
             <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="type"></span> <span>Add Department</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" name="brand" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
    {{-- <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div>
     <!--********************************** --}}
            {{-- Footer end
        ***********************************--> --}}


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin.include.footer_include')
<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function(){
        $('#addNewButton').click(function(){
            $('#cuModal').modal('show');
        });
    });
</script>
