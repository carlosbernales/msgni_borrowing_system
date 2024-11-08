
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from powerbi-admin-template.multipurposethemes.com/bs5/main-horizontal/index5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2024 06:55:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://powerbi-admin-template.multipurposethemes.com/bs5/images/favicon.ico">

    <title>Power BI Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="admin/main-horizontal/css/vendors_css.css">
	  
	<!-- Style-->    
	<link rel="stylesheet" href="admin/main-horizontal/css/horizontal-menu.css"> 
	<link rel="stylesheet" href="admin/main-horizontal/css/style.css">
	<link rel="stylesheet" href="admin/main-horizontal/css/skin_color.css">
     
  </head>

<body class="layout-top-nav light-skin theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
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
			<li><a href="#"><i class="icon-Brush"><span class="path1"></span><span class="path2"></span></i>Components</a>
				<ul> 
					<li><a href="component_bootstrap_switch.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bootstrap Switch</a></li>
					<li><a href="component_date_paginator.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Date Paginator</a></li>
					<li><a href="component_media_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Advanced Medias</a></li>
					<li><a href="component_rangeslider.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Range Slider</a></li>
					<li><a href="component_rating.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ratings</a></li>
					<li><a href="component_animations.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Animations</a></li>
					<li><a href="extension_fullscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Fullscreen</a></li>
					<li><a href="extension_pace.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pace</a></li>
					<li><a href="component_nestable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nestable</a></li>
					<li><a href="component_portlet_draggable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Draggable Portlets</a></li>
				</ul>
			</li>
			<li><a href="#"><i class="icon-Layout-top-panel-1"><span class="path1"></span><span class="path2"></span></i>Forms &amp; Tables</a>
			  <ul>
				<li><a href="#"><i class="icon-File"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>Forms</a>
				  <ul>
					<li><a href="forms_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Elements</a></li>
					<li><a href="forms_general.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Layout</a></li>
					<li><a href="forms_wizard.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Wizard</a></li>	
					<li><a href="forms_validation.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Validation</a></li>
					<li><a href="forms_mask.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Formatter</a></li>
					<li><a href="forms_xeditable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Xeditable Editor</a></li>
					<li><a href="forms_dropzone.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropzone</a></li>
					<li><a href="forms_code_editor.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Code Editor</a></li>
					<li><a href="forms_editors.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editor</a></li>
					<li><a href="forms_editor_markdown.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Markdown</a></li>	
				  </ul>			  
				</li>
				<li><a href="#"><i class="icon-Layout-top-panel-1"><span class="path1"></span><span class="path2"></span></i>Tables</a>
				  <ul>
					<li><a href="tables_simple.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Simple tables</a></li>
					<li><a href="tables_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data tables</a></li>
					<li><a href="tables_editable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editable Tables</a></li>
					<li><a href="tables_color.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Table Color</a></li>
				  </ul>			  
				</li>
			  </ul>		  
			</li>
			<li><a href="#"><i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>Charts</a>
				<ul> 
					<li><a href="charts_chartjs.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ChartJS</a></li>
					<li><a href="charts_flot.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flot</a></li>
					<li><a href="charts_inline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Inline charts</a></li>
					<li><a href="charts_morris.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Morris</a></li>
					<li><a href="charts_peity.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Peity</a></li>
					<li><a href="charts_chartist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chartist</a></li>
					<li><a href="charts_c3_axis.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Axis Chart</a></li>
					<li><a href="charts_c3_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
					<li><a href="charts_c3_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data Chart</a></li>
					<li><a href="charts_c3_line.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Line Chart</a></li>
					<li><a href="charts_echarts_basic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Basic Charts</a></li>
					<li><a href="charts_echarts_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
					<li><a href="charts_echarts_pie_doughnut.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pie & Doughnut Chart</a></li>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
		<!-- Main content -->
		<section class="content">
			<div class="row">				
				<div class="col-xl-8 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">
								Sales Report
							</h4>
							<ul class="box-controls pull-right">
							  <li><a class="box-btn-close" href="#"></a></li>
							  <li><a class="box-btn-fullscreen" href="#"></a></li>
							</ul>
						</div>
						<div class="box-body">
							<div id="charts_widget_43_chart"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">
								User Statistics
							</h4>
							<ul class="box-controls pull-right">
							  <li><a class="box-btn-close" href="#"></a></li>
							  <li><a class="box-btn-fullscreen" href="#"></a></li>
							</ul>
						</div>
						<div class="box-body pb-0">
							<div id="earning-chart" class="min-h-250"></div>
							<div>
								<hr>
								<p class="d-flex justify-content-between fw-700"><span class="text-fade">Dasktops :</span>2154</p>
								<p class="d-flex justify-content-between fw-700"><span class="text-fade">Tablets:</span>6458</p>
								<p class="d-flex justify-content-between fw-700"><span class="text-fade">Mobiles:</span>9518</p>
							</div>
						</div>
					</div>										
				</div>				
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">
								Top Traffic Sources
							</h4>
							<ul class="box-controls pull-right">
							  <li><a class="box-btn-close" href="#"></a></li>
							  <li><a class="box-btn-fullscreen" href="#"></a></li>
							</ul>
						</div>
						<div class="box-body p-0">
							<div class="table-responsive">
							  <table class="table mb-0">
								  <thead>
									<tr>
									  <th scope="col"></th>
									  <th scope="col" class="text-fade">Source</th>
									  <th scope="col" class="text-fade">Visit</th>
									  <th scope="col"></th>
									  <th scope="col"></th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
									  <th scope="row">1</th>
									  <td>Google - Orgenic</td>
									  <td>252</td>
									  <td><i class="fa fa-caret-up text-success"></i> <span class="text-success">32%</span></td>
									  <td class="w-200">
										<div class="progress progress-xs w-p100">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									  </td>
									</tr>
									<tr>
									  <th scope="row">2.</th>
									  <td>Direct</td>
									  <td>412</td>
									  <td><i class="fa fa-caret-up text-success"></i> <span class="text-success">152%</span></td>
									  <td class="w-200">
										<div class="progress progress-xs w-p100">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									  </td>
									</tr>
									<tr>
									  <th scope="row">3.</th>
									  <td>Facebook</td>
									  <td>120</td>
									  <td><i class="fa fa-caret-up text-success"></i> <span class="text-success">10%</span></td>
									  <td class="w-200">
										<div class="progress progress-xs w-p100">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 40%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									  </td>
									</tr>
									<tr>
									  <th scope="row">4.</th>
									  <td>Youtube</td>
									  <td>152</td>
									  <td><i class="fa fa-caret-up text-success"></i> <span class="text-success">5%</span></td>
									  <td class="w-200">
										<div class="progress progress-xs w-p100">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 20%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									  </td>
									</tr>
								  </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">
								Audience growth
							</h4>
							<ul class="box-controls pull-right">
							  <li><a class="box-btn-close" href="#"></a></li>
							  <li><a class="box-btn-fullscreen" href="#"></a></li>
							</ul>
						</div>
						<div class="box-body">
							<div id="charts_widget_1_chart"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<a href="#" class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div>								
									<div class="text-dark fw-700 h2 mb-2 mt-5">24</div>
									<div class="fs-16">Unfulfilled Orders</div>
								</div>
								<div class="bg-danger-light rounded-circle h-80 w-80 text-center l-h-100">
									<span class="text-danger fs-40 icon-Cart2"><span class="path1"></span><span class="path2"></span></span>									
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xl-4">
					<a href="#" class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div>								
									<div class="text-dark fw-700 h2 mb-2 mt-5">810</div>
									<div class="fs-16">Product's Views</div>
								</div>
								<div class="bg-warning-light rounded-circle h-80 w-80 text-center l-h-100">
									<span class="text-warning fs-40 icon-Binocular"></span>									
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xl-4">
					<a href="#" class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div>								
									<div class="text-dark fw-700 h2 mb-2 mt-5">40</div>
									<div class="fs-16">New Messages</div>
								</div>
								<div class="bg-success-light rounded-circle h-80 w-80 text-center l-h-100">
									<span class="icon-Mail text-success fs-40"></span>									
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title align-items-start flex-column">
								New Arrivals
								<small class="subtitle">More than 400+ new members</small>
							</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-border">
									<thead>
										<tr class="text-uppercase bg-lightest">
											<th style="min-width: 250px"><span class="text-dark">products</span></th>
											<th style="min-width: 100px"><span class="text-fade">pruce</span></th>
											<th style="min-width: 100px"><span class="text-fade">deposit</span></th>
											<th style="min-width: 150px"><span class="text-fade">agent</span></th>
											<th style="min-width: 130px"><span class="text-fade">status</span></th>
											<th style="min-width: 120px"></th>
										</tr>
									</thead>
									<tbody>
										<tr>										
											<td class="ps-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 me-20">
														<div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-1.jpg)"></div>
													</div>

													<div>
														<a href="#" class="text-dark fw-600 hover-primary mb-1 fs-16">Vivamus consectetur</a>
														<span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45,800k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Sophia
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													Pharetra
												</span>
											</td>
											<td>
												<span class="badge badge-primary-light badge-lg">Approved</span>
											</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Bookmark"></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Arrow-right"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
										<tr>										
											<td class="ps-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 me-20">
														<div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-2.jpg)"></div>
													</div>

													<div>
														<a href="#" class="text-dark fw-600 hover-primary mb-1 fs-16">Vivamus consectetur</a>
														<span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45,800k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Sophia
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													Pharetra
												</span>
											</td>
											<td>
												<span class="badge badge-warning-light badge-lg">In Progress</span>
											</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Bookmark"></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Arrow-right"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
										<tr>										
											<td class="ps-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 me-20">
														<div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-3.jpg)"></div>
													</div>

													<div>
														<a href="#" class="text-dark fw-600 hover-primary mb-1 fs-16">Vivamus consectetur</a>
														<span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45,800k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Sophia
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													Pharetra
												</span>
											</td>
											<td>
												<span class="badge badge-success-light badge-lg">Success</span>
											</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Bookmark"></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Arrow-right"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
										<tr>										
											<td class="ps-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 me-20">
														<div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-4.jpg)"></div>
													</div>

													<div>
														<a href="#" class="text-dark fw-600 hover-primary mb-1 fs-16">Vivamus consectetur</a>
														<span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45,800k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Sophia
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													Pharetra
												</span>
											</td>
											<td>
												<span class="badge badge-danger-light badge-lg">Rejected</span>
											</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Bookmark"></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Arrow-right"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
										<tr>										
											<td class="ps-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 me-20">
														<div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-5.jpg)"></div>
													</div>

													<div>
														<a href="#" class="text-dark fw-600 hover-primary mb-1 fs-16">Vivamus consectetur</a>
														<span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45,800k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Paid
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													$45k
												</span>
											</td>
											<td>
												<span class="text-fade fw-600 d-block fs-16">
													Sophia
												</span>
												<span class="text-dark fw-600 d-block fs-16">
													Pharetra
												</span>
											</td>
											<td>
												<span class="badge badge-warning-light badge-lg">In Progress</span>
											</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Bookmark"></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary btn-circle mx-5"><span class="icon-Arrow-right"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>  
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
	  <div class="container">
		<div class="pull-right d-none d-sm-inline-block">
			<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
			  <li class="nav-item">
				<a class="nav-link" href="javascript:void(0)">FAQ</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Purchase Now</a>
			  </li>
			</ul>
		</div>
		  &copy; 2021 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
	  </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="admin/images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="admin/images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="admin/images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="admin/images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="admin/images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="admin/images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="admin/images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="admin/images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	<div class="sticky-toolbar">	    
	    <a href="https://themeforest.net/item/power-bi-admin-responsive-bootstrap-admin-templates-with-ui-framework/27894453" data-bs-toggle="tooltip" data-bs-placement="left" title="Buy Now" class="waves-effect waves-light btn btn-success btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Money"><span class="path1"></span><span class="path2"></span></span>
		</a>
	    <a href="https://themeforest.net/user/multipurposethemes/portfolio" data-bs-toggle="tooltip" data-bs-placement="left" title="Portfolio" class="waves-effect waves-light btn btn-danger btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Image"></span>
		</a>
	    <a id="chat-popup" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Live Chat" class="waves-effect waves-light btn btn-warning btn-flat btn-sm">
			<span class="icon-Group-chat"><span class="path1"></span><span class="path2"></span></span>
		</a>
	</div>
	<!-- Sidebar -->
		
	<div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
            <div id="chat-overlay"></div>
            <span class="icon-Group-chat fs-30"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
            <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-bs-toggle="dropdown">
                      <span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
                  </button>
                  <div class="dropdown-menu min-w-200">
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Color me-15"></span>
                        New Group</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                        Contacts</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
                        Groups</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
                        Calls</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
                        Settings</a>
                    <div class="dropdown-divider"></div>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
                        Help</a>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span> 
                        Privacy</a>
                  </div>
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark fs-18">Mayra Sibley</div>
                    <div>
                        <span class="badge badge-sm badge-dot badge-primary"></span>
                        <span class="text-muted fs-12">Active</span>
                    </div>
                </div>
                <div class="chat-box-toggle">
                    <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" type="button">
                      <span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
                    </button>                    
                </div>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="admin/images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">2 Hours</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Hi there, I'm Jesse and you?
                        </div>
                    </div>
                    <div class="chat-msg self">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">You</a>
                                <p class="text-muted fs-12 mb-0">3 minutes</p>
                            </div>
                            <span class="msg-avatar">
                                <img src="admin/images/avatar/3.jpg" class="avatar avatar-lg">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="admin/images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">40 seconds</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Nice to meet you Anne.<br>How can i help you?
                        </div>
                    </div>
                </div><!--chat-log -->
            </div>
            <div class="chat-input">      
                <form>
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send fs-22"></span>
                    </button>
                </form>      
            </div>
		</div>
	</div>
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="admin/main-horizontal/js/vendors.min.js"></script>
	<script src="admin/main-horizontal/js/pages/chat-popup.js"></script>
    <script src="admin/assets/icons/feather-icons/feather.min.js"></script>	

	<script src="admin/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	
	<!-- Power BI Admin App -->
	<script src="admin/main-horizontal/js/jquery.smartmenus.js"></script>
	<script src="admin/main-horizontal/js/menus.js"></script>
	<script src="admin/main-horizontal/js/template.js"></script>
	<script src="admin/main-horizontal/js/pages/dashboard5.js"></script>
	
</body>

<!-- Mirrored from powerbi-admin-template.multipurposethemes.com/bs5/main-horizontal/index5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2024 06:55:56 GMT -->
</html>
