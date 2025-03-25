<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="{{asset('')}}assets/js/plugins/apexcharts.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/jsvectormap.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/world.js"></script>
<script src="{{asset('')}}assets/js/plugins/world-merc.js"></script>
<script src="{{asset('')}}assets/js/pages/dashboard-default.js"></script>
<script src="{{asset('')}}assets/js/plugins/popper.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/simplebar.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/bootstrap.min.js"></script>
<script src="{{asset('')}}assets/js/fonts/custom-font.js"></script>
<script src="{{asset('')}}assets/js/pcoded.js"></script>
<script src="{{asset('')}}assets/js/plugins/feather.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="{{asset('select2.min.js')}}"></script>
<script>
        $(document).ready(function() {
    $('.upload-image').on('click', function() {
        $(this).siblings('.image-input').click();
    });

    $('.image-input').on('change', function(event) {
        checkFiles();

        const file = event.target.files[0];
        const $input = $(this);
        const $preview = $input.siblings('.preview');
        const $removeButton = $input.siblings('.remove-button');
        const $uploadButton = $input.siblings('.upload-image');
        const $imageArea = $input.siblings('.img-area');

        // Remove previous PDF preview (if any)
        $input.siblings('.pdf-preview-container').remove();

        if (file) {
            const fileType = file.type;

            // If file is an image
            if (fileType.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $preview.attr('src', e.target.result).show(); // Show image preview
                };
                reader.readAsDataURL(file);
            }
            // If file is a PDF
            else if (fileType === "application/pdf") {
                // Hide image preview
                $preview.hide();

                // Create a PDF preview section
                const pdfPreview = $(`
                    <div class="pdf-preview-container" style="text-align: center; margin-top: 10px;">
                        <p style="font-size: 74px; margin: 0;">📄</p>
                        <p style="margin: 0;">${file.name}</p>
                    </div>
                `);

                $preview.after(pdfPreview); // Append PDF preview
            }
            else {
                alert("Only image or PDF files are allowed!");
                return;
            }

            $removeButton.show();
            $uploadButton.hide();
            $imageArea.hide();
        }
    });

    $('.remove-button').on('click', function() {
        const $removeButton = $(this);
        const $input = $removeButton.siblings('.image-input');
        const $preview = $removeButton.siblings('.preview');
        const $uploadButton = $input.siblings('.upload-image');
        const $imageArea = $input.siblings('.img-area');

        // Clear file input
        $input.val('');

        // Hide preview
        $preview.attr('src', '').hide();

        // Remove PDF preview (if any)
        $input.siblings('.pdf-preview-container').remove();

        // Reset UI
        $removeButton.hide();
        $uploadButton.show();
        $imageArea.show();

        @if(isset($data))
            $input.siblings('.old_image').val('');
            checkFiles();
        @endif
    });
});


</script>
<script>
    $(document).ready(function() {
        // $('.js-example-basic-multiple').select2();

        $('.js-example-basic-multiple').select2({
            tags: true, // Enable typing custom values
            placeholder: "Select or type to add a new option", // Optional placeholder
            tokenSeparators: [',', ' '] // Optional, allows separation by comma or space
        });

        $('.js-example-basic-multiple2').select2({

        });

        $('.js-example-basic-single').select2({
            tags: true, // Enable typing custom values
            placeholder: "Select or type to add a new option", // Optional placeholder
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
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
