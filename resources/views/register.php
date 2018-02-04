<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
    <!-- Page Head -->
    <div class="page-head">
        <h1>انشاء حساب جديد</h1>
        <div class="breadcrumb">
            <a href="#">الرئيسيه</a>
            <a href="#">انشاء حساب جديد</a>
        </div>
    </div>
    <!-- // Page Head -->
    <?php
		if (isset($error)){
			if ($error == false){
				echo '<div class="alert alert-success">'.translate('Your account has been registred successfully').'</div>';
			} else {
				echo '<div class="alert alert-warning">'.translate($error).'</div>';
			}
		}
	?>
    <!-- Signup Form -->
    <form action="" method="post" class="form-ui row billing">
		<?=csrf_field() ?>
		<div class="col-s-12 col-m-6 col-l-4">
			<label class="required">الاسم</label>
			<input name="name" type="text" value="<?=isset(request()->name) ? request()->name : '' ?>"/>
		</div>
		<div class="col-s-12 col-m-6 col-l-4">
			<label class="required">البريد الالكتروني</label>
			<input name="email" type="email" value="<?=isset(request()->email) ? request()->email : '' ?>"/>
		</div>
		<div class="col-s-12 col-m-6 col-l-4">
			<label class="required">كلمة المرور</label>
			<input name="password" type="password"/>
		</div>
			<input name="register" type="submit" class="btn primary pro" value="انهاء الطلب">
        </div>
        <!-- // control input -->
    </form>
    <!-- // Signup Form -->
    
</div>
<!-- // Page Content -->
<?php echo $footer?>