	<!-- Footer -->
	<div class="footer-features">
		<div class="container">
			<div class="row">
				<!-- Feature Block -->
				<div class="feature-block col-s-12 col-m-6 col-l-4">
					<div class="table-style">
						<i><img src="<?=$tp ?>/assets/img/truck-fast.png" alt=""></i>
						<h3 class="info">شحن مجاني <span>شحن مجاني للمنتجات اكثر من 500$</span></h3>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-s-12 col-m-6 col-l-4">
					<div class="table-style">
						<i><img src="<?=$tp ?>/assets/img/money.png" alt=""></i>
						<h3 class="info">ضمان رجوع المال <span>يمكنك استرجاع مالك لمدة 30 يوم من الشراء</span></h3>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-s-12 col-m-6 col-l-4">
					<div class="table-style">
						<i><img src="<?=$tp ?>/assets/img/telemarketer.png" alt=""></i>
						<h3 class="info">الدعم الاونلاين <span>ان واجهتك مشكله يمكنك استخدام الدعم المباشر</span></h3>
					</div>
				</div>
			</div>
		</div>
		</div>

		<footer class="main-footer">
		<div class="container">
			<div class="row row-stretch">
				<div class="col-s-12 col-m-6 col-l-4">
					<h3>نبذه عن هديتك</h3>
					<p><?=$cfg->footer_about ?></p>
					<div class="social">
					<?php foreach($social as $platform => $account) {?>
						<a href="<?=$account ?>" class="ti-<?=$platform ?>"></a>
					<?php } ?>
					</div>
				</div>
				
				<div class="col-s-12 col-m-6 col-l-3">
					<h3>القائمة</h3>
					<ul>
					<?php foreach ($links as $link) {?>
						<li><a href="<?=$link->link ?>"><?=translate($link->title) ?></a></li>
					<?php } ?>
					</ul>
				</div>
				
				<!-- <div class="col-s-12 col-m-6 col-l-3">
					<h3>المدونة</h3>
					<ul>
						<li><a href="#">معلومات العميل</a></li>
						<li><a href="#">عناوين</a></li>
						<li><a href="#">طلبات</a></li>
						<li><a href="#">عربة التسوق</a></li>
						<li><a href="#">قائمة الملاحظة</a></li>
					</ul>
				</div> -->
				
				<div class="col-s-12 col-m-6 col-l-2">
					<h3>طرق الدفع</h3>
					<img src="<?=$tp ?>/assets/img/payments.png" alt="">
				</div>
			</div>
		</div>

		<div class="copyrights">
			<div class="container">
				جميع الحقوق محفوظة لــ هديتك.كوم
				
				<div class="mahacode-copyrights">
					<a href="http://mahacode.com/" target="_blank" class="logo"><img src="<?=$tp ?>/assets/img/mahacode-white.png" alt=""></a>
					<div class="mc-tooltip">
						<h3>تصميم وتطوير شركة مها كود</h3>
						<h4 class="ti-email">info@mahacode.com</h4>
						<h4 class="ti-phone">+02686 4621312 14849 8789</h4>
						<div class="btns-icons">
							<a href="http://mahacode.com/" target="_blank" class="ti-home-io"></a>
							<a href="https://www.linkedin.com/company/10801558" target="_blank" class="ti-linkedin"></a>
							<a href="https://api.whatsapp.com/send?phone=00201093678012" target="_blank" class="ti-whatsapp-line"></a>
							<a href="https://www.behance.net/mahacode" target="_blank" class="ti-behance"></a>
							<a href="https://www.instagram.com/maha.code/" target="_blank" class="ti-instagram"></a>
							<a href="http://www.twitter.com/mahacode" target="_blank" class="ti-twitter"></a>
							<a href="https://www.facebook.com/MahaCode/" class="ti-facebook"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</footer>
		<!-- // Footer -->

	<!-- Required JS Files -->
	
	<script src="<?=$tp ?>/assets/js/tornado.js"></script>
	<?php if ($lang == "ar") : ?>
	<script src="<?=$tp ?>/assets/js/script-rtl.js"></script>
	<?php else: ?>
	<script src="<?=$tp ?>/assets/js/script.js"></script>
	<?php endif; ?>
	<script src="<?=$tp ?>/assets/main.js"></script>
	</body>
</html>