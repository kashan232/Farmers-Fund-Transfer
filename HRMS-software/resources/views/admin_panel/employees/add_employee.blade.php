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
                                <h4 class="card-title">Add Employee</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('store-employee') }}" method="post"> 
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Joining Date</label>
                                                <input type="date" name="joining_date" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Phone</label>
                                                <input type="number" name="phone" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Department</label>
                                                <select name="department" class="form-control">
                                                    <option value="Web Development">Web Development</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Designation</label>
                                                <select name="designation" class="form-control">
                                                    <option value="Web Designer">Web Designer</option>
                                                    <option value="Web Developer">Web Developer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
