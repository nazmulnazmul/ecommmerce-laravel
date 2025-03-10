<div id="wrapper">
 
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="{{ route('admin.dashboard') }}">
       <img src="{{ asset('backend') }}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Rukada Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="{{ route('admin.dashboard') }}" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span> 
          <!-- <i class="fa fa-angle-left pull-right"></i> -->
        </a>
      </li>
  
      <!-- for Category Menu  -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa-solid fa-house"></i><span>Slider</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('admin.slider.add') }}"><i class="fa-solid fa-plus"></i>Add Slider</a></li>
          <li><a href="{{ route('admin.slider.list') }}"><i class="fa-solid fa-list"></i></i>Manage Slider</a></li>
        </ul>
      </li>

      <!-- for Sub Category menu  -->
      <!-- for Category Menu  -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa-solid fa-house"></i><span>Category</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('admin.category.add') }}"><i class="fa-solid fa-plus"></i>Add Category</a></li>
          <li><a href="{{ route('admin.category.list') }}"><i class="fa-solid fa-list"></i></i>Manage Category</a></li>
        </ul>
      </li>

      <!-- for Sub Category menu  -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa-solid fa-house"></i><span>Sub Category</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('admin.subcategory.add') }}"><i class="fa-solid fa-plus"></i>Add Sub Category</a></li>
          <li><a href="{{ route('admin.subcategory.list') }}"><i class="fa-solid fa-list"></i></i>Manage Sub Category</a></li>
        </ul>
      </li>

      <!-- for Brand menu  -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa-solid fa-house"></i><span>Brand</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('admin.brand.add') }}"><i class="fa-solid fa-plus"></i>Add Brand</a></li>
          <li><a href="{{ route('admin.brand.list') }}"><i class="fa-solid fa-list"></i></i>Manage Brand</a></li>
        </ul>
      </li>

      <!-- for Product menu  -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa-solid fa-house"></i><span>Product</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('admin.product.add') }}"><i class="fa-solid fa-plus"></i>Add Product</a></li>
          <li><a href="{{ route('admin.product.list') }}"><i class="fa-solid fa-list"></i></i>Manage Product</a></li>
        </ul>
      </li>


      <!-- for Order menu  -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa-solid fa-house"></i><span>Order</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          {{-- <li><a href="{{ route('admin.product.add') }}"><i class="fa-solid fa-plus"></i>Add Product</a></li> --}}
          <li><a href="{{ route('admin.order.list') }}"><i class="fa-solid fa-list"></i></i>Manage Order</a></li>
        </ul>
      </li>
    
     
    </ul>
   
</div>