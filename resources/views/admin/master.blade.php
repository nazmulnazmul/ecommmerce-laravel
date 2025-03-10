@include('admin.include.head')

<!-- Start wrapper-->
@include('admin.include.sideNav')
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
@include('admin.include.topNav')
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
     
    <div class="container-fluid">
        @yield('main_content')
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<!-- @include('admin.include.footer') -->
	<!--End footer-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  @include('admin.include.js')