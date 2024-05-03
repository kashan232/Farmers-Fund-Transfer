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
                                    <form>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Employee ID</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Joining Date</label>
                                                <input type="date" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Phone</label>
                                                <input type="number" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Company</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Department</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Web Development</option>
                                                    <option value="">Support Management</option>
                                                    <option value="">Application Development</option>
                                                    <option value="">Accounts Management</option>
                                                    <option value="">IT Management</option>
                                                    <option value="">Marketing</option>
                                                    <option value="">Web Development</option>
                                                    <option value="">Web Development</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Designation</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Web Designer</option>
                                                    <option value="">Web Developer</option>
                                                    <option value="">Android Developer</option>
                                                    <option value="">IOS Developer</option>
                                                    <option value="">UI Designer</option>
                                                    <option value="">UX Designer</option>
                                                    <option value="">IT Technician</option>
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
