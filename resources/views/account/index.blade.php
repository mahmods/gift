@extends("account.layout")


@section('content')
<div class="profile">
	<h2 class="title">لوحة التحكم في الحساب</h2>

	<div class="row">
		<div class="col-s-12 col-m-6 col-l-4">
			<ul>
				<li>
					<span>الاسم بالكامل</span>
					<?=$customer->first_name.' '.$customer->last_name?>
				</li>
				<li>
					<span>البريد الالكتروني</span>
					<?=$customer->email?>
				</li>
			</ul>
		</div>

		<div class="col-s-12 col-m-6 col-l-4">
			<ul>
				<li>
					<span>رقم الهاتف</span>
					<?=!empty($customer->address->phone) ? $customer->address->phone : ""?>
				</li>
			</ul>
		</div>

		<div class="col-s-12 col-m-6 col-l-4">
			<ul>
				<li>
					<span>العنوان</span>
					<?=!empty($customer->address->address_2) ? $customer->address->address_2 : ""?>
				</li>
				<li>
					<?=!empty($customer->address->address_1) ? $customer->address->address_1 : ""?>
				</li>
				<li>
					<?=!empty($customer->address->region) ? $customer->address->region : ""?>
				</li>
				<li>
					<?=!empty($customer->address->city) ? $customer->address->city : ""?>
				</li>
			</ul>
		</div>
	</div>
	<a href="./account/edit" class="edit-btn">تعديل بياناتى</a>
</div>

<!-- Table -->
<div class="order-table responsive-table" style="width:100%;">
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
				<td class="col-s-1">
					<?=$order->id?>
				</td>
				<td class="col-s-3">
					<a href="#">
						<h3>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم</h3>
					</a>
				</td>
				<td class="col-s-2">
					<span class="badge success">جاري الشحن</span>
				</td>
				<td class="col-s-1">01</td>
				<td class="col-s-3">
					<h4>عبدالله رمضان عويس</h4>
				</td>
				<td class="col-s-2">
					<?=currency($order->summ)?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- // Table -->
@endsection