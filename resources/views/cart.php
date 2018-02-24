<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
	<!-- Page Head -->
	<div class="page-head">
		<h1><?=translate('Cart')?></h1>
		<div class="breadcrumb">
			<a href="#"><?=translate('Home')?></a>
			<a href="#">اسم المستخدم</a>
			<a href="#"><?=translate('Cart')?></a>
		</div>
	</div>
	<!-- // Page Head -->
	<?php if (count($products) > 0) : ?>
	<!-- Cart Table -->
	<div class="cart-table responsive-table">
		<table>
			<thead>
				<tr>
					<td class="col-s-1">صورة المنتج</td>
					<td class="col-s-3">اسم المنتج</td>
					<td class="col-s-2">العدد</td>
					<td class="col-s-2">السعر</td>
					<td class="col-s-2">الاجمالي</td>
					<td class="col-s-1"></td>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($products as $product) : ?>
				<tr>
					<td class="col-s-1">
						<img src="<?=url('/assets/products/'.image_order($product['images']))?>" alt="" class="fluid">
					</td>
					<td class="col-s-3">
						<a href="#"><h3><?=$product['title']?></h3></a>
						<a href="#">قسم باقات الهدايا</a>
					</td>
					<td class="col-s-2">
						<span>العدد</span>
						<input type="number" min="1" max="9" step="1" value="<?=$product['quantity']?>">
					</td>
					<td class="col-s-2"><span class="price"><?=$product['price']?></span></td>
					<td class="col-s-2"><span class="price"><?=$product['total']?></span></td>
					<td class="col-s-1"><a href="javascript:void(0);" data-id="<?=$product['id']?>" class="remove-product remove-cart remove-item ti-android-delete"></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- // Cart Table -->

	<div class="row">
		<!-- Cart Totals -->
		<div class="cart-totals col-s-12 col-l-4">
			<div class="content-box">
				<h3 class="title">ملخص الطلبات</h3>
				<ul class="main-tots">
					<li>مدينة التسليم <span>دبى ,UAE</span></li>
					<li>تاريخ التسليم <span>29/12/2017</span></li>
					<li>وقت التسليم <span>12:00 - 15:00</span></li>
					<li>المجموع <span>egp245</span></li>
					<li>الفرعي <span>egp295 </span></li>
					<li>الشحن <span>50egp</span></li>
					<li>المجموع <span>3998egp</span></li>
				</ul>
				<a href="./checkout" class="btn primary">انهاء الطلب</a>
			</div>
		</div>
		
		<!-- Discount Code -->
		<div class="accordion tornado-ui col-s-12 col-l-8">
			<div class="content-box">
				<!-- Accordion item -->
				<div class="accordion-item">
					<div class="accordion-title ti-chevron-down">استخدام قسيمة التخفيض</div>
					<div class="accordion-content">
						<p>استخدام قسيمة التخفيض</p>
						<form class="form-ui row no-gutter code-form">
							<div class="col-s-12 col-m-9"><input type="text" placeholder="رمز القسيمة"></div>
							<div class="col-s-12 col-m-3"><input type="submit" value="اعتمد التخفيض" class="btn primary block-lvl"></div>
						</form>
					</div>
				</div>

				<!-- Accordion item -->
				<div class="accordion-item">
					<div class="accordion-title ti-chevron-down">استخدام قائم الهدايا</div>
					<div class="accordion-content">
						<p>استخدام قائم الهدايا</p>
						<form class="form-ui row no-gutter code-form">
							<div class="col-s-12 col-m-9"><input type="text" placeholder="رمز القسيمة"></div>
							<div class="col-s-12 col-m-3"><input type="submit" value="اعتمد التخفيض" class="btn primary block-lvl"></div>
						</form>
					</div>
				</div>

				<!-- Accordion item -->
				<div class="accordion-item">
					<div class="accordion-title ti-chevron-down">طرق الشحن المتوقعه</div>
					<div class="accordion-content">
						<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
		<h3>Your cart is empty</h3>
	<?php endif; ?>
</div>
	<script>
		
	</script>
<?php echo $footer?>