@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="dashboard">
                    <div class="all-card p-0" >
                        <div class="row">
                            <div class="mb-12 col-md-12">
                                <label class="form-label">Contact Numbers</label>
                                <select name="physical_asset_item[]" id="physical_asset_item"  class="form-control--input js-example-basic-multiple" style="width: 100%" multiple="multiple">
                                    <option value="">03331234567</option>
                                    <option value="">03337654321</option>
                                </select>
                            </div>
                            <div class="mb-12 col-md-12 mt-3">
                                <label class="form-label">Message:</label>

                            <textarea class="form-control mt-2" rows="12">

                            </textarea>
                            </div>
                            <div class="col-12" style="display:flex;justify-content:left">
                                <button class="btn btn-primary mt-2" style="padding-left: 30px;padding-right: 30px;">Send</button>
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
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')


</body>
</html>
