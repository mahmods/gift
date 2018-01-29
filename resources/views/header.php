<!DOCTYPE html>
<html>
    <head>
		<meta charset='utf-8'/>
		<title><?=$title ?></title>        
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta content='<?=htmlspecialchars($desc) ?>' name='description'/>
		<meta content='<?=$keywords ?>' name='keywords'/>
		<base href="<?=url('') ?>/" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 
		<link rel="stylesheet" href="<?=$tp ?>/assets/style.css">
		<script src="<?=$tp ?>/assets/plugins.js"></script>
		<?php if ($stripe->active == 1) {?><script type="text/javascript" src="https://js.stripe.com/v2/" async></script><?php }?>

		<script>
			var sitename = '<?=translate($cfg->name) ?>';
			var empty_cart = '<?=translate('Your cart is empty') ?>';
			var checkout = '<?=translate('Checkout') ?>';
			var continue_to_payment = '<?=translate('Continue') ?>';			
			<?php if ($stripe->active == 1) {?>var stripe_key = '<?=json_decode($stripe->options,true)['key']?>';<?php }?>
			<?=$style->js ?>

		</script>
		<script src="<?=$tp ?>/assets/main.js"></script>
	</head>
	<body dir="ltr" <?php if ($page == true) {?>class="page"<?php }?>>
		<div class="search-modal">
			<div class="col-md-5">
				<input id="search-input" placeholder="<?=translate('Search for products') ?>"/>
				<button class="search-toggle">x</button>
				<div id="search-results">
				</div>
			</div>
		</div>
		<?php if ($cfg->floating_cart == 1) {?>
		<button class="toggle-cart"><i class="icon-basket"></i></button>
		<div id="cart">
			<button class="toggle-cart"><i class="icon-close"></i></button>
			<div id="cart-header">
				Cart
				<button class="pull-right" onclick="$('#cart').toggle('300');"><i class="icon-close"></i></button>
			</div>
			<div id="cart-content">
				<div class="loading"></div>
			</div>
		</div>
		<?php }?>
		<?php if ($landing == true) {?><div id="wrap"><div class="page-warpper cover-header cover"><?php } else {?><div id="wrap"><div class="page"><?php }?>
		<style>
			<?php if ($bg != false) {?>
			.cover {background:linear-gradient(to bottom, rgba(0, 0, 0, 0.5),rgba(255, 255, 255, 0)),url("<?=$bg ?>") no-repeat 0%/cover scroll;}
			<?php } else {?>
			.cover {background:linear-gradient(to right, <?=$style->background ?>) repeat scroll 0% 0%;}
			<?php }?>
			.bg, #navbar.collapse.in, #navbar.collapsing {
			background:linear-gradient(to right, <?=$style->background ?>) repeat scroll 0% 0%;
			}
			.c {
			color: <?=$color[0] ?>;
			}
			<?=$style->css ?>
		</style>
		<div class="header <?php if ($page != false) {?>bg<?php }?>">
			<nav class="navbar navbar-default">
				<div class="container ">
					<div class="navbar-header">
						<a class="search-toggle mobile-search">
							<i class="icon-magnifier"></i>
						</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand smooth" rel="home" href="<?=url('')?>"><img src="<?=$cfg->logo ?>"></a>
					</div>
					
					<div class="collapse navbar-collapse" id="navbar">
						
						<ul class="nav navbar-nav">
							<?php foreach ($menu as $menu){?>
								<?php
									$childs = \App\Menu::where(['parent' => $menu->id])->orderby('o','desc')->get();
									if (count($childs) == 0){
								?>
									<li>
										<a href="<?=$menu->link ?>" class="smooth"><?=translate($menu->title) ?></a>
									</li>
								<?php } else { ?>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="<?=$menu->link ?>" class="smooth"><?=translate($menu->title) ?></a>
										<ul class="dropdown-menu">
											<?php foreach ($childs as $child) {?>
												<li><a class="smooth" href="<?=$child->link?>"><?=translate($child->title) ?></a></li>
											<?php } ?>
										</ul>
									</li>
								<?php }?>
							<?php }?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php if ($cfg->floating_cart == 0) {?>
							<li>
								<a href="<?=url('cart')?>" class="smooth" data-title="<?=translate('Cart')?>">
									<i class="icon-basket-loaded" style="margin: 0px;"></i><b class="hidden-md hidden-sm hidden-lg"> <?=translate('Cart') ?></b>
								</a>
							</li>
							<?php }?>
							<?php if ($cfg->registration == 1) {?>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
									<i class="icon-user" style="margin: 0px;"></i><b class="hidden-md hidden-sm hidden-lg"> <?=translate('Account') ?></b>
								</a>
								<ul class="dropdown-menu">
									<?php if (empty(session('customer'))) {?>
									<li><a class="smooth" href="<?=url('register')?>"><?=translate('Register') ?></a></li>
									<li><a class="smooth" href="<?=url('login')?>"><?=translate('Login') ?></a></li>
									<?php } else {?>
									<li><a class="smooth" href="<?=url('account')?>"><?=translate('Account') ?></a></li>
									<li><a class="smooth" href="<?=url('profile')?>"><?=translate('Profile') ?></a></li>
									<li><a href="<?=url('logout')?>"><?=translate('Logout') ?></a></li>
									<?php }?>
								</ul>
							</li>
							<?php }?>
							<li class="dropdown">
								<a class="dropdown-toggle lang" data-toggle="dropdown" href="#" aria-expanded="false">
									<?php echo currency('')?><b class="hidden-md hidden-sm hidden-lg"> <?=translate('Currency') ?></b>
								</a>
								<ul class="dropdown-menu">
									<?php foreach ($currencies as $currency){?>
										<li><a href="<?=url('/currency/'.$currency->code)?>"><?=translate($currency->name) ?></a></li>
									<?php }?>
								</ul>
							</li>
							<?php if ($cfg->translations == 1) {?>
							<li class="dropdown">
								<a class="dropdown-toggle lang" data-toggle="dropdown" href="#" aria-expanded="false">
									<i class="icon-globe" style="margin: 0px;"></i><b class="hidden-md hidden-sm hidden-lg"> <?=translate('Language') ?></b>
								</a>
								<ul class="dropdown-menu">
									<?php foreach ($languages as $lang){?>
										<li><a href="<?=url('/language/'.$lang->code)?>"><?=translate($lang->name) ?></a></li>
									<?php }?>
								</ul>
							</li>
							<?php }?>
							<li>
								<a class="search-toggle">
									<i class="icon-magnifier" style="margin: 0px;"></i>
								</a>
							</li>
							<li class="dropdown hidden-md hidden-sm hidden-lg">
								<a data-toggle="collapse" data-target="#navbar">
									<i class="icon-close" style="margin: 0px;"></i><b> Close</b>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>		