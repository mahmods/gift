@extends("account.layout")


@section('content')
<!-- Table -->
<div class="order-table responsive-table" style="width:100%;">
	<table>
		<thead>
			<tr>
				<td class="col-s-1">#</td>
				<td class="col-s-3">المنتجات</td>
				<td class="col-s-2">الحاله</td>
				<td class="col-s-3">مرسل إلى</td>
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
						<?php $products = json_decode($order->products, true); ?>
						<?php foreach ($products as $data) : ?>
							<?php $product = App\Product::find($data['id']); ?>
							<h3><?=$product->title?></h3>
						<?php endforeach; ?>
					</a>
				</td>
				<td class="col-s-2">
					<?php
						switch ($order->stat) {
							case 1:
								echo '<span class="badge warning">Pending</span>';
								break;
							case 2:
								echo '<span class="badge success">Shipped</span>';
								break;
							case 3:
								echo '<span class="badge success">Delivered</span>';
								break;
							case 4:
								echo '<span class="badge danger">Canceled</span>';
								break;
							default:
								# code...
								break;
						}
					?>
				</td>
				<td class="col-s-3">
					<h4><?=$order->fullname?></h4>
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