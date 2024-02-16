</div>
</div>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3   border-top text-center w-100">
    <div class="d-block text-center w-100">
        <span class="mb-3 mb-md-0 text-body-secondary">Copyright 2023 Ultra. All rights reserved</span>
    </div>
</footer>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
    <div id="liveToast " class="toast bg-success text-white success-toast position-relative fade hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong  class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>

        </div>
        <div class="toast-body">

            <span id="success-toast-message"></span>
            
        
        </div>
        <div class="toast-timeline animate"></div>
    </div>
</div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
    <div id="liveToast " class="toast hide bg-danger text-white failure-toast position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i>  Failure</strong>
            <small>Just Now</small>

        </div>
        <div class="toast-body">

            <span id="failure-toast-message"></span>

        </div>
        <div class="toast-timeline animate"></div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="{{url('assets')}}/js/bootstrap.bundle.min.js"></script>
<!-- Template Javascript -->
<script src="{{url('assets')}}/js/color-modes.js"></script>
<script src="{{url('assets')}}/js/dashboard.js"></script>

<!-- DataTable js start -->
<script src="{{url('assets')}}/js/jquery.dataTables.min.js"></script>
<script src="{{url('assets')}}/js/dataTables.buttons.min.js"></script>
<script src="{{url('assets')}}/js/jszip.min.js"></script>
<script src="{{url('assets')}}/js/pdfmake.min.js"></script>
<script src="{{url('assets')}}/js/vfs_fonts.js"></script>
<script src="{{url('assets')}}/js/buttons.html5.min.js"></script>
<script src="{{url('assets')}}/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
        $('.DataTable').DataTable({
            // dom: 'lBfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });
    });


    $(document).ready(function() {
        $(window).on("contextmenu", function(e) {
            return false;
        });
    });
    document.onkeydown = function(e) {
        e = e || window.event; //Get event
        if (e.ctrlKey) {
            var c = e.which || e.keyCode; //Get key code
            switch (c) {
                case 83: //Block Ctrl+S
                case 87: //Block Ctrl+W --Not work in Chrome
                case 73: //Block Ctrl+I
                case 67: //Block Ctrl+C
                    e.preventDefault();
                    e.stopPropagation();
                    break;
            }
        }
    };
</script>
<!-- DataTable js End -->



</body>

</html>