<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from powerbi-admin-template.multipurposethemes.com/bs5/main-horizontal/tables_data.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2024 06:55:05 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://powerbi-admin-template.multipurposethemes.com/bs5/images/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title>Power BI Admin - Dashboard  Data Tables</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="admin/main-horizontal/css/vendors_css.css">
	  
	<link rel="stylesheet" href="admin/main-horizontal/css/horizontal-menu.css"> 
	<link rel="stylesheet" href="admin/main-horizontal/css/style.css">
	<link rel="stylesheet" href="admin/main-horizontal/css/skin_color.css">

</head>

<body class="layout-top-nav light-skin theme-primary fixed">
	
<div class="wrapper">
	<!-- <div id="loader"></div> -->

  <header class="main-header">
	  <div class="container">
		  <div class="inside-header">
			<div class="d-flex align-items-center logo-box justify-content-start">
				<!-- Logo -->
				<a href="index.html" class="logo">
				  <!-- logo-->
				  <div class="logo-lg">
					  <span class="light-logo"><img src="admin/images/logo-light-text.png" alt="logo"></span>
					  <span class="dark-logo"><img src="admin/images/logo-light-text.png" alt="logo"></span>
				  </div>
				</a>	
			</div>  
			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top">
			  <!-- Sidebar toggle button-->
			  <div class="app-menu">
				<ul class="header-megamenu nav">
					<li class="btn-group nav-item d-none d-md-inline-block">
						<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
							<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
						</a>
					</li>
				</ul> 
			  </div>

			  <div class="navbar-custom-menu r-side">
				<ul class="nav navbar-nav">		  
					<li class="btn-group d-lg-inline-flex d-none">
						<div class="app-menu">
							<div class="search-bx mx-5">
								<form>
									<div class="input-group">
									  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
									  <div class="input-group-append">
										<button class="btn" type="submit" id="button-addon3"><i data-feather="search"></i></button>
									  </div>
									</div>
								</form>
							</div>
						</div>
					</li>
				  <!-- Notifications -->
				  <li class="dropdown notifications-menu">
					<a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="Notifications">
					  <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
					</a>
					<ul class="dropdown-menu animated bounceIn">

					  <li class="header">
						<div class="p-20">
							<div class="flexbox">
								<div>
									<h4 class="mb-0 mt-0">Notifications</h4>
								</div>
								<div>
									<a href="#" class="text-danger">Clear All</a>
								</div>
							</div>
						</div>
					  </li>

					  <li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu sm-scrol">
						  <li>
							<a href="#">
							  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
							</a>
						  </li>
						</ul>
					  </li>
					  <li class="footer">
						  <a href="#">View all</a>
					  </li>
					</ul>
				  </li>	

				  <!-- User Account-->
				  <li class="dropdown user user-menu">
					<a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
						<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
					</a>
					<ul class="dropdown-menu animated flipInX">
					  <li class="user-body">
						 <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
						 <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My Wallet</a>
						 <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a>
						 <div class="dropdown-divider"></div>
						 <a class="dropdown-item" href="#"><i class="ti-lock text-muted me-2"></i> Logout</a>
					  </li>
					</ul>
				  </li>	

				  <!-- Control Sidebar Toggle Button -->
				  <li>
					  <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
						<i class="icon-Settings"><span class="path1"></span><span class="path2"></span></i>
					  </a>
				  </li>

				</ul>
			  </div>
			</nav>
		  </div>
	  </div>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <nav class="main-nav" role="navigation">
	  <div class="container">
		  <!-- Mobile menu toggle button (hamburger/x icon) -->
		  <input id="main-menu-state" type="checkbox" />
		  <label class="main-menu-btn" for="main-menu-state">
			<span class="main-menu-btn-icon"></span> Toggle main menu visibility
		  </label>

		  <!-- Sample menu definition -->
		  <ul id="main-menu" class="sm sm-blue">
			<li><a href="/dashboard"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>Dashboard</a>
			</li>
			<li><a href="/category"><i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>Category</a>
			</li>
			<li><a href="/products"><i class="icon-Write"><span class="path1"></span><span class="path2"></span></i>Products</a>
			</li>
			<li><a><i class="icon-Brush"><span class="path1"></span><span class="path2"></span></i>Order</a>
				<ul> 
					<li><a href="/order"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending</a></li>
					<li><a href="component_date_paginator.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Accepted</a></li>
					<li><a href="component_media_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Completed</a></li>
				</ul>
			</li>
			<li><a href="#"><i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>Borrowed</a>
				<ul> 
					<li><a href="/pending_borrowed"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending</a></li>
					<li><a href="charts_flot.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flot</a></li>
					<li><a href="charts_inline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Inline charts</a></li>
					<li><a href="charts_morris.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Morris</a></li>
					<li><a href="charts_peity.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Peity</a></li>
					<li><a href="charts_chartist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chartist</a></li>
					
				</ul>
			</li>
			<li><a href="#"><i class="icon-Chat-locked"><span class="path1"></span><span class="path2"></span></i>Login &amp; Error</a>
			  <ul>
				<li><a href="#"><i class="icon-Chat-locked"><span class="path1"></span><span class="path2"></span></i>Authentication</a>
				  <ul>
					<li><a href="auth_login.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Login</a></li>
					<li><a href="auth_register.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Register</a></li>
					<li><a href="auth_lockscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lockscreen</a></li>
					<li><a href="auth_user_pass.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Recover password</a></li>	
				  </ul>			  
				</li>
				<li><a href="#"><i class="icon-Chat-check"><span class="path1"></span><span class="path2"></span></i>Miscellaneous</a>
				  <ul>
					<li><a href="error_404.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 404</a></li>
					<li><a href="error_500.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 500</a></li>
					<li><a href="error_maintenance.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maintenance</a></li>
				  </ul>			  
				</li>
			  </ul>		  
			</li> 
			<li><a href="#"><i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>Widgets</a>
				<ul> 
					<li><a href="widgets_blog.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Blog</a></li>
					<li><a href="widgets_chart.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chart</a></li>
					<li><a href="widgets_list.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a></li>
					<li><a href="widgets_social.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Social</a></li>
					<li><a href="widgets_statistic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Statistic</a></li>
					<li><a href="widgets_weather.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Weather</a></li>
					<li><a href="widgets.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Widgets</a></li>
				</ul>
			</li> 
			<li><a href="#"><i class="icon-Book-open"><span class="path1"></span><span class="path2"></span></i>Modals</a>
				<ul> 
					<li><a href="component_modals.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Modals</a></li>
					<li><a href="component_sweatalert.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sweet Alert</a></li>
					<li><a href="component_notification.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Toastr</a></li>
				</ul>
			</li>		
		  </ul>
	  </div>
  </nav>