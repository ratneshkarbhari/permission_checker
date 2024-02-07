</div>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3   border-top text-center w-100">
        <div class="d-block text-center w-100">
            <span class="mb-3 mb-md-0 text-body-secondary">Copyright 2023 Ultra. All rights reserved</span>
        </div>
    </footer>



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
    $('.DataTable').DataTable( {
        // dom: 'lBfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );
} );


$(document).ready(function() {
    $(window).on("contextmenu",function(e){
       return false;
    }); 
}); 
 document.onkeydown = function (e) {
    e = e || window.event;//Get event
    if (e.ctrlKey) {
        var c = e.which || e.keyCode;//Get key code
        switch (c) {
            case 83://Block Ctrl+S
            case 87://Block Ctrl+W --Not work in Chrome
            case 73://Block Ctrl+I
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