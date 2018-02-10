<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
	<!-- Page Head -->
	<div class="page-head">
		<h1>تسجيل الدخول</h1>
		<div class="breadcrumb">
			<a href="#">الرئيسيه</a>
			<a href="#">تسجيل الدخول</a>
		</div>
	</div>
	<!-- // Page Head -->

	<!-- Sign IN -->
	<div class="row row-zCenter">
		<div class="col-s-12 col-m-6">
			<?php
				if (isset($error)){
					echo '<div class="alert alert-warning">'.translate($error).'</div>';
				}
				?>
			<!-- Form -->
			<form action="" method="post" class="form-ui">
				<?=csrf_field() ?>
				<!-- control input -->
				<label>البريد الالكتروني</label>
				<input placeholder="اسم المستخدم او البريد" name="email" type="text" value="<?=isset(request()->email) ? request()->email : '' ?>"  />
				<label>كلمه المرور</label>
				<input name="password" type="password" placeholder="كلمة مرور الحساب"/>
				<label class="checkbox block-lvl">
					<input type="checkbox" name="checkbox">
					<span>حفظ بيانات الحساب</span>
				</label>
				<input name="login" type="submit" class="btn primary pro" value="تسجيل الدخول">
			</form>
			<!-- // Form -->
		</div>
		<div class="col-s-12 col-m-6">
			<div class="signup-banner">
				<h3>الا تملك حساب على متجرنا يمكنك تسجيل حساب جديد الان</h3>
				<a href="./register" class="btn primary pro">انشاء حساب جديد</a>
			</div>
		</div>
	</div>
	<!-- // Sign IN -->
</div>
<!-- // Page Content -->
<?php echo $footer?>