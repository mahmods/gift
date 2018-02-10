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
			<div class="profile">
				<h2 class="title">لوحة التحكم في الحساب</h2>
				
				<div class="row">
					<div class="col-s-12 col-m-6 col-l-4">
						<ul>
							<li><span>الاسم بالكامل</span> <?=$customer->first_name.' '.$customer->last_name?></li>
							<li><span>البريد الالكتروني</span><?=$customer->email?></li>
						</ul>
					</div>
					
					<div class="col-s-12 col-m-6 col-l-4">
						<ul>
							<li><span>رقم الهاتف</span><?=$customer->phone?></li>
						</ul>
					</div>
					
					<div class="col-s-12 col-m-6 col-l-4">
						<ul>
							<li><span>عنوان الشحن</span> Ambulance Bridge Beni Suef, Al Wasta 62819 Egypt</li>
						</ul>
						<ul>
							<li><span>عنوان الفاتورة</span> Ambulance Bridge Beni Suef, Al Wasta 62819 Egypt</li>
						</ul>
					</div>
				</div>
				<a href="./account/edit" class="edit-btn">تعديل بياناتى</a>
			</div>
			
			<!-- Table -->
			<div class="order-table responsive-table">
				<table>
					<thead>
						<tr>
							<td class="col-s-1">#</td>
							<td class="col-s-3">الطلب</td>
							<td class="col-s-2">الحاله</td>
							<td class="col-s-1">المنتجات</td>
							<td class="col-s-3">العميل</td>
							<td class="col-s-2">الاجمالي</td>
						</tr>
					</thead>
					
					<tbody>
					<?php foreach ($orders as $order): ?>
						<tr>
							<td class="col-s-1"><?=$order->id?></td>
							<td class="col-s-3"><a href="#"><h3>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم</h3></a></td>
							<td class="col-s-2"><span class="badge success">جاري الشحن</span></td>
							<td class="col-s-1">01</td>
							<td class="col-s-3"><h4>عبدالله رمضان عويس</h4></td>
							<td class="col-s-2"><?=currency($order->summ)?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- // Table -->
		</div>
		<div class="col-s-12 col-l-3">
			<div class="side-wideget">
				<div class="section-head"><h2>حسابي</h2></div>
					<ul>
						<li><a href="./account">لوحة التحكم في الحساب</a></li>
						<li><a href="./account/edit">البيانات الشخصية</a></li>
						<li><a href="./address">سجل العناوين</a></li>
						<li><a href="./orders">طلباتي</a></li>
						<li><a href="./coupon">كوبونات الخصم</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- // Page Content -->
	<div class="bheader bg">
		<h2><?=translate('Account')?></h2>
	</div>
	<div class="col-md-4 account">
		<h6><i class="icon-list"></i> <?=translate('Order History')?></h6>
		<?php foreach ($orders as $order){ ?>
		<a class="customer-order smooth" href="<?=url('invoice/'.$order->id)?>" data-title="Invoice">
			<h6><b><?='#'.$order->id.' - '.$order->name?></b><b class="total"><?=currency($order->summ)?></b></h6>
		</a>
		<?php } if (count($orders) == 0) {?>
		<div class="no-orders">
			<i class="icon-basket"></i>
			<?=translate('You have not made any previous orders!')?>
		</div>
		<?php }?>
	</div>
	<div class="clearfix"></div>
<?php echo $footer?>