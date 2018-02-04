{!! $header !!}
<!-- Page Content -->
<?php
$cfg = \App\Config::first();
$tp = url("/themes/".$cfg->theme);
?>
<div class="container page-content">
	<div class="thanks">
		<img src="<?=$tp ?>/assets/img/404.png" alt="">
		<h3>Oops! Error 404</h3>
		<h4>لقد حدث خطأ الصفحة الذي تبحث عنها غير موجودة للتبليغ والاتصال بنا انقر هنا</h4>
		<a href="<?=url('')?>" class="btn primary pro">الصفحة الرئيسيه</a>
	</div>
</div>
<!-- // Page Content -->
{!! $footer !!}