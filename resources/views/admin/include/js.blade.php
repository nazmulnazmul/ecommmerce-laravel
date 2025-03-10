<script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
  <script src="{{ asset('backend') }}/assets/js/popper.min.js"></script>
  <script src="{{ asset('backend') }}/assets/js/bootstrap.min.js"></script>
  <script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
	
  <!-- simplebar js -->
  <script src="{{ asset('backend') }}/assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="{{ asset('backend') }}/assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="{{ asset('backend') }}/assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('backend') }}/assets/js/app-script.js"></script>
  <!-- Chart js -->
  <script src="{{ asset('backend') }}/assets/plugins/Chart.js/Chart.min.js"></script>
  <!--Peity Chart -->
  <script src="{{ asset('backend') }}/assets/plugins/peity/jquery.peity.min.js"></script>
  <script src="{{ asset('backend') }}/assets/plugins/peity/jquery.dataTables.min.js"></script>
  <script src="{{ asset('backend') }}/assets/plugins/peity/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('backend') }}/assets/plugins/peity/dataTables.buttons.min.js"></script>
  <script src="{{ asset('backend') }}/assets/plugins/dropzone/js/dropzone.js"></script>
  <!-- Index js -->
  <script src="{{ asset('backend') }}/assets/js/index.js"></script>
  <!-- toastr cnd link js  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  @stack('js')

  <script>
    // toastr notefication 
    // toastr.options = {
    //   "closeButton": true,
    //   "progressBar": true,
    // }

  toastr.options = {
  "closeButton": true,
  "progressBar": true,
}

    @if (Session::has('message'))
        toastr.success("{{ session::get('message') }}");
    @endif

     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();

       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );


    </script>
  
</body>
</html>
