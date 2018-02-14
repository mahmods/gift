<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
	<!-- Page Head -->
	<div class="page-head">
		<h1>الملف الشخصي</h1>
		<div class="breadcrumb">
			<a href="#"><?=translate("Home")?></a>
			<a href="#">انهاء الطلب</a>
		</div>
	</div>
	<!-- // Page Head -->

	<div class="row row-reverse">
		<div class="col-s-12 col-l-9">
            <?php if ($errors->any()): ?>
            <div class="alert danger">
                All fields are required !
                <span class="close-alert ti-clear"></span>
            </div>
            <?php endif ?>
			<div class="profile">
                <h2 class="title">تعديل العنوان</h2>
                <form action="" method="post" class="form-ui row billing">
                    <?=csrf_field() ?>
                    <div class="col-s-12 col-m-6 col-l-6">
                        <label class="required">الإسم الشخصي</label>
                        <input name="first_name" type="text" value="<?=$address->first_name?>"/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-6">
                        <label class="required">اسم العائلة</label>
                        <input name="last_name" type="text" value="<?=$address->last_name?>"/>
                    </div>
                    
                    <div class="col-s-12">
                        <label class="required">الهاتف المحمول</label>
                        <input name="phone" type="tel" value="<?=$address->phone?>"/>
                    </div>
                    <div class="col-s-12">
                        <label class="required">إسم الشارع / رقم العمارة / رقم الشقة</label>
                        <input name="address_1" type="text" value="<?=$address->address_1?>"/>
                    </div>
                    <div class="col-s-12">
                        <label class="required">رقم الشقة + معلومات اضافية للعنوان</label>
                        <input name="address_2" type="text" value="<?=$address->address_2?>"/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-6">
                        <label class="required">المدينة</label>
                        <input name="city" type="text" value="<?=$address->city?>"/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-6">
                        <label class="required">المنطقة</label>
                        <input name="region" type="text" value="<?=$address->region?>"/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-12">
                        <input name="register" type="submit" class="btn primary pro" value="حفظ"/>
                    </div>
                    <!-- // control input -->
                </form>
			</div>
		</div>
		<div class="col-s-12 col-l-3">
			<div class="side-wideget">
				<div class="section-head"><h2>حسابي</h2></div>
					<ul>
						<li><a href="./account">لوحة التحكم في الحساب</a></li>
						<li><a href="./account/edit">البيانات الشخصية</a></li>
						<li><a href="./account/address">سجل العناوين</a></li>
						<li><a href="./orders">طلباتي</a></li>
						<li><a href="./coupon">كوبونات الخصم</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- // Page Content -->
<?php echo $footer?>