<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'/>
		<title><?=$title?></title>
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta content='<?=$cfg->desc?>' name='description'/>
		<meta content='<?=$cfg->key?>' name='keywords'/>
		<!--ASSETS-->
		<base href="<?=url('admin')?>/" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet"> 
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="<?=$tp?>/admin/style.css">
		<link rel="stylesheet" href="<?=$tp?>/admin/css/flag-icon.min.css">
		<link rel="stylesheet" href="<?=$tp?>/assets/nouislider.min.css">
		<script src="<?=$tp?>/assets/jquery.min.js"></script>
		<script src="<?=$tp?>/assets/bootstrap.min.js"></script>
		<script src="<?=$tp?>/assets/Chart.min.js"></script>
		<script src="<?=$tp?>/assets/nouislider.min.js"></script>
	</head>
	<body>
			<aside class="sidebar-left">
				<nav class="navbar navbar-inverse">
					<div>
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"><img src="<?=url('assets/sellerkit.png')?>"></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="sidebar-menu">
								<li <?=($area == "index" ? "class=active" : "")?>><a href="<?=url('admin')?>"><i class="icon-home"></i> <span>Dashboard</span></a></li>
								<li class="collapsed" data-toggle="collapse" data-target="#toggleContent">
									 <a href="javascript:void(0)">Content</a>
									<div class="collapse" id="toggleContent" style="height: auto;">
										<ul class="sidebar-menu">
											<li <?=($area == "products" ? "class=active" : "")?>><a href="products"><i class="icon-bag"></i> <span>Products</span></a></li>
											<li <?=($area == "categories" ? "class=active" : "")?>><a href="categories"><i class="icon-folder-alt"></i> <span>Categories</span></a></li>
											<li <?=($area == "pages" ? "class=active" : "")?>><a href="pages"><i class="icon-docs"></i> <span>Pages</span></a></li>
											<li <?=($area == "blog" ? "class=active" : "")?>><a href="blog"><i class="icon-docs"></i> <span>Blog</span></a></li>
											<li <?=($area == "customers" ? "class=active" : "")?>><a href="customers"><i class="icon-docs"></i> <span>Customers</span></a></li>
											<li <?=($area == "coupons" ? "class=active" : "")?>><a href="coupons"><i class="icon-present"></i> <span>Coupons</span></a></li>
											<li <?=($area == "reviews" ? "class=active" : "")?>><a href="reviews"><i class="icon-speech"></i> <span>Reviews</span></a></li>
										</ul>
									</div>
								</li>
								<li class="collapsed" data-toggle="collapse" data-target="#toggleSales">
									<a href="javascript:void(0)">Sales</a>
									<div class="collapse" id="toggleSales" style="height: auto;">
										<ul class="sidebar-menu">
											<li <?=($area == "orders" ? "class=active" : "")?>><a href="orders"><i class="icon-basket"></i> <span>Orders</span></a></li>
											<li <?=($area == "statistics" ? "class=active" : "")?>><a href="statistics"><i class="icon-bar-chart"></i> <span>Statistics</span></a></li> 
										</ul>
									</div>
								</li>
								<li class="collapsed" data-toggle="collapse" data-target="#toggleMarketing">
									<a href="javascript:void(0)">Marketing</a>
									<div class="collapse" id="toggleMarketing" style="height: auto;">
										<ul class="sidebar-menu">
											<li <?=($area == "tracking" ? "class=active" : "")?>><a href="tracking"><i class="icon-share"></i> <span>Tracking</span></a></li>
											<li <?=($area == "newsletter" ? "class=active" : "")?>><a href="newsletter"><i class="icon-envelope-letter"></i> <span>Newsletter</span></a></li>
										</ul>
									</div>
								</li>
								<li class="collapsed" data-toggle="collapse" data-target="#toggleVisitors">
									<a href="javascript:void(0)">Visitors</a>
									<div class="collapse" id="toggleVisitors" style="height: auto;">
										<ul class="sidebar-menu">
											<li <?=($area == "referrers" ? "class=active" : "")?>><a href="referrers"><i class="icon-share"></i> <span>Referrers</span></a></li>
											<li <?=($area == "os" ? "class=active" : "")?>><a href="os"><i class="icon-screen-desktop"></i> <span>Operating systems</span></a></li>
											<li <?=($area == "browsers" ? "class=active" : "")?>><a href="browsers"><i class="icon-cursor"></i> <span>Browsers</span></a></li>
										</ul>
									</div>
								</li>
								<li class="collapsed" data-toggle="collapse" data-target="#toggleSettings">
									<a href="javascript:void(0)">Settings</a>
									<div class="collapse" id="toggleSettings" style="height: auto;">
										<ul class="sidebar-menu">
											<li <?=($area == "shipping" ? "class=active" : "")?>><a href="shipping"><i class="icon-globe"></i> <span>Shipping cost</span></a></li>
											<li <?=($area == "payment" ? "class=active" : "")?>><a href="payment"><i class="icon-credit-card"></i> <span>Payment</span></a></li>
											<li <?=($area == "currency" ? "class=active" : "")?>><a href="currency"><i class="icon-tag"></i> <span>Currency</span></a></li>
											<li <?=($area == "settings" ? "class=active" : "")?>><a href="settings"><i class="icon-settings"></i> <span>Settings</span></a></li>
											<li <?=($area == "theme" ? "class=active" : "")?>><a href="theme"><i class="icon-layers"></i> <span>Theme settings</span></a></li>
											<li <?=($area == "lang" ? "class=active" : "")?>><a href="languages"><i class="icon-globe"></i> <span>Language</span></a></li>
											<li <?=($area == "tokens" ? "class=active" : "")?>><a href="tokens"><i class="icon-key"></i> <span>API Tokens</span></a></li>
											<li <?=($area == "export" ? "class=active" : "")?>><a href="export"><i class="icon-cloud-download"></i> <span>Export</span></a></li>
										</ul>
									</div>
								</li>
								<li class="collapsed" data-toggle="collapse" data-target="#toggleCustomization">
									<a href="javascript:void(0)">Customization</a>
									<div class="collapse" id="toggleCustomization" style="height: auto;">
										<ul class="sidebar-menu">
											<li <?=($area == "slider" ? "class=active" : "")?>><a href="slider"><i class="icon-picture"></i> <span>Slider</span></a></li>
											<li <?=($area == "editor" ? "class=active" : "")?>><a href="editor"><i class="icon-pencil"></i> <span>Theme editor</span></a></li>
											<li <?=($area == "templates" ? "class=active" : "")?>><a href="templates"><i class="icon-book-open"></i> <span>Templates</span></a></li>
											<li <?=($area == "builder" ? "class=active" : "")?>><a href="builder"><i class="icon-layers"></i> <span>Page builder</span></a></li>
											<li <?=($area == "ads" ? "class=active" : "")?>><a href="ads"><i class="icon-layers"></i> <span>Ads</span></a></li>
											<li <?=($area == "menu" ? "class=active" : "")?>><a href="menu"><i class="icon-list"></i> <span>Main menu</span></a></li>
											<li <?=($area == "bottom" ? "class=active" : "")?>><a href="bottom"><i class="icon-list"></i> <span>Footer menu</span></a></li>
											<li <?=($area == "fields" ? "class=active" : "")?>><a href="fields"><i class="icon-grid"></i> <span>Extrafields</span></a></li>
										</ul>
									</div>
								</li>
								<li class="collapsed" data-toggle="collapse" data-target="#toggleAdministration">
									<a href="javascript:void(0)">Administration</a>
									<div class="collapse" id="toggleAdministration" style="height: auto;">
										<ul class="sidebar-menu">
											<li <?=($area == "support" ? "class=active" : "")?>><a href="support"><i class="icon-support"></i> <span>Support</span></a></li>
											<li <?=($area == "administrators" ? "class=active" : "")?>><a href="administrators"><i class="icon-users"></i> <span>Administrators</span></a></li>
											<li <?=($area == "profile" ? "class=active" : "")?>><a href="profile"><i class="icon-user"></i> <span>Profile</span></a></li>
											<li <?=($area == "logout" ? "class=active" : "")?>><a href="logout"><i class="icon-logout"></i> <span>Logout</span></a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</aside>
		<div class="admin">
			<div class="content-warpper">
				<div class="content">
				<div class="clear"></div>
<script>
	$("li:not(.collapsed,.header)").each(function() {
		if ($(this).hasClass("active")) {
			$(this).parent().parent().addClass("in");
		}
	})
</script>