@include('admin.header')
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('/dashboard')}}" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
      
  
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <!-- <input type="text" class="form-control search" placeholder=" Search"> -->
            <form action="{{URL::to('/search')}}search" method="get">
                <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img src="public/backend/images/2.png" >
                <span class="username">
				<?php
				$admin_name=Session::get('admin_name');
				if($admin_name){
					echo $admin_name;
				}
				?>
				</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/admin-logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan </span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục san pham</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục san pham</a></li>
                        
                    </ul>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
						<span>Thuong hieu</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product/')}}">Thuong hieu san pham</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thuong hieu san pham</a></li> 
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
						<span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product/')}}">Thêm san pham</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê san pham</a></li> 
                    </ul>
                </li>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
	</section>
@include('admin/footer')