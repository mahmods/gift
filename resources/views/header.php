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
		<!-- Required CSS Files -->
		<link href="<?=$tp ?>/assets/css/tornado-rtl.css" rel="stylesheet">
        <link href="<?=$tp ?>/assets/css/animations.css" rel="stylesheet">
		<link href="<?=$tp ?>/assets/theme-rtl.css" rel="stylesheet">
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
		<!-- Top Navigation -->
		<div class="top-navigation">
			<div class="container">
				<a href="#" class="tagline"><img src="<?=$tp ?>/assets/img/Tagline.png" alt=""></a>
				<div class="info">
					<?php if ($cfg->translations == 1) {?>
						<div class="dropdown-button language-btn">
							<button class="btn dropdown-btn ti-arrow-drop-down"><?=translate('Language') ?></button>
							<ul class="dropdown">
								<?php foreach ($languages as $lang){?>
									<li><a href="<?=url('/language/'.$lang->code)?>"><?=translate($lang->name) ?></a></li>
								<?php }?>
							</ul>
						</div>
					<?php }?>
					<span class="info-element ti-email"><?=$cfg->email ?></span>
					<span class="info-element ti-phone-in-talk"><?=$cfg->phone ?></span>
				</div>
			</div>
		</div>
		<!-- // Top Navigation -->

		<!-- Header -->
        <header class="main-header">
            <div class="container">
                <a href="/" class="logo"><img src="<?=$tp ?>/assets/img/logo.png" alt=""></a>
                
                <form class="search-box">
                    <input id="search-input" type="text" placeholder="كلمات البحث">
					<input type="submit" value="ابحث الان">
					<div id="search-results"></div>
                </form>
                
                <div class="action-area">
                    <!-- My Account -->
					<?php if ($cfg->registration == 1) {?>
                    <div class="cart-area">
                        <a href="#" class="cart-btn account-btn">
                            <i class="person-icon"></i>
                            <h3><?=translate('Account') ?> <span>الملف الشخصي</span></h3>
						</a>
                        <ul class="cart-dropdown">
							<?php if (empty(session('customer'))) {?>
							<li><a class="smooth" href="<?=url('register')?>"><?=translate('Register') ?></a></li>
							<li><a class="smooth" href="<?=url('login')?>"><?=translate('Login') ?></a></li>
							<?php } else {?>
							<li><a class="smooth" href="<?=url('account')?>"><?=translate('Account') ?></a></li>
							<li><a class="smooth" href="<?=url('profile')?>"><?=translate('Profile') ?></a></li>
							<li><a href="<?=url('logout')?>"><?=translate('Logout') ?></a></li>
							<?php }?>
						</ul>
                    </div>
					<?php }?>
                    <!-- // My Account -->
                    
                    <!-- Wishlist -->
                    <div class="cart-area">
                        <a href="#" class="cart-btn">
                            <i class="heart-icon"></i>
                            <h3>قائمة الاماني <span>عدد المنتجات : 50</span></h3>
                        </a>
                        
                        <div class="cart-dropdown">
                            <ul>
                                <!-- Cart Item -->
                                <li class="table-style">
                                    <a href="#" class="image"><img src="img/cart.png" alt=""></a>
                                    <div class="info">
                                        <a href="product-single.html"><h3>سماعات الكترونيه حديثه على شكل روبوت</h3></a>
                                        <span class="quantity">x2</span>
                                        <a href="#" class="remove-item ti-close-a"></a>
                                    </div>
                                </li>
                                <!-- Cart Item -->
                                <li class="table-style">
                                    <a href="#" class="image"><img src="img/cart.png" alt=""></a>
                                    <div class="info">
                                        <a href="product-single.html"><h3>سماعات الكترونيه حديثه على شكل روبوت</h3></a>
                                        <span class="quantity">x2</span>
                                        <a href="#" class="remove-item ti-close-a"></a>
                                    </div>
                                </li>
                                <!-- Cart Item -->
                                <li class="table-style">
                                    <a href="#" class="image"><img src="img/cart.png" alt=""></a>
                                    <div class="info">
                                        <a href="product-single.html"><h3>سماعات الكترونيه حديثه على شكل روبوت</h3></a>
                                        <a href="#" class="remove-item ti-close-a"></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- // Wishlist -->
                    
                    <!-- Cart -->
                    <div class="cart-area">
                        <a href="#" class="cart-btn">
                            <i class="basket-icon"></i>
                            <h3>سله التسوق <span>عدد المنتجات : 50</span></h3>
                        </a>
                        <div id="cart-content" class="cart-dropdown">
                            <ul>
                                <!-- Cart Item -->
                                <li class="table-style">
                                    <a href="#" class="image"><img src="img/cart.png" alt=""></a>
                                    <div class="info">
                                        <a href="product-single.html"><h3>سماعات الكترونيه حديثه على شكل روبوت</h3></a>
                                        <span class="quantity">x2</span>
                                        <a href="#" class="remove-item ti-close-a"></a>
                                    </div>
                                </li>
                                <!-- Cart Item -->
                                <li class="table-style">
                                    <a href="#" class="image"><img src="img/cart.png" alt=""></a>
                                    <div class="info">
                                        <a href="product-single.html"><h3>سماعات الكترونيه حديثه على شكل روبوت</h3></a>
                                        <span class="quantity">x2</span>
                                        <a href="#" class="remove-item ti-close-a"></a>
                                    </div>
                                </li>
                                <!-- Cart Item -->
                                <li class="table-style">
                                    <a href="#" class="image"><img src="img/cart.png" alt=""></a>
                                    <div class="info">
                                        <a href="product-single.html"><h3>سماعات الكترونيه حديثه على شكل روبوت</h3></a>
                                        <span class="quantity">x2</span>
                                        <a href="#" class="remove-item ti-close-a"></a>
                                    </div>
                                </li>
                            </ul>
                            <h5>الاجمالي : <span>15864$</span></h5>
                            <h5><a href="#">مشاهدة كل المنتجات</a></h5>
                            <a href="cart.html" class="btn-sks">عربه التسوق</a>
                            <a href="checkout.html" class="btn-sks">انهاء الطلب</a>
                        </div>
                    </div>
                    <!-- // Cart -->
                </div>
            </div>
        </header>
		<!-- // Header -->
		
		<!-- Bottom Navigation -->
		<div class="bottom-navigation">
			<div class="container">
				<div class="navigation-menu">
					<ul>
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
				</div>
				
				<a href="#" data-modal="hediatk-helper" class="helper-button">اعثر على الهديه المثاليه</a>
			</div>
		</div>
		<!-- // Bottom Navigation -->
		
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